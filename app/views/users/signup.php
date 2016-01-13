
<form method="post">

	<?= $form->input('username','Pseudo'); ?>

	<?= $form->input('password','Password',['type'=>'password']); ?>

	<?= $form->select('id_ville','Ville', $villes); ?>

	<?= $form->submit('Enregistrer'); ?>

</form>