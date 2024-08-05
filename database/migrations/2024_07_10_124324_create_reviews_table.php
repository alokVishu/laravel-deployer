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
    Schema::create('reviews', function (Blueprint $table) {
      $table->id();
      $table->string('user_name');
      $table->string('user_image')->nullable();
      $table->string('user_location')->nullable();
      $table->string('user_designation')->nullable();
      $table->string('review_title')->nullable();
      $table->string('review_video')->nullable();
      $table->integer('ratings');
      $table->text('review_desc');
      $table->string('review_platform');
      $table->string('review_link');
      $table->boolean('is_featured')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('reviews');
  }
};
