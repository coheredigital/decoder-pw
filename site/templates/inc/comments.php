<?php namespace ProcessWire ?>
<article>
    <div class="entry">
    <div id="disqus_thread"></div>
        <div class="comments">
            <?php echo $page->comments->render(); ?>
        </div>
        <?php echo $page->comments->renderForm(); ?>
	</div>
</article>