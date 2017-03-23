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

	/*public function beforeSave($options = array()) {

		if((isset($this->data['Promocao']['data_ini'])) && (isset($this->data['Promocao']['data_fim']))) {
			$this->data['Promocao']['data_ini'] = date("Y-m-d", strtotime($this->data['Promocao']['data_ini']));
			$this->data['Promocao']['data_fim'] = date("Y-m-d", strtotime($this->data['Promocao']['data_fim']));
		}
		return parent::beforeSave($options);
	}*/
}
