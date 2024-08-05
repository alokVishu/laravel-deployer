<?php

if (!function_exists('calculate_reading_time')) {
  /**
   * Calculate the estimated reading time for a given text.
   *
   * @param string $text
   * @param int $wordsPerMinute
   * @return string
   */
  function calculate_reading_time($text, $wordsPerMinute = 200)
  {
    $wordCount = str_word_count(strip_tags($text));
    $readingTime = ceil($wordCount / $wordsPerMinute);

    return $readingTime . ' minute' . ($readingTime > 1 ? 's' : '');
  }
}
