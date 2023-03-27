<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * @var array
     */
    public array $relations = [];

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->with($this->relations)->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->with($this->relations)->all();
    }

    /**
     * @param array $attributes
     * @param $id
     * @return Model
     */
    public function update(array $attributes, $id): Model
    {
        $model = $this->find($id);
        $model->update($attributes);
        return $model;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        $model = $this->find($id);
        return $model->delete();
    }

    /**
     * @return Collection|null
     */
    public function get(): ?Collection
    {
        return $this->model->get();
    }

    /**
     * @return Model|null
     */
    public function first(): ?Model
    {
        return $this->model->first();
    }

    /**
     * @param string $field_name
     * @param $field_value
     * @param string $operator
     * @return Builder|null
     */
    public function where(string $field_name, $field_value, string $operator = '='): ?Builder
    {
        return $this->model->where($field_name, $operator, $field_value);
    }

}
