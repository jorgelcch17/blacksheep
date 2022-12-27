<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $mobile_phone;
    public $subject;
    public $message;

    public function storeMessage()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile_phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile_phone' => $this->mobile_phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);
        session()->flash('message', 'Su mensaje fue enviado correctamente!');
        return redirect()->route('contact');
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
}
