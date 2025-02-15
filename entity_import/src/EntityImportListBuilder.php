<?php

declare(strict_types=1);

namespace Drupal\entity_import;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

/**
 * Provides a list controller for the entity import entity type.
 */
final class EntityImportListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader(): array {
    $header['id'] = $this->t('ID');
    $header['city'] = $this->t('City');
    $header['state'] = $this->t('State');
    $header['status'] = $this->t('Status');
    $header['uid'] = $this->t('Author');
    $header['created'] = $this->t('Created');
    $header['changed'] = $this->t('Updated');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity): array {
    /** @var \Drupal\entity_import\EntityImportInterface $entity */
    $row['id'] = $entity->toLink();
    $row['city'] = $entity->get('city')->value;
    $row['state'] = $entity->get('state')->value;
    $row['status'] = $entity->get('status')->value ? $this->t('Enabled') : $this->t('Disabled');
    $username_options = [
      'label' => 'hidden',
      'settings' => ['link' => $entity->get('uid')->entity->isAuthenticated()],
    ];
    $row['uid']['data'] = $entity->get('uid')->view($username_options);
    $row['created']['data'] = $entity->get('created')->view(['label' => 'hidden']);
    $row['changed']['data'] = $entity->get('changed')->view(['label' => 'hidden']);
    return $row + parent::buildRow($entity);
  }

}
