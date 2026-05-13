<?php namespace ProcessWire; ?>
<?php if ($page->template == 'show'): ?>
<div class="box">
	<h2>Browse by Season</h2>
	<?php

	$show_seasons = new PageArray();
	foreach ($page->children() as $child) {
		$show_seasons->append($child->season_select);
	}
	$show_seasons->sort('val_int');

 	?>

	<ul class="block-grid four-up <?php echo $split ?>">
	<?php foreach ($show_seasons as $row): ?>
		<?php $class = ($row->name == $input->urlSegment(2) ? 'active' : '')   ?>
		<li><a class="season <?php echo $class ?>" href="<?php echo $page->url ?>season/<?php echo $row->name; ?>"><?php echo $row->title; ?></a></li>
	<?php endforeach ?>

	</ul>
</div>
<?php endif; ?>