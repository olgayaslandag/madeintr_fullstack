<?php

namespace App\Http\Controllers\Admin\User;

use App\Contracts\User\UserInterface;
use App\Enums\UserRankEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected UserInterface $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $data = [
            "users" => $this->repository->all(),
        ];

        return view('admin.user.users', $data);
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $data = [
            "user" => $this->repository->find(['users.id' => $id]),
            "rank_enum" => UserRankEnum::cases()
        ];

        return view('admin.user.user_edit', $data);
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        $data = [
            "rank_enum" => UserRankEnum::cases()
        ];

        return view("admin.user.user_form", $data);
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();

        if($data['password'])
            $data['password'] = Hash::make($data['password']);

        $this->repository->store($data, $data['id'] ?? null);
        return redirect()->route('user.all');
    }
}
