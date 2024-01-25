<?php

namespace App\Services;

use App\DTOs\BaseDTO;

interface ServiceInterface
{
    public function all();

    public function create(BaseDTO $data);

    public function update(BaseDTO $data, $id);

    public function delete($id);

    public function find($id);

    public function findWhere($where);

    public function paginate($perPage = 10);

    public function findAndWith($id, array $relationships);

    public function __call($method, $arguments);
}