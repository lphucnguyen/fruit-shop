<?php

namespace App\Services;

use App\DTOs\BaseDTO;
use App\Repositories\RepositoryInterface;

class BaseService implements ServiceInterface
{
    public function __construct(
        protected RepositoryInterface $repository
    ) {
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function create(BaseDTO $data)
    {
        return $this->repository->create($data->toArray());
    }

    public function update(BaseDTO $data, $id)
    {
        return $this->repository->update($data->toArray(), $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function findOrFail($id)
    {
        return $this->repository->findOrFail($id);
    }

    public function findWhere($where)
    {
        return $this->repository->findWhere($where);
    }

    public function paginate($perPage = 5)
    {
        return $this->repository->paginate($perPage);
    }

    public function findAndWith($id, array $relationships) {
        $query = $this->repository->makeQuery();

        $query = $query->where('id', $id);
        foreach ($relationships as $relationship) {
            $query->with($relationship);
        }

        return $query->first();
    }

    public function __call($method, $arguments)
    {
        return $this->repository->$method(...$arguments);
    }
}