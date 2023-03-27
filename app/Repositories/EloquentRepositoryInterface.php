<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface EloquentRepositoryInterface
{

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model;

    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param array $attributes
     * @param int $id
     * @return Model
     */
    public function update(array $attributes, int $id): Model;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @return Collection|null
     */
    public function get(): ?Collection;

    /**
     * @return Model|null
     */
    public function first(): ?Model;

    /**
     * @param string $field_name
     * @param $field_value
     * @param string $operator
     * @return Builder|null
     */
    public function where(string $field_name, $field_value, string $operator = '='): ?Builder;
}
