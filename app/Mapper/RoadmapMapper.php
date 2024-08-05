<?php

namespace App\Mapper;

use App\Constants\RoadmapItemStatus;
use App\Constants\RoadmapItemType;
use App\Models\RoadmapItem;

class RoadmapMapper
{
  public static function mapStatusForDisplay(RoadmapItemStatus|string $status): string
  {

    if (is_string($status)) {
      $status = RoadmapItemStatus::tryFrom($status);
    }

    return match ($status) {
      RoadmapItemStatus::PLANNED => __('👍 Planned'),
      RoadmapItemStatus::IN_DEVELOPMENT => __('⏳ In Development'),
      RoadmapItemStatus::SHIPPED => __('✅ Shipped'),
      RoadmapItemStatus::CANCELLED => __('⛔️ Cancelled'),
      RoadmapItemStatus::REJECTED => __('👎 Declined'),
      RoadmapItemStatus::ARCHIVED => __('📚 Archived'),
      RoadmapItemStatus::PRIVATE => __('🔒 Private'),
      default => __('🙏 Under consideration'),
    };
  }

  public static function mapTypeForDisplay(RoadmapItemType|string $type): string
  {
    if (is_string($type)) {
      $type = RoadmapItemType::tryFrom($type);
    }

    return match ($type) {
      RoadmapItemType::FEATURE => __('🚀 Feature'),
      RoadmapItemType::BUG => __('🐛 Bug'),
    };
  }
}
