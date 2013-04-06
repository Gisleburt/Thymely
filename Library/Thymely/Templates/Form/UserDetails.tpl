{if $form}
	<form action="" method="post">

		<input type="hidden" name="formName" value="{$form->getValue('formName')}" />

		{if $form->getElement('email')}
			<p>
				<label for="email">Email</label>
				<input id="email" name="email" value="{$form->getValue('email')}" />
				{if $form->getError('email')}
					<span style="color:red">{$form->getError('email')}</span>
				{/if}
			</p>
		{/if}
		{if $form->getElement('firstname')}
			<p>
				<label for="firstname">Firstname</label>
				<input id="firstname" name="firstname" value="{$form->getValue('firstname')}" />
				{if $form->getError('firstname')}
					<span style="color:red">{$form->getError('firstname')}</span>
				{/if}
			</p>
		{/if}
		{if $form->getElement('lastname')}
			<p>
				<label for="lastname">Lastname</label>
				<input id="lastname" name="lastname" value="{$form->getValue('lastname')}" />
				{if $form->getError('lastname')}
					<span style="color:red">{$form->getError('lastname')}</span>
				{/if}
			</p>
		{/if}
		<button type="Submit" name="join" value="1">Join</button>
	</form>
{else}
	<!-- Form missing -->
{/if}