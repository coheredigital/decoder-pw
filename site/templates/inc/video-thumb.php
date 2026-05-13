<?php namespace ProcessWire; ?>
<?php $p = (isset($p) ? $p : $page); ?>
<article <?php echo $schema ?> class="<?php echo $p->parent->name ?> episode video video-list-entry">
	<div class="entry clearfix">
		<div class="row">
			<div class="twelve columns">
				<?php if ($p->image_thumbnail): ?>
					<?php $img = $p->image_thumbnail->size("460","300"); ?>
					<a href="<?php echo $p->url ?>">
						<img class="video-thumb" src="<?php echo $img->url ?>" alt="">
					</a>
				<?php endif ?>
				
			</div>
		</div>
	</div>
	<header>
		<h2 class="episode-title video-small-title row clearfix <?php if (!$p->episode_number) echo'news-heading'?>">
			<a href="<?php echo $p->url ?>">
				<span itemprop="name"><?php echo $p->title ?></span>
			</a>
		</h2>
	</header>

</article>