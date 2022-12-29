<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Department;

class AdminDepartmentComponent extends Component
{
    public function changeStatusDepartment($department_id)
    {
        $department = Department::find($department_id);
        if($department->status == 1)
        {
            $department->status = 0;
        }
        else
        {
            $department->status = 1;
        }
        $department->save();
        session()->flash('message', 'Estado de la ciudad actualizado correctamente!');
    }

    public function render()
    {
        $departments = Department::all();
        return view('livewire.admin.admin-department-component', compact('departments'));
    }
}
