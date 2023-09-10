<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $columns
     * @param array $condition
     * @param array $relations
     * @param $orderBy
     * @param $sortBy
     * @return Collection
     */
    public function get(array $condition = [], array $columns = ['*'], array $relations = [], $orderBy = 'id', $sortBy = 'DESC'): Collection
    {
        return $this->model->with($relations)->where($condition)->orderBy($orderBy, $sortBy)->get($columns);
    }

    /**
     * @param $per_paeg
     * @param array $columns
     * @param array $condition
     * @param array $relations
     * @param $orderBy
     * @param $sortBy
     * @return Collection
     */
    public function getWithPaginate($per_paeg, array $condition = [], array $columns = ['*'], array $relations = [], $orderBy = 'id', $sortBy = 'DESC'): Collection
    {
        return $this->model->select($columns)->with($relations)->where($condition)->orderBy($orderBy, $sortBy)->paginate($per_paeg);
    }

    /**
     * @param array $columns
     * @param array $condition
     * @param array $relations
     * @param $orderBy
     * @param $sortBy
     * @return Collection
     */
    public function first(array $condition = [], array $columns = ['*'], array $relations = [], $orderBy = 'id', $sortBy = 'DESC'):  ?Model
    {
        return $this->model->select($columns)->with($relations)->where($condition)->orderBy($orderBy, $sortBy)->first();
    }

    /**
     * Create a model
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): ?Model
    {
        return $this->model->create($data);
    }

    /**
     * Update existing model
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data): bool
    {
        $model = $this->first(['*'], ['id'=>$id]);
        $update = $model->update($data);
        return $update;
    }

    /**
     * Delete model by id
     *
     * @param int $id
     * @return bool
     */
    public function delete($id): bool
    {
        $data = $this->first(['id'=>$id]);
        $data->delete();
        return true;
    }

    public function statusUpdate($id, $status)
    {
        $data = $this->first(['id'=>$id]);
        $data->status = $status == "true" ? 1 : 0;
        return $data->save();
    }
}
