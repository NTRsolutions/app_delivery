<?php
App::uses('AppController', 'Controller');
/**
 * Restaurantes Controller
 *
 * @property Restaurante $Restaurante
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class RestaurantesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function get() {
		$this->loadModel('Endereco');

		$cidade_id = $this->request->data['cidade_id'];
		$restaurantes = array();
		$ids = array();

		$endereços = $this->Endereco->findAllByCidadeId($cidade_id);
		foreach ($endereços as $e) {
			if (count($e['RestauranteEndereco']) > 0) {
				$id = $e['RestauranteEndereco']['0']['restaurante_id'];
				$options = array(
					'contain' => array(
						'Culinaria',
						'Franqueado',
						'Gerente',
						'Pagamento',
						'Produto',
						'RestauranteEndereco' => array(
							'Endereco'
						)
					),
					'conditions' => array(
						'Restaurante.' . $this->Restaurante->primaryKey => $id
					)
				);
				$r = $this->Restaurante->find('first', $options);
				array_push($restaurantes, $r);
			}
		}

		$this->set(array(
            'message' => $restaurantes,
            '_serialize' => array('message')
        ));
	}

	public function getById() {
		if ($this->request->is('post')) {
			$restaurantes = array();
			$ids = $this->data['ids'];

			foreach ($ids as $id) {
				$options = array(
					'conditions' => array(
						'Restaurante.' . $this->Restaurante->primaryKey => $id
					)
				);
				$r = $this->Restaurante->find('first', $options);
				array_push($restaurantes, $r);
			}

			$this->set(array(
	            'message' => $restaurantes,
	            '_serialize' => array('message')
	        ));
		}
	}
}
