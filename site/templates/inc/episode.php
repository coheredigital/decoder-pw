<?php

namespace ProcessWire;

$episode = (isset($episode) ? $episode : $page);
if ($episode->template == "book") {
	$schemaType = "Book";
}
else{
	$schemaType = "CreativeWork";
}

$schema = " itemscope itemtype='https://schema.org/{$schemaType}'";


?>

<article <?php echo $schema ?> class="<?php echo $episode->parent->name ?> episode">
	<header>
		<h2 class="episode-title row clearfix <?php if (!$episode->episode_number) echo'news-heading'?>">
			<a href="<?php echo $episode->url ?>">
				<span itemprop="name"><?php echo $episode->title ?></span>
				<?php 

					$page->meta .= '<meta property="og:title" content="'.$episode->title.' - Decoder Ring Theatre">';
					$page->meta .= '<meta property="fb:admins" content="atomicmonster">';
					if ($page->template == 'book') {
						$page->meta .= '<meta property="og:type" content="book">';
					}
					else{
						$page->meta .= '<meta property="og:type" content="article">';
					}

					$page->meta .= '<meta property="og:url" content="https://www.decoderringtheatre.com'.$episode->url.'">';
					$metaD = $sanitizer->textarea($episode->body);
					$page->meta .= '<meta property="og:description" content="'.$metaD.'">';
				?>
			</a>
			<aside class="episode-info">
				<?php if ($episode->episode_number): ?>
				<strong class="episode-number">
					<span class="hide-on-desktops">Episode </span>
					<?php echo $episode->episode_number ?>
				</strong>
				<?php endif ?>
				<small class="episode-date">
					<meta itemprop="datePublished" content="<?php echo date('Y-m-d',strtotime($episode->date)) ?>">
					<?php if ($episode->date): ?>
						<?php echo date('M jS ',strtotime($episode->date)) ?>
						<br class="hide-on-phones">
						<?php echo date('Y',strtotime($episode->date)) ?>
					<?php else: ?>
						<?php echo date('M jS ',$episode->created) ?>
						<br class="hide-on-phones">
						<?php echo date('Y',$episode->created) ?>
					<?php endif ?>
				</small>
			</aside>
			<div class="end"></div>
		</h2>
	</header>
	<div class="entry clearfix">
		<div class="row">
			<div class="twelve columns">
				<meta itemprop="author" content="Gregg Taylor">
				<meta itemprop="copyrightHolder" content="Decoder Ring Theatre">

				<?php if ($episode->image_thumbnail): ?>
					<?php $img = $episode->image_thumbnail->height(170) ?>
					<?php $imgfull = $episode->image_thumbnail ?>
				<?php elseif($episode->template == 'episode'): ?>
					<?php $img = $episode->parent->image_thumbnail->height(170) ?>
					<?php $imgfull = $episode->parent->image_thumbnail ?>
				<?php endif; ?>

				<?php if ($img): ?>
					<img class="align_left" height="<?php echo $img->height ?>"  width="<?php echo $img->width ?>" src="<?php echo $img->url ?>" alt="<?php echo $episode->title ?> - Thumbnail"/>
					<?php 
					$page->meta .= '<meta property="og:image" content="https://www.decoderringtheatre.com'.$imgfull->url.'">';
					$page->meta .= '<meta property="og:image:type" content="image/jpeg">';
					$page->meta .= '<meta property="og:image:width" content="'.$imgfull->width.'">';
					$page->meta .= '<meta property="og:image:height" content="'.$imgfull->height.'">';

					?>
					
					
					<meta itemprop="thumbnailUrl" content="https://www.decoderringtheatre.com<?php echo $img->url ?>">
				<?php endif ?>

				<?php echo $episode->body ?>
				<?php if ($page->template == 'episode' || $page->template == 'book' || $page->template == 'article'): ?>
					<section>
						<div style="float: left;" class="fb-like" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div>
						<span style="margin: 0 0 0 16px">
							<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</span>
						

					</section>
				<?php endif ?>

				<?php if ($episode->link_buy): ?>
					<div class="row"><div class="twelve columns"><a itemprop="offers" class="button white nice radius large align_right" href="<?php echo $episode->link_buy ?>">
						BUY NOW!
					</a></div></div>
				<?php endif ?>
			</div>
			<?php if ($episode->link_mp3): ?>
				<a class="download-link hide-on-phones" rel="nofollow" download href="<?= $page->link_mp3 ?>">Download a Copy</a>
				<a itemprop="audio" class="download-link hide-on-desktops" rel="nofollow"  href="<?php echo $episode->link_mp3 ?>">Download a Copy</a>
			<?php endif ?>
		</div>
	</div>
	<?php if ($episode->link_mp3): ?>
		<audio src="<?php echo $episode->link_mp3 ?>" preload="none" />
	<?php endif ?>
</article>