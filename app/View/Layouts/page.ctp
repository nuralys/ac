<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $title_for_layout ?></title>
		<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1">
		<?php if(isset($meta['keywords'])): ?>
			<meta name="keywords" content="<?=$meta['keywords']?>">
		<?php endif; ?>
		<?php if(isset($meta['description'])): ?>
			<meta name="description" content="<?=$meta['description']?>">
		<?php endif; ?>
    	<meta name="author" content="astanacreative.kz">
		<meta name="yandex-verification" content="6263da184d27110c">
		<link href="/css/normalize.css" rel="stylesheet" type="text/css">
		<link href="/css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="/css/slick.css"/>
		<link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>
	</head>
	<body>
		<?=$this->element('header')?>
		<main role="main">
			<ul class="social">
				<li>
					<a class="vk"  href="#"></a>
				</li>
				<li>
					<a class="inst" href="#"></a>
				</li>
				<li>
					<a class="fb" href="#"></a>
				</li>
				<li>
					<a class="tw" href="#"></a>
				</li>
				<li>
					<a class="g_plus" href="#"></a>
				</li>
			</ul>	
			<div class="main_wr">
				<?php echo $this->fetch('content'); ?>
			</div>
		</main>
		<?=$this->element('footer')?>
		<script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="/js/slick.min.js"></script>
		<script type="text/javascript" src="/js/script.js"></script>
	</body>
</html>