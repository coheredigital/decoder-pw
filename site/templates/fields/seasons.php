<?php namespace ProcessWire ?>
<?php $episode = (isset($episode) ? $episode : $page); ?>

<article class="<?php echo $episode->parent->name ?> episode">
	<div class="entry clearfix">
		<div class="row">
			<div class="twelve columns">
			<?php foreach ($seasons as $season): ?>

				<h2>
					<a href="<?php echo $page->url ?>season/<?php echo $season; ?>">
						Season <?php echo $season ?>
					</a>

					<?php
					$show_episodes = $page->children("season_select.val_int=$season, sort=episode_number");
					if ($page->name == 'showcase'):
						$episodes = $show_episodes->count()." Episodes";
					else:
						$episodes = "Episodes ".$show_episodes->first()->episode_number." - ".$show_episodes->last()->episode_number;
					endif;
					?>
					<small class="details">
						<?php echo $episodes ?>
					</small>
				</h2>
				<?php if ($season->next->id): ?>
					<hr>
				<?php endif ?>

			<?php endforeach ?>
			</div>
		</div>
	</div>
	<?php if ($episode->link_mp3): ?>
		<audio src="<?php echo $episode->link_mp3 ?>" preload="none" />
	<?php endif ?>
</article>
