<?php

class ServicesController extends AppController{
	// public $uses = array('Service');

	public function admin_index(){
		$data = $this->Service->find('all', array(
			'order' => array('Service.id' => 'desc')
		));
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Service->create();
			$data = $this->request->data['Service'];
			
			if(empty($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			
			if($this->Service->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$c_list = $this->Service->find('list');
		return $this->set(compact('c_list'));
	}
	
	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Service->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Service->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Service->id = $id;
			$data1 = $this->request->data['Service'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			
			if($this->Service->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$c_list = $this->Service->find('list');
			$this->set(compact('id', 'data', 'c_list'));
		}
	}

	public function admin_delete($id){
		if (!$this->Service->exists($id)) {
			throw new NotFounddException('Такого материала нет');
		}
		if($this->Service->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$title_for_layout = 'Услуги';
		$data = $this->Service->find('all', array(
			'order' => array('Service.id' => 'desc')
			));
		// $steps = $this->Service->Step
		// debug($data);
		$meta['keywords'] = 'keywords';
		$meta['description'] = 'description';

		$this->set(compact('data', 'title_for_layout', 'meta'));
	}


	public function view($alias){
		// if(is_null($id) || !(int)$id || !$this->Service->exists($alias)){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		$data = $this->Service->findByAlias($alias);
		$id = $data['Service']['id'];
		$parent_services = $this->Service->find('all', array(
			'conditions' => array('Service.parent_id' => 0),
			'recursive' => -1,
			'fields' => array('id', 'title', 'img', 'alias')
		));
		$child_services  = $this->Service->find('all', array(
			'conditions' => array('Service.parent_id' => $id),
			'recursive' => -1,
			'fields' => array('id', 'title', 'img', 'alias')
		));
		// debug($parent_services);
		$services = $this->Service->find('all');
		$bc = $this->_breadcrumbs($services, $data);
		$id = $data['Service']['id'];
		$ids = $this->_catsIds($services, $id);
		$ids = !$ids ? $id : $ids . $id;
		$ids = explode(",", $ids);
		$portfolios = $this->Service->Portfolio->find('all', array(
			'conditions' => array('Portfolio.service_id' => $ids),
			'recursive' => -1
		));
		
		$title_for_layout = $data['Service']['title'];
		$meta['keywords'] = $data['Service']['keywords'];
		$meta['description'] = $data['Service']['description'];
		$this->set(compact('data', 'title_for_layout', 'meta', 'portfolios', 'parent_services', 'child_services', 'bc'));
	}

	protected function _breadcrumbs($services, $data){
		$ar = array();
		$i = 0;
		$parent_id = $data['Service']['parent_id'];
		// debug($parent_id);
		// die;
		foreach($services as $item){
			if($item['Service']['id'] == $parent_id){
				$ar['BC']['alias'] = $item['Service']['alias'];
				$ar['BC']['title'] = $item['Service']['title'];
			}
			$i++;
		}
		return $ar;
	}

	protected function _catsIds($cats, $id){
		$data = '';
		foreach($cats as $item){
			if($item['Service']['parent_id'] == $id){
				$data .= $item['Service']['id'] . ',';
				$data .= $this->_catsIds($cats, $item['Service']['id']);
			}
		}
		return $data;
	}

	protected function _child_services($id){
		$q = $this->Service->find('all', array(
			'conditions' => array('parent_id' => $id)
		));
		return $q;
	}

}