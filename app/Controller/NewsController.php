<?php

class NewsController extends AppController{
	public $components = array('Paginator');

	public function admin_index(){
		$data = $this->News->find('all', array(
			'order' => array('date' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->News->create();
			$data = $this->request->data['News'];
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->News->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->News->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->News->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->News->id = $id;
			$data1 = $this->request->data['News'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->News->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			
			$this->set(compact('id', 'data'));
		}
	}

	public function admin_delete($id){
		if (!$this->News->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->News->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		
		$title_for_layout = 'Интересные новости в области IT';
		$meta['keywords'] = 'клю';
		$meta['description'] = 'опи';
		$this->Paginator->settings = array(
				'fields' => array('id', 'title', 'body', 'date', 'img'),
				'recursive' => -1,
				'limit' => 10,
				'order' => array('date' => 'desc')
				);
		$news = $this->Paginator->paginate('News');
		// debug($news);
		$this->set(compact('news', 'title_for_layout', 'meta'));
	}

	public function view($alias){
		$data = $this->News->findByAlias($alias);
		if(!$data || is_null($alias)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$other_news = $this->News->find('all', array(
			'conditions' => array('News.alias' => !$alias)
		));
		$title_for_layout = $data['News']['title'];
		$meta['keywords'] = $data['News']['keywords'];
		$meta['description'] = $data['News']['description'];
		$this->set(compact('data', 'title_for_layout', 'meta', 'other_news'));
	}
}