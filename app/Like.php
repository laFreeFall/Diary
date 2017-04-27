<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'likable_id', 'likable_type'];

    public function likable() {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function toggle() {
        if($this->exists) {
            return $this->delete();
        }
        return $this->save();
    }


}
