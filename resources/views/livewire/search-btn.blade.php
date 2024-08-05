<?php
$os = PHP_OS;
?>
<div class="block">
  {{-- The Master doesn't talk, he acts. --}}
  <button class="rounded-md rounded-full flex px-3 ms-0 py-1.5 gap-1.5 items-center search-btn"
    @click="$dispatch('toggle-spotlight')">
    @svg('tabler-search', 'h-5 w-5 search-icon')
    <div class="search-placeholder">Search...</div>
    <div class="text-sm text-gray-500 dark:text-gray-500">{{ $os === ('windows' || 'linux') ? 'CTRL K' : '⌘ K' }}</div>
  </button>
</div>
