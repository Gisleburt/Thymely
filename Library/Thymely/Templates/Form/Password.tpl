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
		{if $form->getElement('newPassword')}
			<p>
				<label for="newPassword">Password</label>
				<input id="newPassword" name="newPassword" value="" type="password" />
				{if $form->getError('newPassword')}
					<span style="color:red">{$form->getError('newPassword')}</span>
				{/if}
			</p>
		{/if}
		{if $form->getElement('newPassword2')}
			<p>
				<label for="newPassword2">Repeat Password</label>
				<input id="newPassword2" name="newPassword2" value="" type="password" />
				{if $form->getError('newPassword2')}
					<span style="color:red">{$form->getError('newPassword2')}</span>
				{/if}
			</p>
		{/if}
		<button type="Submit" name="join" value="1">Change</button>
	</form>
{else}
	<!-- Form missing -->
{/if}