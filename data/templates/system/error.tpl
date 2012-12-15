{include file="include/top.tpl"}

<p>
	An error occured.
</p>
{if $publicMessage}
	<p>
		<b>Public Message:</b> {$publicMessage}
	</p>
{/if}

{if $devMode && $devMessage}
	<p>
		<b>Dev Message:</b>
	</p>
	
	<pre>
{$devMessage}
	</pre>
{/if}

{include file="include/bottom.tpl"}