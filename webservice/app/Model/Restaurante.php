<?php
App::uses('AppModel', 'Model');
/**
 * Restaurante Model
 *
 * @property Gerente $Gerente
 * @property Franqueado $Franqueado
 * @property Atendente $Atendente
 * @property Classificacao $Classificacao
 * @property Culinaria $Culinaria
 * @property Pagamento $Pagamento
 * @property Produto $Produto
 * @property Promocao $Promocao
 * @property RestauranteEndereco $RestauranteEndereco
 */
class Restaurante extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Gerente' => array(
			'className' => 'Gerente',
			'foreignKey' => 'gerente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Franqueado' => array(
			'className' => 'Franqueado',
			'foreignKey' => 'franqueado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Atendente' => array(
			'className' => 'Atendente',
			'foreignKey' => 'restaurante_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => true,
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Culinaria' => array(
			'className' => 'Culinaria',
			'foreignKey' => 'restaurante_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => true,
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Pagamento' => array(
			'className' => 'Pagamento',
			'foreignKey' => 'restaurante_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => true,
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Pedido' => array(
			'className' => 'Pedido',
			'foreignKey' => 'restaurante_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => true,
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Produto' => array(
			'className' => 'Produto',
			'foreignKey' => 'restaurante_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => true,
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'RestauranteEndereco' => array(
			'className' => 'RestauranteEndereco',
			'foreignKey' => 'restaurante_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => true,
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
