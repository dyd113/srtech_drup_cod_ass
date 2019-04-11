<?php

namespace Drupal\tile\Plugin\Condition;

use Drupal\Core\Condition\ConditionPluginBase;
use Drupal\Core\Form\FormStateInterface;

/**
 *
 * @Condition(
 *   id = "ip_address_display_restrict",
 *   label = @Translation("Ip Address Display / Restrict")
 * )
 */
class IpAddressDisplayRestrict extends ConditionPluginBase {

  /**
   * Creates a new IpAddressDisplayRestrict instance.
   *
   * @param array $configuration
   *   The plugin configuration, i.e. an array with configuration values keyed
   *   by configuration option name. The special key 'context' may be used to
   *   initialize the defined contexts by setting it to an array of context
   *   values keyed by context names.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
   
    $form['tile_iadr'] = [
      '#title' => $this->t('Ip Address Display / Restrict'),
      '#description' => $this->t('Ip Address Display / Restrict'),
      '#type' => 'textarea',
      '#default_value' => $this->configuration['tile_iadr'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['tile_iadr'] = array_filter($form_state->getValue('tile_iadr'));
    parent::submitConfigurationForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function summary() {
    return $this->t('Enter Ip Address per line');
  }

  /**
   * {@inheritdoc}
   */
  public function evaluate() {
    $request = \Drupal::request()->getClientIp();
    if (empty($this->configuration['tile_iadr']) && !$this->isNegated()) {
      return TRUE;
    }

    if (!empty($this->configuration['tile_iadr'])){
      $ip_list = preg_split('/\r\n|[\r\n]/', $this->configuration['tile_iadr']);
      $ip_check = array_search($request, $ip_list);
      if(($this->isNegated() && !$ip_check) || (!$this->isNegated() && $ip_check)){
        return TRUE;
      }
    }
    
    return FALSE;
  }

}
