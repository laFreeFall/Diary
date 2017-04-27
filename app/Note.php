<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $fillable = ['title', 'content', 'category_id'];

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function addComment($author_id, $content) {
        $this->comments()->create(compact('author_id', 'content'));
    }

    public function scopeFilterCategory($query, $category) {
        if($category = Category::where('title', ucfirst($category))->first()) {
            $query->where('category_id', $category->id);
        }
    }
}