<?php
App::uses('AppModel', 'Model');
/**
 * Classificacao Model
 *
 * @property Restaurante $Restaurante
 * @property Cliente $Cliente
 */
class Classificacao extends AppModel {


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
		),
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
