<?php
namespace ProcessWire;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?php
		if ($page->is('home')) {
			echo 'Decoder Ring Theatre';
		} else {
			echo $page->get('headline|title') . ' | Decoder Ring Theatre';
		}

		?>
	</title>
	<meta
		http-equiv="Content-Type"
		content="text/html;charset=utf-8"
	/>
	<meta
		name="viewport"
		content="initial-scale = 1.0,maximum-scale = 1.0"
	>

	<link
		rel="shortcut icon"
		href="/favicon.ico"
	>
	<link
		rel="apple-touch-icon-precomposed"
		href="<?= $config->urls->templates ?>images/icon.png"
	>
	<link
		rel="stylesheet"
		media="screen"
		href="<?php echo $config->urls->templates ?>css/styles.css"
	>
	<script src="https://cdn.jsdelivr.net/jquery/2.2.4/jquery.min.js"></script>
	<script>
		(function (i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date(); a = s.createElement(o),
				m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-18960236-1', 'auto');
		ga('send', 'pageview');

	</script>
</head>


<body id="<?php echo $page->name ?>-page">
	<a
		id="skipnav"
		class="show-on-phones"
		href="#main"
	>Skip to Content</a>
	<div id="wrapper">
		<header class="container">
			<div class="row">
				<div
					class="three columns"
					role="navigation"
				>

					<hgroup id="header">
						<h1 class="logo">
							<a href="/">
								<img
									width="294"
									height="254"
									src="<?= $config->urls->templates ?>images/decoder.png"
								/>
							</a>
							<span>Decoder Ring Theatre</span>
						</h1>
					</hgroup>
				</div>
				<div class="nine columns">
					<div class="title row">
						<div class="ten offset-by-one columns">
							<a
								rel="nofollow"
								href="<?php echo $home->url ?>"
							><img
									src="<?php echo $config->urls->templates ?>images/decoder_ring.png"
									alt="Decoder Ring Theatre"
								/></a>
							<a
								rel="nofollow"
								href="<?php echo $home->url ?>"
							><img
									class="theatre align_right"
									src="<?php echo $config->urls->templates ?>images/theatre.png"
									alt="Decoder Ring Theatre"
								/></a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="container main">
			<div class="row content">
				<div class="row">
					<div
						class="eight columns"
						role="navigation"
					>
						<select
							id="nav-mobile"
							class="nav-mobile"
						>
							<?php
							$home = $pages->get('/');
							$navPages = $home->children();
							$navPages->prepend($home);


							foreach ($navPages as $p): ?>
								<option
									<?php if ($page->rootParent == $p)
										echo 'selected' ?>
										value="<?php echo $p->url ?>"
								><?php echo $p->title ?></option>
							<?php endforeach ?>
						</select>
						<script>
							$(function () {
								$("#nav-mobile").change(function () {
									var url = $(this).val();
									if (url) {
										window.location.href = url;
									}
								});
							});
						</script>
						<nav class="menu-main-container clearfix">
							<?php
							$options = array(
								'max_levels' => 1,
								'current_class' => 'active',
								'has_children_class' => 'has-flyout',
								'inner_tpl' => '<a href="#" class="flyout-toggle"><span></span></a><div class="flyout small"><ul>||</ul></div>',
								'item_current_tpl' => '<a class="current active" href="{url}">{title}</a>',
								'outer_tpl' => '<ul id="menu-main" class="nav-bar clearfix">||</ul>'
							);
							$nav = $modules->get("MarkupSimpleNavigation");
							echo $nav->render($options);
							?>
						</nav>
					</div>
					<?= $page->snippet('searchform') ?>

				</div>
				<div id="main">
					<?php
					if ($page->layout) {
						include("./layouts/{$page->layout}.php");
					} else {
						include("./layouts/default.php");
					}
					?>
				</div>
			</div>
		</div>
		<footer class="container">
			<div class="row">
				<div class="four columns">
					<?php echo $home->footer_column1 ?>
				</div>
				<div class="four columns hide-on-phones">

					<?php echo $home->footer_column2 ?>

				</div>
				<div class="four columns hide-on-phones">
					<?php echo $home->footer_column3 ?>
				</div>


			</div>
			<div class="row">
				<div class="twelve columns">
					<hr />
					<p class="align_center">
						copyright &copy; <?php echo date('Y') ?> - Gregg Taylor &amp; Decoder Ring Theatre
					</p>
				</div>
			</div>
		</footer>
	</div>
	<script src="<?php echo $config->urls->templates ?>js/audiojs/audio.min.js"></script>
	<script>
		document.documentElement.className = "js";
		audiojs.events.ready(function () {
			var as = audiojs.createAll();
		});
		$(function () {
			$("article.episode").on("click", ".audiojs p.play", function () {
				$(this).closest('article.episode').siblings('article.episode').find('.audiojs.playing p.pause').trigger('click');
			});
		});
	</script>

	<div id="fb-root"></div>
	<script>(function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=165200763595260";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
</body>

</html>
