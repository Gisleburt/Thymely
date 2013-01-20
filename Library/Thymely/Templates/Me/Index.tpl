{include file="Include/Top.tpl"}

<a href="/me/password">Change my password</a>

{if $success}

	<p>Your details have been updated!</p>

{/if}

<form action="" method="post">
	<label for="firstname">First name:</label>
		<input type="text"  id="firstname" name="firstname" value="{$login->user->firstname}" />
		{if $error->firstname}<span style="color:red">{$error->firstname}</span>{/if}
		<br />
	<label for="lastname">Last name:</label>
		<input type="text"  id="lastname" name="lastname" value="{$login->user->lastname}" />
		{if $error->lastname}<span style="color:red">{$error->lastname}</span>{/if}
		<br />
	<label for="email">Email:</label>
		<input type="text" id="email" name="email" value="{$login->user->email}" />
		{if $error->email}<span style="color:red">{$error->email}</span>{/if}
    	<br />
	<input type="submit" id="login" value="Change!" />
	<br />
</form>

{include file="Include/Bottom.tpl"}