<?php

class SlidesController extends AppController{

	public function admin_index(){
		$data = $this->Slide->find('all');
		$title_for_layout = 'Слайды';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Slide->create();
			$data = $this->request->data['Slide'];
			/*ws begin*/
			if($data["imgsource"]){
				$getmime = getimagesize(WWW_ROOT . trim($data["imgsource"], '/'));
				$r = explode("/",  $data["imgsource"]);
				$file= end($r);

				$data["img"]= array(
					"name"=> $file,
					"tmp_name" => WWW_ROOT . trim($data["imgsource"], '/'),
					"error"=> 0,
					"mime"=>$getmime['mime'],
					"size"=>filesize (WWW_ROOT . trim($data["imgsource"], '/'))
				);
				if(empty($data['img']['name']) || !$data['img']['name']){
					unset($data['img']);
				}

				if($this->Slide->save($data)){
					$this->Session->setFlash('Сохранено', 'default', array(), 'good');
					// debug($data);
					return $this->redirect($this->referer());
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				}
				}else{
					$this->Session->setFlash('Ошибка! Выберите файл и обрежте его (зеленая кнопка)', 'default', array(), 'bad');
				}
				/*ws end*/
			}
		
		$title_for_layout = 'Добавление нового материала';
		$this->set(compact('title_for_layout'));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Slide->exists($id)){
			throw new NotFoundException('Not found...');
		}
		$data = $this->Slide->findById($id);
	
		if(!$id){
			throw new NotFoundException('Not found...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Slide->id = $id;
			$data1 = $this->request->data['Slide'];
			/*ws begin*/
			if(isset($data1['imgsource']) && !empty($data1['imgsource'])){
				$getmime = getimagesize(WWW_ROOT . trim($data1["imgsource"], '/'));
				// $file= end(explode("/",  $data1["imgsource"]));
				$r = explode("/",  $data1["imgsource"]);
				$file= end($r);
				$data1["img"]= array(
					"name"=> $file,
					"tmp_name" => WWW_ROOT . trim($data1["imgsource"], '/'),
					"error"=> 0,
					"mime"=>$getmime['mime'],
					"size"=>filesize (WWW_ROOT . trim($data1["imgsource"], '/'))
				);
			}
			/*ws end*/
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Slide->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Редактирование материала';
			$this->set(compact('id', 'data', 'title_for_layout'));
		}
	}

	public function admin_delete($id){
		if (!$this->Slide->exists($id)) {
			throw new NotFounddException('This material is not');
		}
		if($this->Slide->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
}