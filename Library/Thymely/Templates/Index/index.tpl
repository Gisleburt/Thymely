{if $isLoggedIn}
Hello {$login->user->firstname}, you are logged in. <a href="/login/logout">Logout?</a>
{else}
You are not logged in. <a href="/login">Login?</a>
{/if}