<?php

declare(strict_types=1);

namespace Drupal\entity_import;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining an entity import entity type.
 */
interface EntityImportInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
