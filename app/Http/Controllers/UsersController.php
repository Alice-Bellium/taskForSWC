<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the create user page.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a new user.
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();
        User::query()->create($data);

        return redirect()->route('admin.users')->with('success', 'Пользователь успешно создан!');
    }

    /**
     * Show the user page.
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the edit user page.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the user.
     */
    public function update(User $user, UserUpdateRequest $request)
    {
        $user->update($request->validated());

        return view('users.show', ['user' => $user])->with('success', 'Пользователь обновлен!');
    }

    /**
     * Destroy the user.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Пользователь удален');
    }

    /**
     * Get all users.
     */
    public function users()
    {
        $users = new User();
        return view('admin.users', ['users' => $users->query()->get()]);
    }
}
