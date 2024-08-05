<?php

namespace App\Constants;

enum RoadmapItemStatus: string
{
  case UNDER_CONSIDERATION = 'under_consideration';
  case PLANNED = 'planned';
  case IN_DEVELOPMENT = 'in_development';
  case SHIPPED = 'shipped';
  case CANCELLED = 'cancelled';
  case REJECTED = 'rejected';
  case ARCHIVED = 'archived';
  case PRIVATE = 'private';
}
