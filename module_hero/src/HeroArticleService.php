<?php

namespace Drupal\module_hero;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Entity\Query\QueryFactoryInterface;

/**
 * Class HeroArticleService
 */
class HeroArticleService
{

  private $entityQuery;

  /**
   * @var EntityTypeManagerInterfaceManager
   */
  private $entityTypeManager;

  /**
   * HeroArticleService constructor.
   * @param QueryFactoryInterface $entityQuery
   * @param EntityTypeManagerInterface $entityTypeManager
   */
  public function __construct(QueryFactoryInterface $entityQuery, EntityTypeManagerInterface $entityTypeManager)
  {
    $this->entityQuery = $entityQuery;

    $this->entityTypeManager = $entityTypeManager;
  }

  /**
   * Method for getting Articles, regarding heroes.
   */
  public function getHeroArticles()
  {
    $articleNids = $this->entityQuery->get('node')->condition('type', 'article')->execute();

    return kint($this->entityTypeManager->getStorage('node')->loadMultiple($articleNids));
  }
}
