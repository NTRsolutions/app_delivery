<?php
App::uses('AppModel', 'Model');
/**
 * PedidoProduto Model
 *
 * @property Pedido $Pedido
 * @property Produto $Produto
 */
class PedidoProduto extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id';


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
		)
	);
}
