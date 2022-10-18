<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use App\Models\Profile;
use App\Models\Relation;
use App\Models\Skill;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class TrainerQueryBuilder
{
    private Builder $model;


    public function __construct()
    {
        $this->model = User::query();
        $this->relationModel = Relation::query();
        $this->tagModel = Tag::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get()
            ->where('role', 'IS_TRAINER')
            ->where('status', 'ACTIVE')
            ->with(['profile', 'skill', 'tags']);
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
            ->with(['profile', 'skill', 'tags'])
            ->paginate(config('trainers.users'));
    }
    public function getAllByTagPaginate(int $tag_id): LengthAwarePaginator
    {
        $arr = [];
        $users = $this->relationModel->get()
            ->where('tag_id', $tag_id);
        foreach ($users as $item) {
            $arr[] = $item->user_id;
        }
        return  $this->model
            ->where('role', 'IS_TRAINER')
            ->where('status', 'ACTIVE')
            ->whereIn('id', $arr)
            ->with(['profile', 'skill', 'tags'])
            ->paginate(config('trainers.users'));
    }

    public function getById(int $id): object
    {
        return $this->model
            ->with(['profile', 'skill', 'tags'])
            ->findOrFail($id);
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
