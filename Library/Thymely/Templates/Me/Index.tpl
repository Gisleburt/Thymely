{include file="Include/Top.tpl"}

<a href="/me/password">Change my password</a>

{if $success}

	<p>Your details have been updated!</p>

{/if}

{include file="Form/UserDetails.tpl"}

{include file="Include/Bottom.tpl"}