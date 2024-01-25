<?php

namespace App\Http\Controllers\User;

use App\DTOs\User\UserUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Services\Contracts\UserServiceInterface;

class UpdateController extends Controller
{
    public function __construct(
        private UserServiceInterface $userService
    )
    {
    }

    public function __invoke(UpdateUserRequest $request)
    {
        $userUpdateDTO = UserUpdateDTO::fromRequest($request);
        $this->userService->update($userUpdateDTO, auth()->user()->id);
        return redirect()->back()->with('success', 'User updated successfully');
    }
}
