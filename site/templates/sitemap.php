<?php 
namespace ProcessWire;

header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($page->sitemap_templates as $t): ?>
	<?php 
	$sitemap_pages = $pages->find("template=".$t->name);
	if ($t->name === 'home') {
		$freq = 'daily';
		$priority = '1.0';
	}
	else if($t->name === 'news'){
		$freq = 'daily';
		$priority = '0.8';
	}		
	else if($t->name === 'shows' || $t->name === 'show' ){
		$freq = 'weekly';
		$priority = '0.7';
	}	
	else{
		$freq = 'monthly';
		$priority = '0.5';
	}
	?>
	<?php foreach ($sitemap_pages as $p): ?>
	
   	<url>
		<loc>https://decoderringtheatre.com<?php echo $p->url ?></loc>
		<lastmod><?php echo date('c',$p->modified)  ?></lastmod>
		<changefreq><?php echo $freq ?></changefreq>
		<priority><?php echo $priority ?></priority>
   	</url>
	<?php endforeach ?>
<?php endforeach ?>

</urlset> 
