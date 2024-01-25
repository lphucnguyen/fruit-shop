<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    public function __construct(
        private Model $model
    ) {
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function find($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function findWhere($where)
    {
        return $this->model->where($where)->get();
    }

    public function paginate($perPage)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function makeQuery()
    {
        return $this->model->query();
    }

    public function __call($method, $arguments)
    {
        return $this->model->$method(...$arguments);
    }

    protected function getModel()
    {
        return $this->model;
    }
}