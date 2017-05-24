<?php
App::uses('AppModel', 'Model');
/**
 * ProdutoComplemento Model
 *
 * @property Pedido $Pedido
 * @property Produto $Produto
 */
class ProdutoComplemento extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'pedido_id';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Pedido' => array(
			'className' => 'Pedido',
			'foreignKey' => 'pedido_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Produto' => array(
			'className' => 'Produto',
			'foreignKey' => 'produto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Complemento' => array(
			'className' => 'Complemento',
			'foreignKey' => 'complemento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
