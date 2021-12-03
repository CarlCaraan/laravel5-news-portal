<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//~Add Soft Delete
use Illuminate\Database\Eloquent\SoftDeletes;

//~Storage Facades
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    //~Soft Delete
    use SoftDeletes;

    //~Add Protect Data
    protected $dates = [
        'published_at'
    ];
    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at', 'category_id', 'user_id'
    ];

    //~Add delete post image from storage
    /**
    *
    * @return void
    */
    public function deleteImage() {
        Storage::delete($this->image);
    }

    //~Add function that define a relationship in category
    public function category() {
        //~Access category in the posts
        return $this->belongsTo(Category::class);
    }
    
    //~Add function that define a relationship post and a tag
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    //~Check if post has tags
    /**
     *
     * @return bool
     */
    public function hasTag($tagId) {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    // ~Check who post the posts
    public function user() {
        return $this->belongsTo(User::class);
    }

    // ~ADD SCOPES
    // Scope for published_at post
    public function scopePublished($query) {
        return $query->where('published_at', '<=', now());
    }
    // Scope for search
   public function scopeSearched($query) {
        $search = request()->query('search');

        if(!$search) {
            return $query->published();
        }
        else {
            return $query->published()->where('title', 'LIKE', "%{$search}%");
        }
    }
}
