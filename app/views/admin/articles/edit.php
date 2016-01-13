
<form method="post">

	<?= $form->input('titre','Titre de l\'article'); ?>

	<?= $form->input('contenu','Contenu',['type'=>'textarea']); ?>

	<?= $form->select('id_cat','Categorie', $categories); ?>

	<?= $form->submit('Sauvegarder'); ?>

</form>