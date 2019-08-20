<?php

namespace Drupal\module_hero\Controller;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\module_hero\HeroArticleService;
use Symfony\Component\DependencyInjection\ContainerInterface;


class HeroController extends ControllerBase{

  private $articleHeroService;
  protected $configFactory;

  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('module_hero.hero_articles'),
      $container->get('config.factory')
    );
  }

  public function __construct(HeroArticleService $articleHeroService, ConfigFactoryInterface $configFactory)
  {
    $this->articleHeroService = $articleHeroService;
    $this->configFactory = $configFactory;
  }

  public function heroList()
  {

    $heroes = [
      ['name' => 'Hulk'],
      ['name' => 'Thor'],
      ['name' => 'Iron Man'],
      ['name' => 'Captain America'],
      ['name' => 'Daredevil'],
      ['name' => 'Black Widow'],
    ];


    return [
      '#theme' => 'hero_list',
      '#items' => $heroes,
      '#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
    ];
  }

}
