<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    /**
     * @param array $columns
     * @param array $condition
     * @param array $relations
     * @param $orderBy
     * @param $sortBy
     * @return Collection
     */
    public function get(array $condition = [], array $columns = ['*'], array $relations = [], $orderBy = 'id', $sortBy = 'DESC'): Collection;

    /**
     * @param $per_paeg
     * @param array $columns
     * @param array $condition
     * @param array $relations
     * @param $orderBy
     * @param $sortBy
     * @return Collection
     */
    public function getWithPaginate($per_paeg, array $condition = [], array $columns = ['*'], array $relations = [], $orderBy = 'id', $sortBy = 'DESC'): Collection;

    /**
     * @param array $columns
     * @param array $condition
     * @param array $relations
     * @param $orderBy
     * @param $sortBy
     * @return Collection
     */
    public function first(array $condition = [], array $columns = ['*'], array $relations = [], $orderBy = 'id', $sortBy = 'DESC'):  ?Model;
    

    /**
     * Create a model
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): ?Model;

    /**
     * Update existing model
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data): bool;

    /**
     * Delete model by id
     *
     * @param int $id
     * @return bool
     */
    public function delete($id): bool;


    public function statusUpdate($id, $status);
}
