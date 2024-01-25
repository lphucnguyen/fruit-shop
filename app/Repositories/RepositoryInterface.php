<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);

    public function findOrFail($id);

    public function findWhere($where);

    public function paginate($perPage);

    public function makeQuery();

    public function __call($method, $arguments);
}