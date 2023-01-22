<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\CompanyInfo;

class AdminCompanyInfoComponent extends Component
{
    public $address;
    public $phone_number;
    public $email;

    public $facebook;
    public $twitter;
    public $instagram;
    public $youtube;

    public function mount()
    {
        $info = CompanyInfo::first();
        if ($info) {
            $this->address = $info->address;
            $this->phone_number = $info->phone_number;
            $this->email = $info->email;
            $this->facebook = $info->facebook;
            $this->twitter = $info->twitter;
            $this->instagram = $info->instragram;
            $this->youtube = $info->youtube;
        }
        else
        {
            $info = new CompanyInfo();
            $info->save();
        }
    }

    public function storeInfo()
    {
        $info = CompanyInfo::first();
        $info->address = $this->address;
        $info->phone_number = $this->phone_number;
        $info->email = $this->email;
        $info->facebook = $this->facebook;
        $info->twitter = $this->twitter;
        $info->instagram = $this->instagram;
        $info->youtube = $this->youtube;
        $info->save();

        session()->flash('message', 'Información de la empresa actualizada correctamente!');
    }

    public function render()
    {
        return view('livewire.admin.admin-compony-info-component');
    }
}
