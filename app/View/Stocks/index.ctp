<div class="content">
<div class="compani_item">
	<h2 class="title">Акции</h2>
<ul class="news_list">
<?php foreach($data as $item): ?>
	<li>
		<div class="news_item_img">
			<img src="/img/stock/thumbs/<?=$item['Stock']['img']?>" alt="<?=$item['Stock']['title']?>">
		</div>
		<a href="/stocks/view/<?=$item['Stock']['id']?>" class="news_item__link">
			<?=$item['Stock']['title']?>
		</a>
		<a href="/stocks/view/<?=$item['Stock']['id']?>" class="more fl_r mr_top">Подробнее</a>
	</li>
<?php endforeach ?>
</ul>
</div>
</div>