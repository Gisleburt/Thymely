{include file="Include/Top.tpl"}

Welcome to Thymely's RESTful API.

<form action="/rest/task" method="post">
    <input type="submit" value="Post Task" />
</form>

<form action="/rest/task" method="get">
    <input type="submit" value="Get Task" />
</form>

{include file="Include/Bottom.tpl"}