<?php namespace ProcessWire; ?>
<div class="sidebar four columns" id="access">
	<?php if ($input->urlSegment(1) == 'season'): ?>
		<?= $page->snippet('sidebar-seasons') ?>
	<?php endif ?>
	<?php if(!$pages->get('/')->disable_donation) echo $page->snippet('sidebar-paypal') ?>
	<?= $page->snippet('sidebar-news') ?>
	<?= $page->snippet('sidebar-books') ?>
</div>