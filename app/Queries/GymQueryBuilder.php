<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Gym;
use App\Models\GymAddress;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


final class GymQueryBuilder
{

    public function __construct()
    {
        $this->arr = [];
        $this->checker = false;
        $this->gymModel = Gym::query();
        $this->gymAddressModel = GymAddress::query();
        $this->clientModel = User::query();
    }
    /**
     * $this->buildArr(); Подсобный метод
     */
    public function buildArr(object $model, string $fieldW, mixed $valueW, string $sign, string $fieldWIn): object
    {
        if ($valueW === 0 || $valueW == "%%" || $this->checker) {
            return $this;
        } else {
            if (count($this->arr) > 0) {
                $collection = $model
                    ->where($fieldW, $sign, $valueW)
                    ->whereIn($fieldWIn, $this->arr)
                    ->get();
                $this->arr = [];
            } else {
                $collection = $model
                    ->where($fieldW, $sign, $valueW)
                    ->get();
            }
            if (count($collection) > 0) {
                foreach ($collection as $item) {
                    if ($item->gym_id) {
                        $this->arr[] = $item->gym_id;
                    } else {
                        $this->arr[] = $item->id;
                    }
                }
            } else $this->checker = true;
            return $this;
        }
    }


    public function getAllPaginate(): LengthAwarePaginator
    {
        return $this->gymModel
            ->with(['user', 'addresses', 'images', 'clients'])
            ->paginate(config('gyms.units'));
    }

    public function getWithParamsPaginate(string $title = null, int $city_id): mixed
    {
        if ($city_id > 0) {
            $city = config('cities')[$city_id];
        } else {
            $city = 0;
        }
        $gyms = $this->buildArr($this->gymModel, 'title', "%{$title}%", 'LIKE', 'id')
            ->buildArr($this->gymAddressModel, 'city', $city, '=', 'gym_id');

        if (count($gyms->arr)) { //Вернуть результаты поиска
            return  $this->gymModel
                ->whereIn('id', $gyms->arr)
                ->with(['user', 'addresses', 'images', 'clients'])
                ->paginate(config('gyms.units'));
        } elseif ($this->checker) { //Поиск не дал результатов
            return collect([]);
        } else return $this->getAllPaginate(); //Запрос без параметров - все тренеры
    }
    /**
     * Получить модель фитнес-клуба
     */
    public function getById(int $id): object
    {
        return $this->gymModel
            ->with(['user', 'addresses', 'images', 'clients'])
            ->findOrFail($id);
    }
    /**
     * Получить рейтинг тренера из полей 'score'
     */
    public function getScore(Collection $data): float
    {
        $sum = 0;
        foreach ($data as $item) {
            $sum += $item->pivot->score;
        }
        $result = round($sum / count($data), 1);
        return $result;
    }
    /*
     
    public function getReviewsPaginate(int $id): array
    {
        $arr = [];
        $trainer = $this->getById($id);
        foreach ($trainer->clients as $item) {
            $arr[] = $item->id;
        }
        if (count($arr)) {
            $reviews = $this->clientModel
                ->where('role_id', 3)
                ->whereIn('id', $arr)
                ->with(['profile', 'trainers'])
                ->paginate(6);
        } else {
            $reviews = collect([]);
        }
        return [
            'trainer' => $trainer,
            'reviews' => $reviews
        ];
    }
    public function getReview(int $trainer_id, int $client_id): array
    {
        $trainer = $this->getById($trainer_id);

        $client = $this->clientModel
            ->where('role_id', 3)
            ->with(['profile', 'trainers'])
            ->findOrFail($client_id);

        return [
            'trainer' => $trainer,
            'client' => $client
        ];
    }
*/
    public function create(object $obj, array $data): object
    {
        return $obj->create($data);
    }

    public function update(object $obj, array $data): bool
    {
        return $obj->fill($data)->save();
    }

    public function delete(object $obj): bool
    {
        return $obj->delete();
    }
}