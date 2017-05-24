<?php
App::uses('AppModel', 'Model');
/**
 * RestauranteEndereco Model
 *
 * @property Endereco $Endereco
 * @property Restaurante $Restaurante
 */
class RestauranteEndereco extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'endereco_id';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Endereco' => array(
			'className' => 'Endereco',
			'foreignKey' => 'endereco_id',
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
