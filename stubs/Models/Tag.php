<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tag', 'tag_id', 'blog_id');
    }
}
