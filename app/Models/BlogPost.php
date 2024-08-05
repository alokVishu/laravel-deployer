<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'slug',
    'body',
    'content',
    'category_id',
    'author_id',
    'blog_post_category_id',
    'seo_title',
    'seo_description',
    'featured_image',
    'featured_image_alt_text',
    'is_published',
    'published_at',
  ];

  // Cast attributes to specific types
  protected $casts = [
    'published_at' => 'datetime',
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function blogPostCategory()
  {
    return $this->belongsToMany(BlogPostCategory::class, 'blog_post_category_blog_post');
  }
}
