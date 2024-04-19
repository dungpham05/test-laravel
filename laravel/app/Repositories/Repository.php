<?php

namespace App\Repositories;

use DB;
use App\Repositories\Interfaces\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    /**
     *  Model variable
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get model
     *
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     *
     * @return void
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get one
     *
     * @param $id Id
     *
     * @return mixed
     */
    public function find($id)
    {
        $model = $this->model->findOrFail($id);

        return $model;
    }

    /**
     * Find by field
     *
     * @param array $where where
     *
     * @return mixed
     */
    public function findByField(array $where)
    {
        $model = $this->model->where($where)->get();

        return $model;
    }

    /**
     * Verifies value is contained within the given array
     *
     * @param string     $condition condition
     * @param collection $where     where
     *
     * @return mixed
     */
    public function whereIn($condition, $where)
    {
        $model = $this->model->whereIn($condition, $where)->get();

        return $model;
    }

    /**
     * Delete by condition array (where and)
     *
     * @param array $where where
     *
     * @return mixed
     */
    public function deleteWhere(array $where)
    {
        return $this->model->where($where)->delete();
    }

    /**
     * Delete by condition array (where or)
     *
     * @param array $where where
     *
     * @return mixed
     */
    public function deleteWhereOr(array $where)
    {
        foreach ($where as $key => $value) {
            $this->model = $this->model->orWhere($key, $value);
        }

        return $this->model->delete();
    }

    /**
     * Create
     *
     * @param array $attributes Attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update
     *
     * @param $id         Id
     * @param array $attributes Attributes
     *
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    /**
     * Delete by id
     *
     * @param $id Id
     *
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }
        return false;
    }

    /**
     * First or create
     *
     * @param array $attributes Attributes
     * @param array $values     values
     *
     * @return mixed
     */
    public function firstOrCreate(array $attributes, array $values = [])
    {
        $model = $this->model->firstOrCreate($attributes, $values);

        return $model;
    }

    /**
     * Update or create
     *
     * @param array $attributes Attributes
     * @param array $values     values
     *
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        $model = $this->model->updateOrCreate($attributes, $values);

        return $model;
    }

    /**
     * Insert
     *
     * @param array $attributes Attributes
     *
     * @return mixed
     */
    public function insert(array $attributes)
    {
        $model = $this->model->insert($attributes);

        return $model;
    }

    /**
     * Fill fields function
     *
     * @param Array $data   data
     * @param Array $fields fields
     *
     * @return Array
     */
    public function fillFields($data, $fields)
    {
        foreach ($fields as $field) {
            if (!array_key_exists($field, $data)) {
                $data = array_merge($data, [$field => null]);
            }
        }

        return $data;
    }

    /**
     * EmptyResult set query empty result
     *
     * @return Array
     */
    public function emptyResult()
    {
        return $this->model->select('id')->whereRaw('false');
    }
}
