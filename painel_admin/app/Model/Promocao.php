<?php
App::uses('AppModel', 'Model');
/**
 * Promocao Model
 *
 * @property Produto $Produto
 * @property Restaurante $Restaurante
 */
class Promocao extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'produto_id';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Produto' => array(
			'className' => 'Produto',
			'foreignKey' => 'produto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Restaurante' => array(
			'className' => 'Restaurante',
			'foreignKey' => 'restaurante_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
