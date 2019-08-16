<?php

namespace Drupal\module_hero\Controller;

use Drupal\Core\Controller\ControllerBase;

class HeroController extends ControllerBase{
  /**
   * @return array
   */
  public function heroList() {
    $heroes = [
      ['name' => 'Hulk'],
      ['name' => 'Thor'],
      ['name' => 'Iron Man'],
      ['name' => 'Captain America'],
      ['name' => 'Daredevil'],
      ['name' => 'Black Widow'],
    ];

    $ourHeroes = '';

    foreach ($heroes as $hero) {
      $ourHeroes .= '<li>' . $hero['name'] . '</li>';
    }

    return [
      '#type' => 'markup',
      '#markup' => '<h4>' . $this->t('These are the best voted heroes') . '</h4>' . '<ol>' . $ourHeroes . '</ol>',
    ];
  }
}
