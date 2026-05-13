<?php namespace ProcessWire ?>
<?php if ($page->template != 'news' && $page->template != 'article'): ?>
	<?php $recent_news = $pages->find('template=article,limit=3,sort=-created') ?>
	<div class="box hide-on-phones">
		<h2>Latest News</h2>
		<ul>
			<?php foreach ($recent_news as $article): ?>
			<li>
				<p>
					<a href="<?= $article->url ?>"><?= $article->title ?></a> -
					<?= date('M jS, Y',$article->created) ?>
				</p>
			</li>
			<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>