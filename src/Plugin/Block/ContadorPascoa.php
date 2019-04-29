<?php

namespace Drupal\felizpascoa\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AcccountInterface;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "contador_pascoa_block",
 *   admin_label = @Translation("Contador"),
 * )
 */
class ContadorPascoa extends BlockBase{
  public function build() {
	// Define as datas
    $data_atual = date('d-m-Y');
    $data_final = date('2020-04-12');

    // Converte as datas para a hora UNIX e realiza o calculo da diferenca e divide isso pela quantia de segundos em um dia.
    $diferenca  = (strtotime($data_final) - strtotime($data_atual))/86400;

    // Exibe a mensagem indicando quantos dias faltam para pascoa ou se hoje é pascoa.
    $resultado = ($diferenca >= 0) ? 'Faltam ' .$diferenca. ' dias para a Páscoa' : 'Chegou a Pascoa vai pokeOvo';
    $resultado .= "<a href='Drupal/pascoa'><br>Acesse aqui</a>"; 
    return[
    	'#markup' => $resultado,
    ];
  }


/**
   * {@inheritdoc}
   
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }*/

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
  /*  $this->configuration['my_block_settings'] = $form_state->getValue('my_block_settings');
  */}
}