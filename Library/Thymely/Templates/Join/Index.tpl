{include file="Include/Top.tpl"}

<p>
    Thymely is currently under heavy development. We are rebuilding the database
	completely every few days. While we would love to have you using the site
	now, we can pretty much guarantee all your data (including your user details)
	will be deleted. at some point If you'd still like to join us, just fill in
	the form below and you have my heart felt thanks for helping us!
</p>

<form action="" method="post">
	<label for="email">Email</label>
		<input id="email" name="email" value="{$email}" />
		{if $emailError}
			<span style="color:red">{$emailError}</span>
		{/if}
		<br />
    <label for="firstname">Firstname</label>
    	<input id="firstname" name="firstname" value="{$firstname}" />
		{if $firstnameError}
			<span style="color:red">{$firstnameError}</span>
		{/if}
    	<br />
    <label for="lastname">Lastname</label>
    	<input id="lastname" name="lastname" value="{$lastname}" />
		{if $lastnameError}
			<span style="color:red">{$lastnameError}</span>
		{/if}
    	<br />
	<button type="Submit" name="join" value="1">Join</button>
</form>



{include file="Include/Bottom.tpl"}