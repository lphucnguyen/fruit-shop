<?php

namespace App\Repositories\Eloquents;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(
        protected User $model
    ) {
        parent::__construct($model);
    }
}