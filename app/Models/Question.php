<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['test_type_id','user_id','title','explanation','difficulty'];

    public function test_type()
    {
        return $this->belongsTo(TestType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
