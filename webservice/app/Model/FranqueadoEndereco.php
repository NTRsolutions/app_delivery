<?php
App::uses('AppModel', 'Model');
/**
 * FranqueadoEndereco Model
 *
 * @property Franqueado $Franqueado
 * @property Endereco $Endereco
 */
class FranqueadoEndereco extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'franqueado_id';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Franqueado' => array(
			'className' => 'Franqueado',
			'foreignKey' => 'franqueado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Endereco' => array(
			'className' => 'Endereco',
			'foreignKey' => 'endereco_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
