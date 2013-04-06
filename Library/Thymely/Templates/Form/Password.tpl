{if $form}
	<form action="" method="post">

		<input type="hidden" name="formName" value="{$form->getValue('formName')}" />

		{if $form->getElement('oldPassword')}
			<p>
				<label for="oldPassword">Old Password</label>
				<input id="oldPassword" name="oldPassword" value="" type="password" />
				{if $form->getError('oldPassword')}
					<span style="color:red">{$form->getError('oldPassword')}</span>
				{/if}
			</p>
		{/if}
		{if $form->getElement('password')}
			<p>
				<label for="password">Password</label>
				<input id="password" name="password" value="" type="password" />
				{if $form->getError('password')}
					<span style="color:red">{$form->getError('password')}</span>
				{/if}
			</p>
		{/if}
		{if $form->getElement('password2')}
			<p>
				<label for="password2">Repeat Password</label>
				<input id="password2" name="password2" value="" type="password" />
				{if $form->getError('password2')}
					<span style="color:red">{$form->getError('password2')}</span>
				{/if}
			</p>
		{/if}
		<button type="Submit" name="join" value="1">Change</button>
	</form>
{else}
	<!-- Form missing -->
{/if}