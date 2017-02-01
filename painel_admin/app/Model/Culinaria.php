<?php
App::uses('AppModel', 'Model');
/**
 * Culinaria Model
 *
 * @property Restaurante $Restaurante
 */
class Culinaria extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Restaurante' => array(
			'className' => 'Restaurante',
			'foreignKey' => 'restaurante_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
