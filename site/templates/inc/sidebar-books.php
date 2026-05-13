<?php namespace ProcessWire ?>
<?php if ($page->template != 'books' && $page->template != 'book'): ?>
	<?php $latest_book = $pages->get('template=book,limit=1,sort=-date') ?>
	<div class="box hide-on-phones">
		<h2>Fresh off the press!</h2>
		<a href="<?php echo $latest_book->url ?>">
			<?php $img = $latest_book->image_thumbnail->height(200); ?>
			<img class="align_center thumbnail lazy" src="<?php echo $img->url ?>" width="<?php echo $img->width ?>" height="<?php echo $img->height ?>" alt="<?php echo $latest_book->title ?> - Cover"/>
		</a>
		<h4 class="align_center">
			<a href="<?php echo $latest_book->url ?>">
				<span><?php echo $latest_book->title ?></span>
			</a>
		</h4>
	</div>
<?php endif ?>