<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Question;

class AdminQuestionsComponent extends Component
{
    public $questions;

    public $add_question;
    public $add_answer;

    public $edit_id;
    public $edit_question;
    public $edit_answer;

    public $order;

    public function mount()
    {
        $questions = Question::orderBy('position', 'ASC')->get();
        $this->questions = $questions;
    }

    public function updatedOrder()
    {
        $this->changeOrder();
    }

    public function storeQuestion()
    {
        $question = new Question();
        $question->question = $this->add_question;
        $question->answer = $this->add_answer;
        $question->save();
        return redirect()->route('admin.questions');
    }

    public function changeStatus($id)
    {
        $question = Question::find($id);
        if ($question->is_active) {
            $question->is_active = 0;
        } else {
            $question->is_active = 1;
        }
        $question->save();
        $this->mount();
    }

    // funcion para editar una pregunta
    public function editQuestion($id)
    {
        $question = Question::find($id);
        $this->edit_question = $question->question;
        $this->edit_answer = $question->answer;
        $this->edit_id = $question->id;
        // emitir evento para que se abra el modal
        $this->emit('editQuestion');
    }

    public function updateQuestion()
    {
        $question = Question::find($this->edit_id);
        $question->question = $this->edit_question;
        $question->answer = $this->edit_answer;
        $question->save();
        $this->reset('edit_question', 'edit_answer', 'edit_id');
        $this->emit('closeModal');
        $this->mount();
    }

    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        $question->delete();
        $this->mount();
    }

    public function changeOrder()
    {
        $position = 1;
        $sorts = $this->order;

        foreach($sorts as $sort) {
            $question = Question::find($sort);
            $question->position = $position;
            $question->save();
            $position++;
        }
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.admin-questions-component');
    }
}
