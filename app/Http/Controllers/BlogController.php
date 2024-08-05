<?php

namespace App\Http\Controllers;

use App\Helper\ToCHelper;
use App\Services\BlogManager;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  public function __construct(private BlogManager $blogManager)
  {
  }

  public function all()
  {
    return view('blog.all', [
      'posts' => $this->blogManager->getAllPosts(),
      'categories' => $this->blogManager->getCategories(),
    ]);
  }

  public function view(string $slug)
  {
    $user = auth()->user();

    $isPublished = $user && $user->isAdmin() ? null : true; // if user is admin, show all posts, otherwise only published posts

    $post = $this->blogManager->getBlogBySlug($slug, $isPublished);
    $readingTime = calculate_reading_time($post->body);

    // tabler of content
    $tocData = ToCHelper::generateTOC($post->body);

    return view('blog.view', [
      'post' => $post,
      'morePosts' => $this->blogManager->getMorePosts($post),
      'readingTime' => $readingTime,
      'tocData' => $tocData,
    ]);
  }

  public function category(string $slug)
  {
    return view('blog.category', [
      'categories' => $this->blogManager->getCategories(),
      'posts' => $this->blogManager->getAllPostsForCategory($slug),
    ]);
  }

  public function author(string $name)
  {
    return view('blog.author', [
      'author' => $name,
      'posts' => $this->blogManager->getAllPostsForAuthor($name),
    ]);
  }
}
