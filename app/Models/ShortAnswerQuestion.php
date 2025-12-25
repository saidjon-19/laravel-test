<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortAnswerQuestion extends Model
{
    protected $fillable = ['question_id','correct_text'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
