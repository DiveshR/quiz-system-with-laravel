<?php

namespace App\Http\Livewire\Questions;

use Livewire\Component;
use App\Models\Question;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;


class QuestionForm extends Component
{
    public Question $question;

    public bool $editing = false;

    public function mount(Question $question): void
    {
        $this->question = $question;

        if($this->question->exists())
        {
            $this->editing = true;
        }
    }

    public function save(): Redirector
    {
        $this->validate();

        $this->question->save();

        return to_route('questions');
    }

    public function render(): View
    {
        return view('livewire.questions.question-form');
    }

    public function rules(): array
    {
        return [
            'question.question' => ['required','string'],
            'question.code_snippet' => ['string','nullable'],
            'question.answer' => ['string','nullable'],
            'question.more_info' => ['url','nullable'],
        ];
    }
}
