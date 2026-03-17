<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository{

    protected Model $model;

    abstract public function model(): string;

    public function __construct()
    {
        $this->model = app($this->model());
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function findOrFail(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    public function where(string $column, $value): Collection
    {
        return $this->model->where($column, $value)->get();
    }

    public function whereIn(string $column, array $values): Collection
    {
        return $this->model->whereIn($column, $values)->get();
    }

    public function first(): ?Model
    {
        return $this->model->first();
    }

    public function count(): int
    {
        return $this->model->count();
    }

    public function exists(): bool
    {
        return $this->model->exists();
    }

    public function orderBy(string $column, string $direction = 'asc'): self
    {
        $this->model = $this->model->orderBy($column, $direction);
        return $this;
    }

    public function latest(string $column = 'created_at'): Collection
    {
        return $this->model->latest($column)->get();
    }

    public function oldest(string $column = 'created_at'): Collection
    {
        return $this->model->oldest($column)->get();
    }
}