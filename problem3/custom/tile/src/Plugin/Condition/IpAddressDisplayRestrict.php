<?php

namespace Drupal\tile\Plugin\Condition;

use Drupal\Core\Condition\ConditionPluginBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * {@inheritdoc}
 */

/**
 *
 * @Condition(
 *   id = "ip_address_display_restrict",
 *   label = @Translation("Ip Address Display / Restrict")
 * )
 */
class IpAddressDisplayRestrict extends ConditionPluginBase implements ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  protected $requestStack;

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, RequestStack $request_stack) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $request_stack);
    $this->requestStack = $request_stack;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
          $configuration,
          $plugin_id,
          $plugin_definition,
          $container->get('request_stack')
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
    $this->configuration['tile_iadr'] = $form_state->getValue('tile_iadr');
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
    $requestIp = $this->requestStack->getCurrentRequest()->getClientIp();
    if (empty($this->configuration['tile_iadr']) && !$this->isNegated()) {
      return TRUE;
    }
    if (!empty($this->configuration['tile_iadr'])) {
      $ip_list = preg_split('/\r\n|[\r\n]/', $this->configuration['tile_iadr']);
      $ip_check = array_search($requestIp, $ip_list);
      if (($this->isNegated() && !$ip_check) || (!$this->isNegated() && $ip_check)) {
        return TRUE;
      }
    }
    return FALSE;
  }

}
