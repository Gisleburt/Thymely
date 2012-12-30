{if $loginRequired}
	You must login to use this feature.
{/if}

<!-- {* Note: We want the login page to redirect to the requested uri  *} -->
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
	<span style="color:red">Uh oh, something went wrong!</span>
{/if}