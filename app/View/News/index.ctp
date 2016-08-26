<div class="blog_part">
	<div class="wr">
		<div class="ov">
			<span class="up_heading fl_l">
				Статьи в области IT и интернета
			</span>
		</div>
		<ul class="art_ul">
			<?php foreach($news as $item): ?>
			<li>
				<article class="art_mini">
					<figure>
						<img src="/img/articles/<?=$item['News']['img']?>"/>
					</figure>
					<div class="des_mini">
						<h4><?=$item['News']['title']?></h4>
						<span class="date">Опубликовано <?php echo $this->Time->format($item['News']['date'], '%d.%m.%Y', 'invalid'); ?></span>
						<p><?= $this->Text->truncate(strip_tags($item['News']['title']), 212, array('ellipsis' => '...', 'exact' => true)) ?></p>
						<a class="btn" href="/blog/<?=$item['News']['alias']?>">Подробнее</a>
					</div>						
				</article>
			</li>
		<?php endforeach ?>
		</ul>
	</div>
</div>
<aside class="aside_blog">
		<div class="ov">
			<span class="up_heading fl_r">
				Остальные статьи
			</span>
		</div>
</aside>