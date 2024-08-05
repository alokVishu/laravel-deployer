<?php

namespace Database\Seeders;

use App\Models\NewsLetter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsLetterSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    NewsLetter::updateOrCreate(
      ['provider_name' => 'MailChimp'],
      [
        'slug' => 'mailchimp',
      ]
    );

    NewsLetter::updateOrCreate(
      ['provider_name' => 'Convert kit'],
      [
        'slug' => 'Convert kit',
      ]
    );
  }
}
