<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Faquestion extends Model
{
    public $timestamps = false;
    use Translatable;
    protected $translatable = ['question','answere'];

}