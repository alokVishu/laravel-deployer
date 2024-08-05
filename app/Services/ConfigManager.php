<?php

namespace App\Services;

use App\Constants\ConfigConstants;
use App\Models\Config;

class ConfigManager
{
  public function loadConfigs()
  {
    $configs = cache()->many(ConfigConstants::OVERRIDABLE_CONFIGS);

    config($this->toKeyValueArray($configs));
  }

  private function toKeyValueArray($configs): array
  {
    $result = [];
    foreach ($configs as $key => $value) {
      if (is_null($value)) {
        continue;
      }

      $result[$key] = $value;
    }

    return $result;
  }

  public function set(string $key, $value): void
  {
    if (!in_array($key, ConfigConstants::OVERRIDABLE_CONFIGS)) {
      throw new \Exception("Config key $key is not overridable");
    }

    Config::set($key, $value);

    cache()->forever($key, $value);

    config([$key => $value]);
  }

  public function get(string $key, ?string $default = null): ?string
  {
    try {
      return Config::get($key) ?? config($key) ?? $default;
    } catch (\Exception $e) {
      return $default;
    }
  }
}
