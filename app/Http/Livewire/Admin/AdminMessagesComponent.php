<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithPagination;
// usando carbon
use Carbon\Carbon;

class AdminMessagesComponent extends Component
{
    public $message_id;
    public $selected_id;
    public $selected_name;
    public $selected_email;
    public $selected_mobile;
    public $selected_subject;
    public $selected_message;
    public $selected_created_at;

    public function select($id)
    {   
        $message = Contact::find($id);
        $this->selected_id = $id;
        $this->selected_name = $message->name;
        $this->selected_email = $message->email;
        $this->selected_mobile = $message->mobile_phone;
        $this->selected_subject = $message->subject;
        $this->selected_message = $message->message;
        $this->selected_created_at = Carbon::parse($message->created_at)->diffForHumans();
        $message->status = 'read';
        $message->save();
    }

    public function noRead()
    {
        $message = Contact::find($this->selected_id);
        $message->status = 'unread';
        $message->save();
    }

    public function deleteMessage()
    {
        $message = Contact::find($this->message_id);
        $message->delete();
        session()->flash('message', 'Mensaje eliminado correctamente!');
    }

    public function render()
    {
        $messages = Contact::orderBy('status', 'DESC')->orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-messages-component', compact('messages'));
    }
}
