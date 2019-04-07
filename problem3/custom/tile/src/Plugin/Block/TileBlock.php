<?php

namespace Drupal\tile\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Condition\ConditionPluginBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;



/**
 * Provides a 'tile' block.
 *
 * @Block(
 *   id = "tile_block",
 *   admin_label = @Translation("Tile block"),
 *   category = @Translation("Custom tile block")
 * )
 */
class TileBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {
      $config = $this->getConfiguration();
      $title = $config['tile_block_title'];
      $descp = $config['tile_block_description'];
      $image = $config['tile_block_image'];
      $file = \Drupal\file\Entity\File::load($image[0]);
      $path = $file->getFileUri();
      $image_path = file_create_url($path);
      return [
        '#theme' => 'tile_template',
        '#attached' => [
          'library' => [
            'tile/tile',
          ]
        ],
        '#title' => $title,
        '#descp' => $descp,
        '#image' => $image_path,
      ];
  }

     /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
      $form = parent::blockForm($form, $form_state);

      $config = $this->getConfiguration();

      $form['tile_block_title'] = array(
        '#type' => 'textfield',
        '#title' => $this->t('Tile Title'),
        '#description' => $this->t('Tile Title here'),
        '#default_value' => isset($config['tile_block_title']) ? $config['tile_block_title'] : '',
        '#required' => true,
      );

      $form['tile_block_description'] = array(
        '#type' => 'textarea',
        '#title' => $this->t('Tile Description'),
        '#description' => $this->t('Tile Description here'),
        '#default_value' => isset($config['tile_block_description']) ? $config['tile_block_description'] : '',
        '#required' => true,
      );

        $form['tile_block_image'] = array(
          '#type' => 'managed_file',
          '#upload_location' => 'public://upload/tile_block',
          '#title' => t('Tile Image'),
          '#upload_validators' => [
              'file_validate_extensions' => ['jpg', 'jpeg', 'png', 'gif']
          ],
          '#default_value' => isset($config['tile_block_image']) ? $config['tile_block_image'] : '',
          '#description' => t('The Tile image to display'),
          '#required' => true,
      );

      return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['tile_block_title'] = $values['tile_block_title'];
    $this->configuration['tile_block_description'] = $values['tile_block_description'];
    $this->configuration['tile_block_image'] = $values['tile_block_image'];
  }

  /**
     * {@inheritdoc}
     */
    public function getCacheMaxAge() {
      return 0;
  }

}
