<?php

namespace Template\Adminrole\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire;
use Template\Adminrole\Http\Livewire\Company;
use Template\Adminrole\Http\Livewire\Users;
use Template\Adminrole\Http\Livewire\Permissions;
use Template\Adminrole\Http\Livewire\Roles;
use Template\Adminrole\Http\Livewire\Settings;
use Template\Adminrole\Http\Livewire\Datatables\Companiesselect;
use Template\Adminrole\Http\Livewire\Datatables\Roleselect;
use Template\Adminrole\Http\Livewire\Datatables\Settings as database_settings;
use Template\Adminrole\Http\Livewire\Datatables\Roles as database_role;
use Template\Adminrole\Http\Livewire\Datatables\Companies as database_companies;
use Template\Adminrole\Http\Livewire\Datatables\Permissions as database_permissions;
use Template\Adminrole\Http\Livewire\Datatables\Users as database_users;

class AdminpackageProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // dd(__DIR__);
        Livewire::component('companies_view', Company::class);
        Livewire::component('users_view', Users::class);
        Livewire::component('roles_view', Roles::class);
        Livewire::component('settings_view', Settings::class);
        Livewire::component('permissions_view', Permissions::class);
        Livewire::component('companiesselect', Companiesselect::class);
        Livewire::component('roleselect', Roleselect::class);
        Livewire::component('settings_datatables', database_settings::class);
        Livewire::component('companies_datatables', database_companies::class);
        Livewire::component('roles_datatables', database_role::class);
        Livewire::component('users_datatables', database_users::class);
        Livewire::component('permissions_datatables', database_permissions::class);
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(base_path('packages/template/adminrole/src/views'), 'adminlte');
    }
}
