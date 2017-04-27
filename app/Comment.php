<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['author_id', 'note_id', 'content'];

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function note() {
        return $this->belongsTo(Note::class);
    }

    public function likes() {
        return $this->morphTo(Like::class, 'likable');
    }

    public function rating() {
        return $this->likes->count();
    }
}