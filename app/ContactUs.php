<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ContactUs extends Model
{
    public $timestamps = false;
    use Translatable;
    protected $translatable = ['address'];

}
