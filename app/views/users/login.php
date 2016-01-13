
<?php if($errors) : ?>

	<div class="alert alert-danger">

		Identifiants Incorrect ..!!

	</div>

<?php endif; ?>

<form method="post">

	<?= $form->input('username','Pseudo'); ?>

	<?= $form->input('password','Password',['type'=>'password']); ?>

	<?= $form->submit('Envoyer'); ?>

</form>