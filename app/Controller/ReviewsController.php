<?php

class ReviewsController extends AppController{

	public $uses = array('Review');

	public function index(){
		
		$data = $this->Review->find('all');
		$title_for_layout = 'Reviews';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Review->exists($id)){
			throw new NotFoundException('Not found...');
		}
		$data = $this->Review->findById($id);
		$title_for_layout = 'Review';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_index(){
		$data = $this->Review->find('all');
		$title_for_layout = 'Review';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Review->create();
			$data = $this->request->data['Review'];
			// debug($this->request->data);
			// debug($data);

			if($this->Review->save($data)){
				$this->Session->setFlash('Saved', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Error', 'default', array(), 'bad');
			}
		}
		$title_for_layout = 'Add new review';
		$this->set(compact('title_for_layout'));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Review->exists($id)){
			throw new NotFoundException('Not found...');
		}
		$data = $this->Review->findById($id);
		if(!$id){
			throw new NotFoundException('Not found...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Review->id = $id;
			$data1 = $this->request->data['Review'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Review->save($data1)){
				$this->Session->setFlash('Saved', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Error', 'default', array(), 'bad');
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
		if (!$this->Review->exists($id)) {
			throw new NotFounddException('This material is not');
		}
		if($this->Review->delete($id)){
			$this->Session->setFlash('Deleted', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Error', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function give_feedback(){
		if($this->request->is('post')){
			$this->Review->create();
			$data = $this->request->data['Review'];
			// debug($this->request->data);
			// debug($data);
			// die();
			if($this->Review->save($data)){
				$this->Session->setFlash('Saved', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Error', 'default', array(), 'bad');
			}
		}
	}
}