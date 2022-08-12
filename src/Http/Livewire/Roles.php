<?php

namespace Template\Adminrole\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Template\Adminrole\Models\Company ;
use Auth;
use Template\Adminrole\Http\Livewire\Mylivewire;

class Roles extends Mylivewire
{
    public $name,$company ,$company_label ;
    public $view = "roles";


    public $form_create = [
        "name" => [
            "type" => "text",
        ],
        "company" => [
            "type" => "select_table",
        ],

    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate([
            'name'      => 'required',
        ]);

        $createRole = [
            'name' => $this->name,
            'guard_name' => 'web',
            'company_pid' => $this->company ?? Auth::user()->details->company_pid,
        ];
        $role = Role::create($createRole);
        
        $this->resetInputFields();
        $this->emit('reloadAll');
        $this->emit('refreshLivewireDatatable');
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $result = Role::where('id',$id)->leftJoin('companies', 'company_pid', 'pid')->first();
        $this->id_update = $id;
        $this->name = $result->name;        
        $this->company = $result->company_pid; 
        $this->company_label = $result->company_name;
    }



    public function selectedAction($id,$text,$model)
    {
        $this->company_label = $text;
        $this->company = $id;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
        ]);

        if ($this->id_update) {

            $result = Role::where('id', $this->id_update)->first();
            $result->update([
                'name' => $this->name,
                'company_pid' => $this->company ?? Auth::user()->details->company_pid,
            ]);
            
            $this->emit('reloadAll');
            $this->emit('refreshLivewireDatatable');
            
            $this->resetInputFields();

        }
    }


    private function resetInputFields(){
        $this->name = '';
        $this->company = '';
    }

    public function delete($id)
    {
        if($id){
            Role::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
            $this->emit('reloadAll');
            $this->emit('refreshLivewireDatatable');
        }
    }
    

    public function addPermission($id,$permission_id)
    {
        $role = Role::findById($id);
        $role->givePermissionTo($permission_id);
        $this->emit('reloadPermission');
    }

    public function removePermission($id,$permission_id)
    {
        $role = Role::findById($id);
        $role->revokePermissionTo($permission_id);
        $this->emit('reloadPermission');
    }


    
}
