<div class="content">
	<div class="compani_item">
		<h2 class="title">
			<?=$data['Category']['title']?>
		</h2>
		<ul class="product">
		<?php foreach($data['Product'] as $item): ?>
			<li class="product_list_item" >
				<div class="product_img_first img fl_l">
					<img src="/img/product/thumbs/<?=$item['img']?>" alt="<?=$item['title']?>">
				</div>
				<a href="/products/view/<?=$item['id']?>" class="product_title"><?=$item['title']?></a>
				<div class="price_price">
					Цена: <div class="price"> <?=$item['price']?> тг.</div>
				</div>
				<div class="product_des">
		<strong>Описание: </strong><?=$item['body']?>
				</div>
					<a href="/products/view/<?=$item['id']?>" class="button fl_l" >Подробнее</a>
					<div class="col_vid">
						<div class="number ">
						    <span class="minus">-</span>
						    <div class='item_count'/>1</div>
						    <span class="plus">+</span>
						</div>
						<div class="vid_container">
	                    	<div class="item_vid_count"><div class="item_vid">шт.</div></div>
							<div class="item_vid_list">
								<div class="item_vid_list_item">
									кг.
								</div>
							</div>
						</div>
				    </div>
					<button  class="button add_item fl_r" data-id="<?=$item['id']?>">В корзину</button>
				
			</li>
			<?php endforeach ?>
			
		</ul>
	</div>
</div>