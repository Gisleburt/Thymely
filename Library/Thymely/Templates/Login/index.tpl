<form action="/login/login" method="post">
	<input type="text" name="email">
    <input type="password" name="password">
	<input type="submit" value="Login" />
</form>
{if $error}
<span style="color:red">Uh oh, something went wrong!</span>
{/if}