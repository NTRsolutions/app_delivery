<?php
App::uses('AppModel', 'Model');
/**
 * Restaurante Model
 *
 * @property Gerente $Gerente
 * @property Franqueado $Franqueado
 * @property Atendente $Atendente
 * @property Classificacao $Classificacao
 * @property Culinaria $Culinaria
 * @property Pagamento $Pagamento
 * @property Produto $Produto
 * @property Promocao $Promocao
 * @property RestauranteEndereco $RestauranteEndereco
 */
class Restaurante extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Gerente' => array(
			'className' => 'Gerente',
			'foreignKey' => 'gerente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Franqueado' => array(
			'className' => 'Franqueado',
			'foreignKey' => 'franqueado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Atendente' => array(
			'className' => 'Atendente',
			'foreignKey' => 'restaurante_id',
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
		'Culinaria' => array(
			'className' => 'Culinaria',
			'foreignKey' => 'restaurante_id',
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
		'Pagamento' => array(
			'className' => 'Pagamento',
			'foreignKey' => 'restaurante_id',
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
		'Pedido' => array(
			'className' => 'Pedido',
			'foreignKey' => 'restaurante_id',
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
		'Produto' => array(
			'className' => 'Produto',
			'foreignKey' => 'restaurante_id',
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
		'RestauranteEndereco' => array(
			'className' => 'RestauranteEndereco',
			'foreignKey' => 'restaurante_id',
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
		//debug($this->data);
		if(!empty($this->data['Restaurante']['foto']['name'])) {
	        $this->data['Restaurante']['foto'] = $this->upload($this->data['Restaurante']['foto']);
	    } else {
	        unset($this->data['Restaurante']['foto']);
	    }
	}

	public function upload($foto = array(), $dir = 'img') {
	    $dir = WWW_ROOT.$dir.DS;

	    if(($foto['error']!=0) and ($foto['size']==0)) {
	        throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$foto['error'].' e tamanho '.$foto['size']);
	    }

	    $foto = $this->checa_nome($foto, $dir);

	    $this->move_arquivos($foto, $dir);

	    return $foto['name'];
	}

	public function checa_nome($foto, $dir) {
	    $imagem_info = pathinfo($dir.$foto['name']);
	    $imagem_nome = $this->trata_nome($imagem_info['filename']).'.'.$imagem_info['extension'];
	    //debug($imagem_nome);
	    $conta = 2;
	    while (file_exists($dir.$imagem_nome)) {
	        $imagem_nome  = $this->trata_nome($imagem_info['filename']).'-'.$conta;
	        $imagem_nome .= '.'.$imagem_info['extension'];
	        $conta++;
	        //debug($imagem_nome);
	    }
	    $foto['name'] = $imagem_nome;
	    return $foto;
	}

	public function trata_nome($imagem_nome) {
	    $imagem_nome = strtolower(Inflector::slug($imagem_nome,'-'));
	    return $imagem_nome;
	}

	public function move_arquivos($foto, $dir) {
	    App::uses('File', 'Utility');
	    $arquivo = new File($foto['tmp_name']);
	    $arquivo->copy($dir.$foto['name']);
	    $arquivo->close();
	}

}
