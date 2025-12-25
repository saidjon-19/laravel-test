<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrueFalseQuestion extends Model
{
    protected $fillable = ['question_id','correct_answer'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
