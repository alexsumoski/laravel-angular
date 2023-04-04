<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('view','users');

        return UserResource::collection(User::paginate());
    }

    public function store(Request $request)
    {
        $this->authorize('edit','users');

        $user = User::create(
            $request->only('first_name', 'last_name', 'email', 'role_id')
            + ['password' => Hash::make(1234)]
        );

        return response(new UserResource($user), Response::HTTP_CREATED);
    }

    public function show(string $id)
    {
        $this->authorize('view','users');

        return new UserResource(User::with('role')->find($id));
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        $this->authorize('edit','users');

        $user = User::find($id);

        $user->update($request->only('first_name', 'last_name', 'email'));

        return response(new UserResource($user), Response::HTTP_ACCEPTED);
    }

    public function destroy(string $id)
    {
        $this->authorize('edit','users');

        User::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT); 
    }
}
