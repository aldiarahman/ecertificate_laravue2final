<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
        ]);

        $user->save();

        return response()->json('successfully added');
    }

    public function index()
    {
        $users = User::all();

        return response()->json([
                'status' => 'success',
                'users' => $users->toArray()
        ], 200);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update($id, Request $request)
    {
        $userData = $request->all();
        $userData['password'] = Hash::make($userData['password']);
        User::find($id)->update($userData);

        return response()->json('succesfully updated');
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json('successfully deleted');
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);

        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }


}
