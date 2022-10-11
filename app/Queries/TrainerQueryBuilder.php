<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class TrainerQueryBuilder
{
    private Builder $model;
    private $sizePaginate = 16;

    public function __construct()
    {
        $this->model = User::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get()
            ->with(['profile', 'skill']);
    }

    public function getAllPaginate(): LengthAwarePaginator
    {
        return $this->model
            ->with(['profile', 'skill'])
            ->paginate($this->sizePaginate);
    }

    public function getById(int $id): object
    {
        return $this->model
            ->with(['category', 'author'])
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
}
