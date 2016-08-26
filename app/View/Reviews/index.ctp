<div class="breadcrumb">
	<ul class="breadcrumb_list">
		<li><a href="">Главная</a></li>
		<li>О компании</li>
		<li>Отзывы</li>
	</ul>
</div>
<div id="wrapper">
	<ul class="client_list">
	<?php foreach($data as $item): ?>
		<li>
			<div class="gallery_review">
			<div class="review_img">
				<a class="fancybox" rel="gallery" href="/img/review/<?=$item['Review']['img']?>">
					<img src="/img/review/thumbs/<?=$item['Review']['img']?>" alt="<?=$item['Review']['title']?>">
				</a>
			</div>
				<div class="client_name">
					<?=$item['Review']['title']?>
				</div>
			</div>
		</li>
	<?php endforeach ?>
	</ul>
</div>