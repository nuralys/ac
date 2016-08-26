<?php

class ClientsController extends AppController{

	public function index(){
		$title_for_layout = 'Клиенты';

		$data = $this->Client->find('all');
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_index(){
		$data = $this->Client->find('all');
		$title_for_layout = 'Клиенты';
		// debug($data);
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Client->create();
			$data = $this->request->data['Client'];
			// debug($this->request->data);
			// debug($data);

			if($this->Client->save($data)){
				$this->Session->setFlash('Saved', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Error', 'default', array(), 'bad');
			}
		}
		$title_for_layout = 'Add new Client';
		$s_list = $this->Client->find('list');
		$this->set(compact('title_for_layout', 's_list'));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Client->exists($id)){
			throw new NotFoundException('Not found...');
		}
		$data = $this->Client->findById($id);
		if(!$id){
			throw new NotFoundException('Not found...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Client->id = $id;
			$data1 = $this->request->data['Client'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Client->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Editing material';
			$this->set(compact('id', 'data', 'title_for_layout'));
		}
	}

	public function admin_delete($id){
		if (!$this->Client->exists($id)) {
			throw new NotFounddException('This material is not');
		}
		if($this->Client->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
}