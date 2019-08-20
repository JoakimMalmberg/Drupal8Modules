<?php

namespace Drupal\myconfig\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class MyConfigForm extends FormBase
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
    return "myconfig.myconfigform";
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {


    $form['title'] = [
      '#type' => 'textfield',
      '#title' => 'title 2'
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
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
    $response = new AjaxResponse();
    $response->addCommand(
      new HtmlCommand(
        '.js-quickedit-page-title.title.page-title',
        $form_state->getValue('title')
      )
    );
    return $response;
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {

  }

//  /**
//   * @param $form
//   * @param FormStateInterface $form_state
//   * @param $form_id
//   */
//  function hook_form_alter(&$form, FormStateInterface $form_state, $form_id)
//  {
//
//
//    if ($form_id == 'myconfig.myconfigform') {
//
//  //    kint($form); die();
////      $form['title']['#title'] = 'arsgver';
//      $form['title']['#title'] = $form_state->getValue('title');
//
////
////    $form['#validate'][] = '_myconfig_article_validate';
//      return $form;
//    }
//
//  }

}
