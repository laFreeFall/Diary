<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $fillable = ['title', 'content'];

    public function author() {
        return $this->belongsTo(User::class);
    }
}