<?php
namespace Template\Adminrole\Http\Livewire\Datatables;

use Livewire\Component;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Template\Adminrole\Models\Company as Company_model;

class Companiesselect extends LivewireDatatable
{
    public $model = Company_model::class;
  
    public $module_name = "company";
    public $action ;
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function columns()
    {
        return [
            Column::name('company_name')->label('Name'),    
            Column::name('company_name')->callback(['pid','company_name'], function ($pid,$company_name) {
                return view('adminlte::livewire.helpers.table-selection', ['id' => $pid, 'text' => $company_name,"module_name"=> $this->module_name]);
            }),
        ];
    }
}
