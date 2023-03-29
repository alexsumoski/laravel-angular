<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function index() {
        return RoleResource::collection(Role::all());
    }

    public function store(Request $request) {
        $role = Role::create($request->only('name'));

        return response(new RoleResource($role), Response::HTTP_CREATED);
    }

    public function show($id) {
        return Role::with('permissions')->find($id);
    }

    public function update(Request $request, $id) {
        $role = RoleResource::collection(Role::find($id));

        $role->update($request->only('name'));

        return response(new RoleResource($role), Response::HTTP_ACCEPTED);
    }

    public function destroy($id) {
        Role::destroy($id);

        return Response(null, Response::HTTP_NO_CONTENT);
    }
}
