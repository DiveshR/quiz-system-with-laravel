<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'option',
        'correct',
        'question_id',
    ];

    protected $casts = [
        'correct' => 'boolean',
    ];

    public function question(): BelongTo
    {
        return $this->BelongTo(Question::class);
    }
}
