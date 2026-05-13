<?php namespace ProcessWire ?>
<?php $p = (isset($p) ? $p : $page); ?>
<article <?php echo $schema ?> class="<?php echo $p->parent->name ?> episode video">
	<header>
		<h2 class="episode-title row clearfix <?php if (!$p->episode_number) echo'news-heading'?>">
			<a href="<?php echo $p->url ?>">
				<span itemprop="name"><?php echo $p->title ?></span>
			</a>
			<aside class="episode-info">
				<small class="episode-date">
					<meta itemprop="datePublished" content="<?php echo date('Y-m-d',strtotime($p->date)) ?>">
					<?php echo date('M jS ',$p->created) ?>
					<br class="hide-on-phones">
					<?php echo date('Y',$p->created) ?>
				</small>
			</aside>
			<div class="end"></div>
		</h2>
	</header>
	<div class="entry clearfix">
		<div class="row">
			<div class="twelve columns">
				<?php echo $p->video ?>
			</div>
		</div>
	</div>
</article>