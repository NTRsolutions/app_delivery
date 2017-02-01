<?php
App::uses('AppModel', 'Model');
/**
 * Gerente Model
 *
 * @property Restaurante $Restaurante
 */
class Gerente extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Restaurante' => array(
			'className' => 'Restaurante',
			'foreignKey' => 'gerente_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
