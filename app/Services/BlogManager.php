<?php

namespace App\Services;

use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use App\Models\User;

class BlogManager
{
  public function getAllPosts(int $limit = 31)
  {
    return $this->getAllPostsQuery()
      ->paginate($limit);
  }

  public function getBlogBySlug(string $slug, ?bool $isPublished = true)
  {
    $post = BlogPost::where('slug', $slug);

    if ($isPublished) {
      $post->where('is_published', true);
    }

    return $post->firstOrFail();
  }

  public function getMorePosts(BlogPost $post, int $limit = 3)
  {
    return BlogPost::where('id', '!=', $post->id)
      ->where('is_published', true)
      ->orderBy('published_at', 'desc')
      ->limit($limit)
      ->get();
  }

  public function getCategories()
  {
    return BlogPostCategory::all();
  }

  public function getAllPostsForCategory(string $categorySlug, int $limit = 31)
  {
    // Get the category
    // $category = BlogPostCategory::find('slug', $categorySlug);
    $category = BlogPostCategory::where('slug', $categorySlug)->firstOrFail();
    // dd($category);
    // Get the blog posts for the given category
    return $category->posts()->get();
  }

  public function getAllPostsQuery()
  {
    return BlogPost::where('is_published', true)
      ->orderBy('published_at', 'desc');
  }

  public function getAllPostsForAuthor(string $authorName, int $limit = 31)
  {
    $author = User::where('name', $authorName)->firstOrFail();

    return $this->getAllPostsQuery()
      ->where('author_id', $author->id)
      ->paginate($limit);
  }
}
