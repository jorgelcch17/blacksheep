<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class AdminTermsAndConditionsComponent extends Component
{
    public $terms;

    public function mount()
    {
        $terms = CompanyInfo::first();
        if($terms)
        {
            $this->terms = $terms->terms;
        }
        else
        {
            $terms = new CompanyInfo();
            $terms->save();
        }
    }

    public function storeTerms()
    {

        $terms = CompanyInfo::first();
        $terms->terms = $this->terms;
        $terms->save();
    }

    public function render()
    {
        return view('livewire.admin.admin-terms-and-conditions-component');
    }
}
