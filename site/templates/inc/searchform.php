<?php namespace ProcessWire ?>
<div class="four columns">
	<form class="nice" id='search_form' action='<?php echo $config->urls->root?>search/' method='get'>
		<input type='text' placeholder="SEARCH..." name='q' id='search'  class="search small input-text" value='<?php echo $sanitizer->text($input->get->q) ?>' />
	</form>
</div>

