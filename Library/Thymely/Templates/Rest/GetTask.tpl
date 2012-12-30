{include file="Include/Top.tpl"}

<p>
	Yay you GET'd me! Try POST.
</p>

<form action="/rest/task" method="post">
    <input type="submit" value="POST Task" />
</form>

<p>
    <a href="/rest">Go back</a>
</p>

{include file="Include/Bottom.tpl"}