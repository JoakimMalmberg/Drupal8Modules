<?php

namespace Drupal\module_hero\Plugin\Block;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Class HeroBlock
 * @Block(
 *   id = "module_hero_hero",
 *   admin_label= @Translation("Example hero block")
 * )
 */
class HeroBlock extends BlockBase
{

  /**
   * @return array
   */
  public function build()
  {

    $heroes = [
      ['hero_name' => 'Hulk', 'real_name' => 'Bruce Banner'],
      ['hero_name' => 'Thor', 'real_name' => 'Thor Odinson'],
      ['hero_name' => 'Iron Man', 'real_name' => 'Tony Stark'],
      ['hero_name' => 'Captain America', 'real_name' => 'Steve Rogers'],
      ['hero_name' => 'Daredevil', 'real_name' => 'Matthew Murdock'],
      ['hero_name' => 'Black Widow', 'real_name' => 'Natalia Romanova'],
    ];

    $table = [
      '#type' => 'table',
      '#header' => [
        $this->t('Hero name'),
        $this->t('Real name')
      ]
    ];

    foreach ($heroes as $hero) {
      $table[] = [
        'hero_name' => [
          '#type' => 'markup',
          '#markup' => $hero['hero_name'],
        ],
        'real_name' => [
          '#type' => 'markup',
          '#markup' => $hero['real_name'],
        ]
      ];
    }
    return $table;
  }
}
