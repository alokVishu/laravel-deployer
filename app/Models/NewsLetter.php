<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
  use HasFactory;

  protected $fillable = [
    'provider_name',
    'slug',
    'code',
    'active',
  ];

  public static function boot()
  {
    parent::boot();

    static::updating(function ($newsLetter) {
      if ($newsLetter->active) {
        static::where('id', '!=', $newsLetter->id)->update(['active' => false]);
      }
    });

    static::creating(function ($newsLetter) {
      if ($newsLetter->active) {
        static::where('active', true)->update(['active' => false]);
      }
    });
  }
}
