<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     */
    public function action()
    {
        $role = Role::create(['name' => 'Super Admin']);

        User::find(1)->assignRole('Super Admin');
    }
}
