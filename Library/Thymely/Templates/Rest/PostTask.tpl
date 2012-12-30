{include file="Include/Top.tpl"}

<p>
    Yay you POST'd me! Try GET.
</p>

<form action="/rest/task" method="get">
    <input type="submit" value="GET Task" />
</form>

<p>
	<a href="/rest">Go back</a>
</p>

{include file="Include/Bottom.tpl"}