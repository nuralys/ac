<div class="ov">
	<h2 class="up_heading fl_l">
		Наши услуги
	</h2>
	<ul class="breadcrumps">
		<li>
			<a href="/">Главная</a>
		</li>
		<li>
			<a href="/">Наши услуги</a>
		</li>
	</ul>
</div>
<ul class="service-types">
	<?php foreach($data as $item): ?>
	<li>
		<div class="service-wr">
			<figure class="service_figure">
				<a href="#">
					<img alt="/service/<?=$item['Service']['alias']?>" src="/img/service/<?=$item['Service']['img']?>">
				</a>
			</figure>
			<a class="service_heading" href="#"><?=$item['Service']['title']?></a>
			<p><?= $this->Text->truncate(strip_tags($item['Service']['body']), 180, array('ellipsis' => '...', 'exact' => true)) ?></p>
			<a class="btn" href="#">Подробнее</a>
		</div>
	</li>
	<?php endforeach ?>
</ul>
<div class="form_back">
	<h3>Не знаете какой тип сайта выбрать?</h3>
	<span>Заполните форму и наши специалисты вам помогут</span>
	<form>
		<div class="input_row">
			<input type="text" placeholder="Ваше имя..."/>
			<input  type="text" placeholder="Номер телефона..." />
			<input type="text" placeholder="Ваше email..."/>
		</div>
		<div class="attach_row">
			 <a class="but brief" href="img/brief.doc">Скачать бриф</a>
			 <button type="button" class="but attach">
			 	Прикрепить	
			 	<input type="file" />	
			 </button>								
		</div>
		<button type="submit" class="sbt_btn">Отправить</button>
	</form>
</div>