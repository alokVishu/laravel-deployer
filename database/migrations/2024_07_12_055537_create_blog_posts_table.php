<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('blog_posts', function (Blueprint $table) {
      $table->id();
      $table->text('title');
      $table->string('slug')->unique();
      $table->longText('body');
      $table->boolean('is_published')->default(false);
      $table->timestamp('published_at')->nullable();
      $table->foreignId('author_id')->nullable()->constrained('users');
      $table->string('featured_image')->nullable();
      $table->string('featured_image_alt_text')->nullable();
      $table->text('seo_title');
      $table->text('seo_description');
      $table->timestamps();
    });

    Schema::create('blog_post_category_blog_post', function (Blueprint $table) {
      $table->foreignId('blog_post_id')->constrained()->onDelete('cascade');
      $table->foreignId('blog_post_category_id')->constrained('blog_post_categories')->onDelete('cascade');
      $table->primary(['blog_post_id', 'blog_post_category_id']);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('blog_posts');
  }
};
