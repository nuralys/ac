<?php

class BasketsController extends AppController{

	public $uses = array('Basket', 'Product', 'Category');
	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function admin_index(){
		$data = $this->Basket->find('all', array(
			'order' => array('Basket.id' => 'DESC')
		));
		$categories = $this->Category->find('list');
		$title_for_layout = "Заказы";
		$this->set(compact('data', 'title_for_layout', 'categories'));
	}
	public function index(){
		
		$title_for_layout = 'Корзина';
		
		$data = $this->Basket->find('all');
		// debug($news);
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Basket->create();
			$data = $this->request->data['Basket'];
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->Basket->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Basket->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Basket->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Basket->id = $id;
			$data1 = $this->request->data['Basket'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Basket->save($data1)){
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
		if (!$this->Basket->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Basket->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Basket->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Basket->findById($id);
		$news = $this->Basket->find('all', array(
			'fields' => array('id', 'title', 'img', 'date'),
			'conditions' => array('id !=' => $id)
			));

		$this->set(compact('data', 'news'));
	}

	public function send(){
		if( !empty($this->request->data) ){
			$data = $this->request->data;
			// debug($data);
			// die;
			$p = array();
			for($i = 1; $i <= $data['allcount']; $i++){
				if(isset($data["id_product$i"]) && $data["id_product$i"] != null){
					$data['Product'][$i]['id'] = $data["id_product$i"];
					$data['Product'][$i]['count'] = $data["count$i"];
					$data['Product'][$i]['type'] = $data["type_count$i"];
					$data['Product'][$i]['fio'] = $data["fio"];
					$data['Product'][$i]['phone'] = $data["phone"];
					$data['Product'][$i]['email'] = $data["email"];
					$p[] = $data['Product'][$i]['id'];
					${"count".$i} = $data["count$i"];
					${"type_count".$i} = $data["type_count$i"];
				}
			}
			
			$a = implode(',', $p);
			$products = $this->Product->query("SELECT * FROM products as Basket WHERE id IN ($a)");
			$i = 1;
			foreach($data['Product'] as $key1 => $value1){
				//записываем кол-во в массив и передадим его в медот newArr()
				$j=1;
				foreach($data['Product'] as $key2 => $value2){
					$count[] = $data['Product'][$j]['count'];
					$type[] = $data['Product'][$j]['type'];
					$j++;
				}
				$products = $this->newArr($products, $count, $type, $value1['fio'], $value1['phone'], $value1['email']);
				$i++;
			}
			// debug($products);
			//  die;
			

			if($this->Basket->saveMany($products)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}

			}
		}

		protected function newArr(array $array, array $count, array $type, $fio = null, $phone = null, $email = null){
			$b = array();
			$y = 0;
			foreach($array as $key => $value3){
				$id = $value3['Basket'];
				$id = reset($id); //пришлось выбирать первый элемент из массива, так как не понял почему не присваивлся id

				$b[$y]['Basket']['product_id'] = $id;
				$b[$y]['Basket']['title'] = $value3['Basket']['title'];
				$b[$y]['Basket']['price'] = $value3['Basket']['price'];
				$b[$y]['Basket']['count'] = $count[$y];
				if($type[$y] == 'sh'){ $b[$y]['Basket']['type'] = 'шт.';}
				if($type[$y] == 'kg'){ $b[$y]['Basket']['type'] = 'кг.';}
				$b[$y]['Basket']['category_id'] = $value3['Basket']['category_id'];
				$b[$y]['Basket']['fio'] = $fio;
				$b[$y]['Basket']['phone'] = $phone;
				$b[$y]['Basket']['email'] = $email;
				$y++;
			}
			return $b;
		}

		protected function renameArrayKey(array $array, $old_name, $new_name) {
		   $output = array();
		       
		   if (empty($array)
		      || (empty($old_name) || !is_scalar($old_name))
		      || (empty($new_name) || !is_scalar($new_name))) {
		         return array();
		   }
		       
		   foreach ($array as $key => $value) {
		       
		      if (is_array($value)) {
		         $output[$key] = $this->renameArrayKey($value, $old_name, $new_name);
		         continue;
		      }
		               
		      $should_rename = $key === $old_name;
		      $new_key = ($should_rename) ? $new_name : $key;
		      $output[$new_key] = $value;              
		   }
		       
		   return $output;
		}
	}