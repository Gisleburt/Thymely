<html>
	<head>
		<title>Thymely</title>
	</head>
	<body>
	<div style="text-align: right; border-bottom: 1px solid grey;">
		{if $isLoggedIn}
			Hello {$login->user->firstname}, <a href="/login/logout">Logout</a>
		{else}
			<a href="/login">Login</a>
		{/if}
	</div>
	<h1><a href="/">Thymely</a></h1>