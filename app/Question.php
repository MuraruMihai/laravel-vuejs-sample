<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function questionChoices(){
        return $this->hasMany(QuestionChoice::class);
    }
}
