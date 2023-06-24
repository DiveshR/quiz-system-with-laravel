<?php

namespace App\Http\Livewire\Questions;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use App\Models\Question;

class QuestionsList extends Component
{
    public function render(): View
    {
        $questions = Question::latest()->paginate();
        return view('livewire.questions.questions-list', compact('questions'));
    }

    public function delete(Question $question): void
    {
        abort_if(!auth()->user()->is_admin, Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
}
