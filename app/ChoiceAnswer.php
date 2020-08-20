<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChoiceAnswer extends Model
{
    protected $guarded = [];

    protected $fillable = ['questionId','choiceId'];
}
