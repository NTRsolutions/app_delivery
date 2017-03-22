<?php
App::uses('AppModel', 'Model');
/**
 * Franqueado Model
 *
 * @property Restaurante $Restaurante
 */
class Franqueado extends AppModel {

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Restaurante' => array(
			'className' => 'Restaurante',
			'foreignKey' => 'franqueado_id',
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
		'FranqueadoEndereco' => array(
			'className' => 'FranqueadoEndereco',
			'foreignKey' => 'franqueado_id',
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

	public function beforeSave($options = array()) {
		if(isset($this->data['Franqueado']['senha'])) {
			$this->data['Franqueado']['senha'] = md5($this->data['Franqueado']['senha']);	
		}
		return parent::beforeSave($options);
	}

}
