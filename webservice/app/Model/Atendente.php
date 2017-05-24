<?php
App::uses('AppModel', 'Model');
/**
 * Atendente Model
 *
 * @property Restaurante $Restaurante
 */
class Atendente extends AppModel {


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

	public function beforeSave($options = array()) {
		if(isset($this->data['Atendente']['senha'])) {
			$this->data['Atendente']['senha'] = md5($this->data['Atendente']['senha']);	
		}
		return parent::beforeSave($options);
	}
}
