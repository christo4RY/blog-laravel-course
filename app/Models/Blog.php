<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $with = ['category', 'author'];
    protected $guarded = [];
    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%');
                })
                ->orWhere('title', 'frontend');
        });

        $query->when($filter['categories']??false, function ($query, $slug) {
            $query->whereHas('category',function($query) use ($slug){
                $query->where('slug',$slug);
            });
        });

        $query->when($filter['users']??false, function ($query, $username) {
            $query->whereHas('author',function($query) use ($username){
                $query->where('username',$username);
            });
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
