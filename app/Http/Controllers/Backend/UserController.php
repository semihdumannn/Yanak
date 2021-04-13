<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class UserController extends BackendController
{
    private $repository;

    /**
     * UserController constructor.
     * @param $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function edit(User $user)
    {
        $user = $this->repository->getUserById($user);

        return view('backend.users.profile', compact('user'));
    }

    public function update(User $user)
    {
        $this->repository->update($user, \request()->all());

        return redirect()->route('user.edit', $user);
    }
}
