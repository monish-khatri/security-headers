<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Kyslik\ColumnSortable\Sortable;

class Blog extends Model
{
    use Sortable, HasFactory, SoftDeletes;

    const STATUS_APPROVE = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_PENDING = 'pending';
    const STATUS_DRAFT = 'draft';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        // 'user_id' => Auth::id(),
    ];

    public $sortable = ['id','title','description','is_published'];
    protected $fillable = [
        'title',
        'description',
        'slug',
        'is_published',
        'status',
        'user_id',
        'approve_by',
        'reject_reason',
        'published_at',
        'image',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Increment blog slug with count if exists.
     */
    public function setSlugAttribute($value) {
        if (empty($this->id) && static::whereSlug($slug = Str::slug($value, "-"))->exists()) {
            $slug = "{$value}-" . random_int(1, 999) . "";
        } elseif (static::whereSlug($slug = Str::slug($value, "-"))->where('id', '!=', $this->id)->exists()) {
            $slug = "{$value}-{$this->id}";
        }
        $this->attributes['slug'] = $slug;
    }
    /**
     * Get the user associated with the blog.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    /**
     * Get the user associated with the blog.
     */
    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'action_by');
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->orderBy('pinned', 'DESC')->latest('created_at');
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function totalComments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag', 'blog_id', 'tag_id');
    }
}
