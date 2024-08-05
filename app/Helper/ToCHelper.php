<?php

namespace App\Helper;

use DOMDocument;

class ToCHelper
{
  static function generateTOC($content)
  {
    $dom = new DOMDocument();
    @$dom->loadHTML($content);

    foreach (range(1, 6) as $level) {
      $headings = $dom->getElementsByTagName("h$level");
      foreach ($headings as $heading) {
        $id = str_replace(' ', '-', strtolower($heading->textContent));
        $heading->setAttribute('id', $id);
        $existingClass = $heading->getAttribute('class');
        $newClass = 'scroll-anchor';
        $heading->setAttribute('class', $existingClass . ' ' . $newClass);
      }
    }
    $headings = $dom->getElementsByTagName('*');

    $headingElements = [];
    foreach ($headings as $heading) {
      if (in_array($heading->nodeName, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'])) {
        $headingElements[] = [
          'level' => $heading->nodeName,
          'text' => $heading->nodeValue,
          'id' => $heading->getAttribute('id'),
        ];
      }
    }

    // Return the modified HTML content and TOC data
    return [
      'toc' => $headingElements,
      'content' => $dom->saveHTML(),
    ];
  }
}
