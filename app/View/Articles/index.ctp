<div class="content">
<div class="compani_item">
	<h2 class="title">Статьи</h2>
	<ul class="news_list">
	<?php foreach($data as $item): ?>
		<li>
			<div class="news_item">
				<div class="news_item_img">
					<img src="/img/article/thumbs/<?=$item['Article']['img']?>" alt="<?=$item['Article']['title']?>"></div>
				<a href="" class="news_item__link"><?=$item['Article']['title']?></a>
				<!-- <p class="news_item_descrip">
					Lorem Ipsum is simply dummy text of the printing and...
				</p> -->
				<a href="/articles/view/<?=$item['Article']['id']?>" class="more fl_r mr_top">Подробнее</a>
			</div>
		</li>
		<?php endforeach ?>
	</ul>
</div>
</div>