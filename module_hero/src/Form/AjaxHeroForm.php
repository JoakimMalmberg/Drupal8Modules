<?php


namespace Drupal\module_hero\Form;


use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;

class AjaxHeroForm extends FormBase
{

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
    return "module_hero_ajaxhero";
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['message'] = [
      '#type' => 'markup',
      '#markup' => '<div class="result_message"></div>',
    ];

    $form['rival_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Rival One'),
    ];

    $form['rival_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Rival Two'),
    ];

    $form['submit'] = [
      '#type' => 'button',
      '#value' => $this->t('Who will win?'),
      '#ajax' => [
        'callback' => '::setMessage',
      ]
    ];
    return $form;
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @param MessengerInterface $messenger
   * @return AjaxResponse|void
   */
  public function setMessage(array &$form, FormStateInterface $form_state)
  {
    $winner = rand(1, 2);
    $response = new AjaxResponse();
    $response->addCommand(
      new HtmlCommand(
        '.result_message',
        'The winner is ' . $form_state->getValue('rival_' . $winner)
      )
    );
    return $response;
  }


  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // TODO: Implement submitForm() method.
  }
}
