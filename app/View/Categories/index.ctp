<div class="content">
	<div class="compani_item">
		<h2 class="title">
			Продукция
		</h2>
		<ul class="product">
		<?php foreach($data as $item): ?>
			<li class="product_list_item" >
				<div class="product_img_first img fl_l">
					<img src="/img/product/thumbs/<?=$item['Product']['img']?>" alt="<?=$item['Product']['title']?>">
				</div>
				<a href="/products/view/<?=$item['Product']['id']?>" class="product_title"><?=$item['Product']['title']?></a>
				<div class="price_price">
					Цена: <div class="price"> <?=$item['Product']['price']?> тг.</div>
				</div>
				<div class="product_des"><strong>Описание: </strong>
<?= $this->Text->truncate(strip_tags($item['Product']['body']), 110, array('ellipsis' => '...', 'exact' => true)) ?>
				 </div>
				 <div class="basket_bottom">
					<input type="hidden" name="category_id" class="id_product"value="<?=$item['Product']['id']?>">
					<div class="mobile">
					<a href="/products/view/<?=$item['Product']['id']?>"class="button fl_l" >Подробнее</a>
					</div>
					<div class="mobile">
					<div class="col_vid">
						<div class="number ">
						    <span class="minus">-</span>
						    <div class='item_count'/>1</div>
						    <span class="plus">+</span>
						</div>
						<div class="vid_container">
	                    	<div class="item_vid_count"><div class="item_vid">шт.
							
	                    	</div>
	                    	<input type="hidden"class="item_2" value="sh"/></div>
							<div class="item_vid_list">
								<div class="item_vid_list_item">
									кг.
								</div>
								<input type="hidden"class="item_2" value="kg"/>
							</div>
						</div>
				    </div>
				     </div>
				     <div class="mobile">
					<button  class="button add_item fl_r" data-id="<?=$item['Product']['id']?>">В корзину</button>
					 </div>
				</div>
			</li>
			<?php endforeach ?>
			
		</ul>
	</div>
</div>