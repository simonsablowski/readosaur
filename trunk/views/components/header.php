<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<? $bp = $this->getApplication()->getConfiguration('baseUrl'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="Content-Language" content="<? echo $this->localize('en'); ?>"/>
		<title><? echo $this->localize('readosaur') . (isset($subtitle) ? ' - ' . $this->localize($subtitle) : ''); ?></title>
		<link rel="canonical" href="http://www.readosaur.com/"/>
		<meta name="dc.title" content="<? echo $this->localize('readosaur') . (isset($subtitle) ? ' - ' . $this->localize($subtitle) : ''); ?>"/>
		<meta name="description" content="<? echo (isset($subtitle) ? $this->localize($subtitle) . ' - ' : '') . $this->localize('readosaur'); ?>"/>
		<meta name="keywords" content="<? echo $this->localize('readosaur'); ?>"/>
		<meta name="revisit-after" content="1 day"/>
		<!-- Mobile device detection by Bushido Designs: BushidoDesigns.net -->
		<link href="<? echo $bp; ?>web/css/handheld.css" rel="stylesheet" type="text/css"/>
		<style type="text/css" media="screen and (min-width: 860px)">
		<!--
		@import url("<? echo $bp; ?>web/css/screen.css");
		-->
		</style>
		<!--[if IE]>
		<link href="<? echo $bp; ?>web/css/screen.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="<? echo $bp; ?>web/css/ie.css" rel="stylesheet" type="text/css" media="screen"/>
		<![endif]-->
		<link href="<? echo $bp; ?>web/css/handheld.css" rel="stylesheet" type="text/css" media="handheld, only screen and (max-device-width: 859px)"/>
		<link href="<? echo $bp; ?>web/css/print.css" rel="stylesheet" type="text/css" media="print"/>
		<link type="image/x-icon" href="<? echo $bp; ?>web/img/favicon.ico" rel="shortcut icon"/>
		<script type="text/javascript" src="<? echo $bp; ?>web/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<? echo $bp; ?>web/js/readosaur.js"></script>
	</head>
	<body>
		<div id="popup"></div>
		<div id="document">
<? if (isset($message) && !empty($message)): ?>
			<div id="header">
				<div id="message">
					<? echo $this->localize($message); ?>

				</div>
			</div>
<? endif; ?>
<? $this->displayView('components/sidebar.php'); ?>
			<div id="content">
