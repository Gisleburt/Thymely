{include file="Include/Top.tpl"}

{if $loginRequired}
	You must login to use this feature.
{/if}

<form action="" method="post">
	<label for="email">Email:</label>
		<input type="text" id="email" name="email">
    	<br />
    <label for="password">Password:</label>
		<input type="password" id="password" name="password">
		<br />
	<input type="submit" id="login" value="Login" />
	<br />
</form>

{if $error}
	<span style="color:red">Uh oh, the email and password didn't match</span>
{/if}

{include file="Include/Bottom.tpl"}