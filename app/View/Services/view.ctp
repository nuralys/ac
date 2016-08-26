<div class="ov">
	<h2 class="up_heading fl_l">
		Наши услуги
	</h2>
	<ul class="breadcrumps">
		<li>
			<a href="/">Главная</a>
		</li>
		<li>
			<a href="/services">Наши услуги</a>
		</li>
		<?php if(isset($bc) && !empty($bc)): ?>
		<li>
			<a href="<?=$bc['BC']['alias']?>"><?=$bc['BC']['title']?></a>
		</li>
		<?php endif ?>
		<li>
			<span><?php echo $data['Service']['title'] ?></span>
		</li>
	</ul>
</div>
<ul class="serv_nav">
		<?php foreach($parent_services as $item): ?>
		<li>
			<a href="/service/<?php echo $item['Service']['alias'] ?>">
				<?php echo $item['Service']['title'] ?>
			</a>
		</li>
		<?php endforeach ?>
	</ul>
<article class="serv_des">
	<figure>
		<img alt="Создание сайтов в астане" src="/img/ast.jpg"/>
	</figure>
	<div class="des">
		<h3><?php echo $data['Service']['title'] ?></h3>
		<?php echo $data['Service']['body']  ?>						
	</div>
</article>
<?php if(isset($child_services) && !empty($child_services)): ?>
<div class="ov">
	<span class="up_heading fl_r">
		Какой веб-сайт вам подходит?
	</span>
</div>
<ul class="type_site">
<?php foreach($child_services as $item): ?>
	<li class="site_area">						
		<figure>
			<img src="/img/service/thumbs/<?=$item['Service']['img']?>">
		</figure>
		<div class="site_rel">
			<span><?=$item['Service']['title']?></span>
			<a href="/service/<?=$item['Service']['alias']?>">Узнать больше</a>
		</div>
	</li>
<?php endforeach ?>
</ul>
<?php endif ?>

<?php if(isset($data['Step']) && !empty($data['Step'])): ?>
<div class="ov">
	<span class="up_heading fl_r">
		<?php echo $data['Service']['title'] ?> - Этапы работ
	</span>
</div>
<div class="step_slider">
	<div class="slider-nav">
	<?php foreach($data['Step'] as $item): ?>
		<div class="sl_nav">
			<img src="/img/step/thumbs/<?=$item['img']?>">
			<span><?=$item['title']?></span>
		</div>
		<?php endforeach ?>
	</div>
	<div class="slider-for">
	<?php foreach($data['Step'] as $item): ?>
		<div class="steps_des">
			<figure>
				<img src="/img/sl_step1.jpg"/>
			</figure>
			<h6><?=$item['title']?></h6>
			<p><?=$item['body']?></p>
		</div>
		<?php endforeach ?>
	</div>
</div>
<?php endif ?>
<?php if(isset($portfolios) && !empty($portfolios)): ?>
<div class="ov">
	<span class="up_heading fl_l">
		Список проделанных работ
	</span>					
</div>
<div class="carousel">
	<?php foreach($portfolios as $item): ?>
	<div>
		<a href="a">
			<figure class="figure">
				<img src="/img/portfolio/<?=$item['Portfolio']['img']?>" alt="<?=$item['Portfolio']['title']?>"/>
				<figcaption class="port_caption">
					<h5><?=$item['Portfolio']['title']?></h5>
					<span><?=$item['Portfolio']['site_desc']?></span>
				</figcaption>
			</figure>
		</a>
	</div>
	<?php endforeach ?>
</div>
<?php endif ?>
<div class="ov">
	<span class="up_heading fl_r">
		Стоимость и сроки разработки сайта
	</span>									
</div>	
<div class="tab">	
	<div class="type_top">
		<button class="active" type="button">Базовый</button>
		<button type="button">Продвинутый</button>	
		<button type="button">Эксклюзивный</button>		
	</div>
	<div class="about_tabs">
		<div class="type_price">
			<div class="site_list">
				<span class="heading">
					В стоимость сайта включено
				</span>
				<ul>
					
					<li>1) Индивидуальный дизайн</li>
					<li>2) Адаптивная верстка</li>
					<li>3) CMS управление контентом</li>
					<li>4) Индивидуальный дизайн</li>
					<li>5) Адаптивная верстка</li>
					<li>6) CMS управление контентом</li>
					<li>7) Адаптивная верстка</li>
					<li>8) CMS управление контентом</li>
				</ul>
			</div>
			<div class="price_part">
				<span class="heading">
					Базовый корпоративный сайт
				</span>
				<span>Срок разработки: 21 рабочих дней</span>
				<span>
					Цена:<b>от 180 000 KZT</b>
				</span>
				<span class="variate">цена варьируется в зависимости от функционала!</span>
				<button type="button">Заказать сайт</button>
			</div>
		</div>
		<div class="type_price">
			<div class="site_list">
				<span class="heading">
					В стоимость сайта включено
				</span>
				<ul>
					<li>1) Домен и хостинг (kz)</li>
					<li>2) Индивидуальный дизайн</li>
					<li>3) Адаптивная верстка</li>
					<li>4) CMS управление контентом</li>
					<li>2) Индивидуальный дизайн</li>
					<li>3) Адаптивная верстка</li>
					<li>4) CMS управление контентом</li>
					<li>3) Адаптивная верстка</li>
					<li>4) CMS управление контентом</li>
				</ul>
			</div>
			<div class="price_part">
				<span class="heading">
					Продвинутый корпоративный сайт
				</span>
				<span>Срок разработки: 21 рабочих дней</span>
				<span>
					Цена:<b>от 240 000 KZT</b>
				</span>
				<span class="variate">цена варьируется в зависимости от функционала!</span>
				<button type="button">Заказать сайт</button>
			</div>
		</div>
		<div class="type_price">
			<div class="site_list">
				<span class="heading">
					В стоимость сайта включено
				</span>
				<ul>
					<li>1) Домен и хостинг (kz)</li>
					<li>2) Индивидуальный дизайн</li>
					<li>3) Адаптивная верстка</li>
					<li>4) CMS управление контентом</li>
					<li>2) Индивидуальный дизайн</li>
					<li>3) Адаптивная верстка</li>
					<li>4) CMS управление контентом</li>
					<li>3) Адаптивная верстка</li>
					<li>4) CMS управление контентом</li>
				</ul>
			</div>
			<div class="price_part">
				<span class="heading">
					Эксклюзивный корпоративный сайт
				</span>
				<span>Срок разработки: 21 рабочих дней</span>
				<span>
					Цена:<b>от 350 000 KZT</b>
				</span>
				<span class="variate">цена варьируется в зависимости от функционала!</span>
				<button type="button">Заказать сайт</button>
			</div>
		</div>
	</div>
</div>						
<?php echo $this->element('form_back')?>