<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Post extends Model
{
    use Translatable;

    public function getDate($created_at) {
        return Carbon::parse($created_at)->format('F d, Y');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}
