<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'blog_id', 'parent_id', 'body','pinned'];

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->orderBy('pinned', 'DESC');
    }

    /**
     * delete nested child comments
     *
     * @var array
     */
    public function deleteNestedComments()
    {
        // Calling the same method to all of the child of this replies
        $this->replies->each->deleteNestedComments();

        // Delete all replies of this comment
        $this->replies()->delete();
    }
}
