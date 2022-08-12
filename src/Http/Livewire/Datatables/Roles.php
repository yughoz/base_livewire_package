<?php

namespace Template\Adminrole\Http\Livewire\Datatables;

use Livewire\Component;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class Roles extends LivewireDatatable
{
    public $model = Role::class;
    public $module_name = "role";
    // ::with('roles')->latest()
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function builder()
    {
        $dataBuilder =  Role::query()->with('roles')
        ->leftJoin('companies', 'company_pid', 'pid');

        if (!auth()->user()->can('all companies')) {
            $dataBuilder->where('company_pid' , Auth::user()->details->company_pid);
        }
        return $dataBuilder;
    }

    public function columns()
    {
        return [
            
            Column::name('name'),
            Column::name('companies.company_name')->label('Company'),
            Column::callback(['id', 'name'], function ($id, $name) {
                return view('adminlte::livewire.roles.datatables_action', ['id' => $id, 'name' => $name]);
            })->label('Action')
        ];
    }
}
