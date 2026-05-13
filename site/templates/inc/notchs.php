<?php namespace ProcessWire ?>
<div class="row notched notched-<?php echo $page->template ?> <?php echo $class ?>">
<?php foreach ($items as $child): ?>
	<div class="columns four ">
		<?php if($child->template == 'show') $class = $child->name ?>
		<article class="featured <?php echo $class ?> featured-<?php echo $child->template ?>">
		<div class="entry">
			<div class="logo-small">
				<a href="<?php echo $child->url ?>">
					<?php if ($child->template=='show'): ?>
						<?php $img = $child->image_thumbnail->size(197, 0); ?>
					<?php else: ?>
						<?php $img = $child->image_thumbnail->size(283,450); ?>
					<?php endif ?>

					<img src="<?php echo $img->url ?>"  height="<?php echo $img->url ?>" width="<?php echo $img->width ?>" alt="<?php echo $child->title ?> - Logo"/>
				</a>
			</div>
			<?php if ($child->summary ): ?>
				<p><?php echo $child->summary ?></p>
			<?php endif ?>

			<?php if ($child->template=='show'): ?>
				<a class="nice clear show-on-phones small white button" href="<?php echo $child->url ?>">All <?php echo $child->title ?> Episodes...</a>
			<?php endif ?>

		</div>
		<footer class="hide-on-phones"></footer>
		</article>
	</div>
<?php endforeach ?>
</div>