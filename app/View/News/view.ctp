<div class="blog_part">
	<div class="wr">
		<div class="ov">
			<h1 class="up_heading fl_l">
				<?= $data['News']['title'] ?>
			</h1>
		</div>
		<?= $data['News']['body'] ?>
	</div>
</div>
<aside class="aside_blog">
		<div class="ov">
			<span class="up_heading fl_r">
				Остальные статьи
			</span>
			<?php foreach($other_news as $item): ?>
				<p><?=$item['News']['title'] ?></p>
			<?php endforeach ?>
		</div>
</aside>