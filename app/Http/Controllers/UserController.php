<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
        return response()->json(User::all());
    }

    public function store(Request $request) {
        $validated = $this->validateStoreUser($request);

        if($validated->fails()) {
            return response()->json(['error' => 'Provided invalid data'], 400);
        }

        if (User::where('email', '=', $request->input('email'))->exists()) {
            return response()->json(['error' => 'User already exists'], 409);
        }

        $user = User::create($request->all());

        return response()->json($user);
    }

    public function show($id) {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['error' => 'User not found'], 400);
        }

        return response()->json($user);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $validated = $this->validateUpdateUser($request);

        if($validated->fails()) {
            return response()->json(['error' => 'Provided invalid data'], 400);
        }

        $user->update($request->all());

        return response()->json($user);
    }

    public function destroy($id) {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted']);
    }

    protected function validateStoreUser($data) {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3',
            'cpf' => 'required|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/'
        ]);

        return $validator;
    }

    protected function validateUpdateUser($data) {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'min:3',
            'cpf' => 'required|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/'
        ]);

        return $validator;
    }
}
