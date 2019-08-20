<?php


namespace Drupal\module_hero\Form;


use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class HeroConfigForm extends ConfigFormBase
{

  /**
   * Gets the configuration names that will be editable.
   *
   * @return array
   *   An array of configuration object names that are editable if called in
   *   conjunction with the trait's config() method.
   */
  protected function getEditableConfigNames()
  {
    return [
      'module_hero.settings',
    ];
  }

  /**
   * Returns a unique string identifying the form.
   *
   * The returned ID should be a unique string that can be a valid PHP function
   * name, since it's used in hook implementation names such as
   * hook_form_FORM_ID_alter().
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId()
  {
    return "module_hero_confighero";
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @return array
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('module_hero.settings');

    $form['hero_list_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Hero List'),
      '#default_value' => $config->get('hero_list_title'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $config = $this->configFactory->getEditable('module_hero.settings');
    $config
      ->set('hero_list_title', $form_state->getValue('hero_list_title'))
      ->save();
    parent::submitForm($form, $form_state);
  }
}
