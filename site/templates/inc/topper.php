<?php namespace ProcessWire ?>
<article class="notched row">
	<div class="entry">
		<div>
			<?php $img = $page->image_banner->width(515); ?>
			<img src="<?php echo $img->url ?>"  height="<?php echo $img->url ?>" width="<?php echo $img->width ?>" alt="<?php echo $child->title ?> - Logo"/>
		</div>
		<?php echo $page->body ?>
	</div>
</article>