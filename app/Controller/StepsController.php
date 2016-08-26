<?php

class StepsController extends AppController{
	public $components = array('Paginator');

	public function admin_index(){
		$data = $this->Step->find('all', array(
			'order' => array('Step.id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Step->create();
			$data = $this->request->data['Step'];
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->Step->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$services = $this->Step->Service->find('list');
		$this->set(compact('services'));
	}
	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Step->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Step->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Step->id = $id;
			$data1 = $this->request->data['Step'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Step->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$services = $this->Step->Service->find('list');
			$this->set(compact('id', 'data', 'services'));
		}
	}

	public function admin_delete($id){
		if (!$this->Step->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Step->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		
		$title_for_layout = 'Шаги';
		$this->Paginator->settings = array(
				'fields' => array('id', 'title', 'body', 'img'),
				'recursive' => -1,
				'limit' => 10,
				'order' => array('Step.id' => 'desc')
				);
		$data = $this->Paginator->paginate('Step');
		$this->set(compact('data', 'title_for_layout'));
	}


	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Step->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Step->findById($id);
		$title_for_layout = $data['Step']['title'];

		$this->set(compact('data', 'title_for_layout'));
	}

	
}