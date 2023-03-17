<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function viewAll() {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create() {
        $roles = [
            1 => 'Customer',
            2 => 'Employee',
            3 => 'Manager'
        ];

        return view('users.create', compact('roles'));
    }

    public function store(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        switch($request->role) {
            case 1:
                $user->customer()->save(new Customer());
                break;
            case 2:
                $user->employee()->save(new Employee());
                break;
            case 3:
                $user->manager()->save(new Manager());
                break;
        }

        return redirect('users');
    }
}
