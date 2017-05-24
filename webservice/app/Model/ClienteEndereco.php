<?php
App::uses('AppModel', 'Model');
/**
 * ClienteEndereco Model
 *
 * @property Cliente $Cliente
 * @property Endereco $Endereco
 */
class ClienteEndereco extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'cliente_id';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
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
