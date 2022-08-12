<?php

namespace Template\Adminrole\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Template\Adminrole\Models\User;
use Spatie\Permission\Models\Permission;
use Template\Adminrole\Models\Company;
use Template\Adminrole\Models\Users_detail;

class InitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('adminlte::welcome');
    }

    public function start()
    {
        
        Company::create(
            [
                'pid' => "COMP0001",
                'company_name' => "PT Default",
                'company_sort_name' =>"Default",
                // 'address' => "JL Address",
                // 'register_date' => $this->register_date,
                // 'url_server' => $this->url_server,
            ]);
        Permission::create(
            [
                'name' => 'read permission',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'create permission',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'update permission',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'delete permission',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'read role',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'create role',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'update role',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'delete role',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'read user',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'create user',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'update user',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'delete user',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'user management',
                'guard_name' => 'web',
            ]);
        
        Permission::create([
                'name' => 'read settings',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'create settings',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'update settings',
                'guard_name' => 'web',
            ]);
         Permission::create([
                'name' => 'delete settings',
                'guard_name' => 'web',
            ]);
        

        Permission::create([
            'name' => 'read companies',
            'guard_name' => 'web',
        ]);
        Permission::create([
                'name' => 'create companies',
                'guard_name' => 'web',
            ]);
        Permission::create([
                'name' => 'update companies',
                'guard_name' => 'web',
            ]);
        Permission::create([
                'name' => 'delete companies',
                'guard_name' => 'web',
            ]);
        Permission::create([
                'name' => 'all companies',
                'guard_name' => 'web',
            ]);
            

        $roles = [
            [
                'name' => 'super-admin',
                'guard_name' => 'web',
                'company_pid' => 'COMP0001'
            ],
            [
                'name' => 'admin',
                'guard_name' => 'web',
                'company_pid' => 'COMP0001'
            ],
        ];
        Role::insert($roles);
        $role = Role::findByName('super-admin');
        $role->givePermissionTo(Permission::all());

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('super-admin');
        Users_detail::create([
            'user_id' => $user->id,
            'company_pid' => 'COMP0001',
        ]);

        return redirect()->route('login');

    }
}
