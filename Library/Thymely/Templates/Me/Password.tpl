{include file="Include/Top.tpl"}

<form action="" method="post">
	<label for="password">Password</label>
		<input id="password" name="password" value="" />
		{if $error->password}<span style="color:red">{$error->password}</span>{/if}
		<br />
	<label for="password2">Repeat Password</label>
		<input id="password2" name="password2" value="" />
		<br />
	<input type="submit" id="login" value="Change!" />
	<br />
</form>

{include file="Include/Bottom.tpl"}