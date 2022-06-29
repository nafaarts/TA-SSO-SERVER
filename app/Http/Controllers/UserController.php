<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::filter()->paginate(10);
        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users-create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor_induk' => 'required|numeric|unique:users',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'roles' => 'required',
        ]);

        $user = User::create([
            'nomor_induk' => $request->nomor_induk,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active ?? 0,
            'is_admin' => $request->is_admin ?? 0,
        ]);

        foreach ($request->roles as $role) {
            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => $role
            ]);
        }

        return redirect()->route('users.index')->with('success', 'New user successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users-edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nomor_induk' => 'required|numeric|unique:users,nomor_induk,' . $id,
            'name' => 'required',
            'email' => 'required|email',
            'roles' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'nomor_induk' => $request->nomor_induk,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'is_active' => $request->is_active ?? 0,
            'is_admin' => $request->is_admin ?? 0,
        ]);

        RoleUser::where('user_id', $id)->delete();

        foreach ($request->roles as $role) {
            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => $role
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->roles->each(function ($item) {
            $item->delete();
        });

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User "' . $user->name . '" has been deleted!');
    }
}
