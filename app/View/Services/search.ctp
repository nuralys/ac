<div class="content">
	<div class="compani_item">
		<h2 class="title">
			Поиск
		</h2>
		<?php if(!is_array($search_res)) : ?>
			<h3><?=$search_res;?></h3>
		<?php elseif(!empty($search_res)): ?>
		<ul class="product">
		<?php foreach($search_res as $item): ?>
			<li class="product_list_item" >
				<div class="product_img_first img fl_l">
					<img src="/img/product/thumbs/<?=$item['Product']['img']?>" alt="<?=$item['Product']['title']?>">
				</div>
				<a href="/products/view/<?=$item['Product']['id']?>" class="product_title"><?=$item['Product']['title']?></a>
				<div class="price_price">
					Цена: <div class="price"> <?=$item['Product']['price']?> тг.</div>
				</div>
				<p class="product_des"><strong>Описание: </strong><?=$item['Product']['body']?> </p>
				
					<a href="/products/view/<?=$item['Product']['id']?>" class="button fl_l" >Подробнее</a>
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
					<button  class="button add_item fl_r" data-id="<?=$item['Product']['id']?>">В корзину</button>
				
			</li>
			<?php endforeach ?>
			
		</ul>
		<?php else: ?>
		<h3>К сожалению ничего не найдено...</h3>
<?php endif; ?>
	</div>
</div>