<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, $filter) {
        $query->when($filter['search'] ?? false, function($query, $search) {
            $query->where('title', 'like', "%".$search."%")
            ->orWhere('body', 'like', '%'.$search.'%');
        });

        $query->when($filter['category'] ?? false, function($query, $slug) {
            $query->whereHas('category', function($query) use ($slug) {
                $query->where('slug', $slug);
            });
        });

        $query->when($filter['username'] ?? false, function($query, $username) {
            $query->whereHas('author', function($query) use ($username) {
                $query->where('username', $username);
            });
        });
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function subscribers() {
        return $this->belongsToMany(User::class, 'blog_user');
    }

    public function unSubscribe() {
        return $this->subscribers()->detach(auth()->user()->id);
    }

    public function subscribe() {
        return $this->subscribers()->attach(auth()->user()->id);
    }
}
