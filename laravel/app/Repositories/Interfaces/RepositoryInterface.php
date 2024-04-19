<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    /**
     * Get all
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     *
     * @param $id Id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     *
     * @param array $attributes Attributes
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     *
     * @param $id         Id
     * @param array $attributes Attributes
     *
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete
     *
     * @param $id Id
     *
     * @return mixed
     */
    public function delete($id);

    /**
     * First or create
     *
     * @param array $attributes Attributes
     * @param array $values     values
     *
     * @return mixed
     */
    public function firstOrCreate(array $attributes, array $values = []);

    /**
     * Update or create
     *
     * @param array $attributes Attributes
     * @param array $values     values
     *
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = []);

    /**
     * Insert
     *
     * @param array $attributes Attributes
     *
     * @return mixed
     */
    public function insert(array $attributes);

    /**
     * Fill fields function
     *
     * @param Array $data   data
     * @param Array $fields fields
     *
     * @return Array
     */
    public function fillFields($data, $fields);

    /**
     * EmptyResult set query empty result
     *
     * @return Array
     */
    public function emptyResult();
}
