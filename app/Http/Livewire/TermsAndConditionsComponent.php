<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CompanyInfo;

class TermsAndConditionsComponent extends Component
{
    public function render()
    {
        $terms = CompanyInfo::first();
        return view('livewire.terms-and-conditions-component', compact('terms'));
    }
}
