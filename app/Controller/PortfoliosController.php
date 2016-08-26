<?php

class PortfoliosController extends AppController{
	public $components = array('Paginator');

	public function admin_index(){
		$data = $this->Portfolio->find('all');
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Portfolio->create();
			$data = $this->request->data['Portfolio'];
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->Portfolio->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Portfolio->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Portfolio->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Portfolio->id = $id;
			$data1 = $this->request->data['Portfolio'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Portfolio->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$services = $this->Portfolio->Service->find('list');
			$this->set(compact('id', 'data', 'services'));
		}
	}

	public function admin_delete($id){
		if (!$this->Portfolio->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Portfolio->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		
		$title_for_layout = 'Портфолио';
		$this->Paginator->settings = array(
				'fields' => array('id', 'title', 'body', 'position', 'img'),
				'recursive' => -1,
				'limit' => 10,
				'order' => array('position' => 'desc')
				);
		$data = $this->Paginator->paginate('Portfolio');
		// debug($news);
		$this->set(compact('data', 'title_for_layout'));
	}


	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Portfolio->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Portfolio->findById($id);
		$title_for_layout = $data['Portfolio']['title'];

		$this->set(compact('data', 'title_for_layout'));
	}

	
}