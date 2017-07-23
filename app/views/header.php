<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $header; ?></title>
		<meta charset="utf-8" lang="en">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!--link rel="icon" type="image/icon" href=""-->
		<base href="//localhost/Blog/" />
		<link type="text/css" rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css">
		<link type="text/css" rel="stylesheet" href="<?php echo CSS.'style.css'; ?>">
	</head>
	<body>
		<nav>
			<div class="wrapper">
				<ul>
					<li><a href="<?php echo BASE_URL; ?>">Home</a></li>
					<li class="separate"><a href="<?php echo BASE_URL . '/posts/'; ?>">All Posts</a></li>
				</ul>
			</div>
	  </nav>
