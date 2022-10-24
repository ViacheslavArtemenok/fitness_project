<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use App\Models\Profile;
use App\Models\Relation;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\TrainerReview;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Ramsey\Uuid\Type\Integer;

final class TrainerQueryBuilder
{
    private Builder $model;


    public function __construct()
    {
        $this->arr = [];
        $this->model = User::query();
        $this->relationModel = Relation::query();
        $this->tagModel = Tag::query();
        $this->skillModel = Skill::query();
        $this->profileModel = Profile::query();
        $this->reviewModel = TrainerReview::query();
    }
    /**
     * $this->buildArr(); Подсобный метод
     */
    public function buildArr(object $model, string $fieldW, mixed $valueW, string $sign, string $fieldWIn): object
    {
        if ($valueW === 0 || $valueW == "%%") {
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
            foreach ($collection as $item) {
                $this->arr[] = $item->user_id;
            }
            return $this;
        }
    }

    public function getAllTags(): Collection
    {
        return $this->tagModel->get();
    }

    public function getAllPaginate(): LengthAwarePaginator
    {
        return $this->model
            ->where('role', 'IS_TRAINER')
            ->where('status', 'ACTIVE')
            ->with(['profile', 'skill', 'tags', 'trainer_reviews'])
            ->paginate(config('trainers.users'));
    }

    public function getWithParamsPaginate(string $firstName = null, string $lastName = null, int $city_id, int $tag_id)
    {
        if ($city_id > 0) {
            $city = config('cities')[$city_id];
        } else {
            $city = 0;
        }
        $trainers = $this->buildArr($this->skillModel, 'location', $city, '=', 'user_id')
            ->buildArr($this->relationModel, 'tag_id', $tag_id, '=', 'user_id')
            ->buildArr($this->profileModel, 'last_name', "%{$lastName}%", 'LIKE', 'user_id')
            ->buildArr($this->profileModel, 'first_name', "%{$firstName}%", 'LIKE', 'user_id');

        if (count($trainers->arr)) { //Запрос с параметрами
            return  $this->model
                ->where('role', 'IS_TRAINER')
                ->where('status', 'ACTIVE')
                ->whereIn('id', $trainers->arr)
                ->with(['profile', 'skill', 'tags', 'trainer_reviews'])
                ->paginate(config('trainers.users'));
        } elseif (!count($trainers->arr) && $lastName || $firstName) { //Запрос без параметров - список пуст
            return collect([]);
        } else return $this->getAllPaginate(); //Запрос без параметров - все тренеры
    }
    /**
     * Получить модель тренера
     */
    public function getById(int $id): object
    {
        return $this->model
            ->where('status', 'ACTIVE')
            ->where('role', 'IS_TRAINER')
            ->with(['profile', 'skill', 'tags', 'trainer_reviews'])
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
    /**
     * Получить модель тренера и отзывы
     */
    public function getReviewsPaginate(Collection $data): array
    {
        $collection = [];
        foreach ($data as $client) {
            $collection[] = User::query()
                ->where('role', 'IS_CLIENT')
                ->where('status', 'ACTIVE')
                ->with(['profile', 'trainer_reviews'])
                ->findOrFail($client->pivot->client_id);
        }


        return $collection;
    }

    /**
     * В качестве obj из контроллера
     * получаем объект класса Profile
     * либо объект класса Skill
     * т.е. методы 
     */
    public function create(object $obj, array $data): bool
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
    public function getUnitCase($value)
    {
        $unit1 = 'год';
        $unit2 = 'года';
        $unit3 = 'лет';
        $value = abs((int)$value);
        if (($value % 100 >= 11) && ($value % 100 <= 19)) {
            return $unit3;
        } else {
            switch ($value % 10) {
                case 1:
                    return $unit1;
                case 2:
                case 3:
                case 4:
                    return $unit2;
                default:
                    return $unit3;
            }
        }
    }
}
