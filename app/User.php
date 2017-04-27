<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function notes() {
        return $this->hasMany(Note::class, 'author_id');
    }

    public function addNote($title, $content, $category_id) {
        $this->notes()->create(compact('title', 'content', 'category_id'));
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'author_id');
    }
}
