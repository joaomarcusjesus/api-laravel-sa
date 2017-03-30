<?php

namespace SA\Http\Controllers\Api;

use SA\Http\Controllers\Controller;
use SA\Http\Controllers\Response;
use SA\Http\Requests\UserRequest;
use SA\Repositories\UserRepository;

class UsersController extends Controller
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(UserRequest $request)
    {
        $user = $this->repository->create($request->all());
        return response()->json($user, 201);
    }
}
