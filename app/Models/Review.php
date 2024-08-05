<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_name',
    'user_image',
    'user_location',
    'user_designation',
    'review_title',
    'review_video',
    'ratings',
    'review_desc',
    'review_platform',
    'review_link',
    'is_featured'
  ];
}
