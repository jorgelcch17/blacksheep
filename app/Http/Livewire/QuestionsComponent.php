<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuestionsComponent extends Component
{
    public function render()
    {
        $questions = Question::orderBy('position', 'ASC')->where('is_active', 1)->get();
        return view('livewire.questions-component', compact('questions'));
    }
}
