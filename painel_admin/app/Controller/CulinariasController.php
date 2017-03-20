<?php
App::uses('AppController', 'Controller');
/**
 * Culinarias Controller
 *
 * @property Culinaria $Culinaria
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class CulinariasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Culinaria->recursive = 0;
		$this->set('culinarias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Culinaria->exists($id)) {
			throw new NotFoundException(__('Invalid culinaria'));
		}
		$options = array('conditions' => array('Culinaria.' . $this->Culinaria->primaryKey => $id));
		$this->set('culinaria', $this->Culinaria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		$gerente = $this->Session->read('Gerente');
		$options = array('fields' => 'Culinaria.idTipo', 'conditions' => array('Culinaria.restaurante_id' => $gerente['0']['Restaurante']['0']['id']));
		$culinarias = $this->Culinaria->find('list', $options);

		$tipo = array(
            1  => 'Brasileira',
            2  => 'Japonesa',
            3  => 'Italiana',
            4  => 'Chinesa',
            5  => 'Portuguesa',
            6  => 'Mexicana',
            7  => 'Espanhola',
            8  => 'Francesa',
            9  => 'Alemã',
            10 => 'Colombiana',
            11 => 'Grega',
            12 => 'Irlandesa',
            13 => 'Marroquina',
            14 => 'Polonesa',
            15 => 'Tailandesa',
            16 => 'Argentina',
            17 => 'Africana',
            18 => 'Australiana',
            19 => 'Americana',
            20 => 'Chilena',
            21 => 'Peruana',
            22 => 'Sueca',
            23 => 'Suíça',
            24 => 'Uruguaia',
            25 => 'Havaiana',
            26 => 'Húngara',
  			27 => 'Árabe'
        );
        $this->set(compact('tipo'));

		if ($this->request->is('post')) {

			if(!empty($this->data['Culinaria']['tipo'])){

				$tamCul = count($culinarias);
				$tamData = count($this->data['Culinaria']['tipo']);

				if($tamData > $tamCul) {

					$save = $this->addCulinaria($this->data['Culinaria']['tipo'], $tipo);

					if ($save == true) {
						$this->Session->setFlash(__('As culinárias selecionadas foram salvas com sucesso!'), 'default', array('class' => 'alert alert-success'));
						return $this->redirect(array('controller' => 'gerentes', 'action' => 'meu_restaurante'));
					} else {
						$this->Session->setFlash(__('Selecione ou desmarque uma culinária.'), 'default', array('class' => 'alert alert-danger'));
					}

 				} else if ($tamData < $tamCul) {

                	$this->excluirCulinaria($this->data['Culinaria']['tipo'], $culinarias, $tipo);

                } else {

                	$save = $this->addCulinaria($this->data['Culinaria']['tipo'], $tipo);
                	$this->excluirCulinaria($this->data['Culinaria']['tipo'], $culinarias, $tipo);
                }
            }

		} else {
			$gerente = $this->Session->read('Gerente');
			$options = array('fields' => 'Culinaria.idTipo', 'conditions' => array('Culinaria.restaurante_id' => $gerente['0']['Restaurante']['0']['id']));
			$this->request->data['Culinaria']['tipo'] = $this->Culinaria->find('list', $options);
		}

		if($this->Session->check('Gerente')){
			$gerente = $this->Session->read('Gerente');
			$options = array('fields' => 'Restaurante.nome', 'conditions' => array('Restaurante.id' => $gerente['0']['Restaurante']['0']['id']));
			$restaurantes = $this->Culinaria->Restaurante->find('list', $options);
			$this->set(compact('restaurantes'));
		} else {
			$options = array('fields' => 'Restaurante.nome');
			$restaurantes = $this->Culinaria->Restaurante->find('list', $options);
			$this->set(compact('restaurantes'));
		}
	}

	public function addCulinaria($data, $tipo) {

		$save = false;

		foreach ($data as $ct) {

        	$culinariaTipo = $this->Culinaria->findByTipo($tipo[$ct]);

        	if(empty($culinariaTipo)) {
        		$cln = array('idTipo' => $ct, 'tipo' => $tipo[$ct], 'restaurante_id' => $this->request->data['Culinaria']['restaurante_id']);
            	$this->Culinaria->create();
            	$this->Culinaria->save($cln);
            	$save = true;
        	}
        }

        return $save;
	}

	public function excluirCulinaria($data1, $data2, $tipo) {

		$existe = false;

    	foreach ($data2 as $c1) {

    		$existe = false;

    		$type2 = $this->Culinaria->findByTipo($tipo[$c1]);

    		foreach ($data1 as $ct) {

        		$type = $this->Culinaria->findByTipo($tipo[$ct]);

        		if($type2['Culinaria']['tipo'] == $type['Culinaria']['tipo']) {
        			$existe = true;
        		} 
        	}

        	if($existe == false) {
        		$this->delete2($type2['Culinaria']['id']);
        	}
        }
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Culinaria->exists($id)) {
			throw new NotFoundException(__('Invalid culinaria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Culinaria->save($this->request->data)) {
				$this->Session->setFlash(__('The culinaria has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The culinaria could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Culinaria.' . $this->Culinaria->primaryKey => $id));
			$this->request->data = $this->Culinaria->find('first', $options);
		}
		$restaurantes = $this->Culinaria->Restaurante->find('list');
		$this->set(compact('restaurantes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Culinaria->id = $id;
		if (!$this->Culinaria->exists()) {
			throw new NotFoundException(__('Invalid culinaria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Culinaria->delete()) {
			$this->Session->setFlash(__('A culinária foi excluída com sucesso!'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The culinaria could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('controller' => 'gerentes', 'action' => 'meu_restaurante'));
	}

	public function delete2($id = null) {
		$this->Culinaria->id = $id;
		if (!$this->Culinaria->exists()) {
			throw new NotFoundException(__('Invalid culinaria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Culinaria->delete()) {
			$this->Session->setFlash(__('A culinária marcada e/ou desmarcada foi adicionada e/ou excluída com sucesso!'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The culinaria could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('controller' => 'gerentes', 'action' => 'meu_restaurante'));
	}
}
