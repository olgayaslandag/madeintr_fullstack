<?php

namespace App\Http\Controllers\Admin\User;

use App\Contracts\User\UserInterface;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserInterface $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $data = [
            "users" => $this->repository->all()
        ];

        return view('admin.user.users', $data);
    }
}
