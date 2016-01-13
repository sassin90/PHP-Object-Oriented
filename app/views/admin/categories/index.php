
<h1> Administrer les categories </h1>


<table class="table">
	
	<thead>

		<tr>
			<th>ID</th>

			<th>Titre</th>

			<th>Actions</th>
		</tr>

	</thead>

	<tbody>

		<?php foreach ($items as $cat): ?>

		<tr>
			<td><?= $cat->id ?></td>

			<td><?= $cat->titre ?></td>

			<td>
				<a class="btn btn-primary" href="?page=admin.categories.edit&id=<?= $cat->id; ?>">Editer</a>

				<form action="?page=admin.categories.delete" method="post" style="display:inline;" >

					<input type="hidden" name="id" value="<?= $cat->id; ?>">

					<button type="submit" class="btn btn-danger">Supprimer</button>

				</form>

			</td>

		</tr>

		<?php endforeach; ?>

	</tbody>

</table>

<p>
	<a href="?page=admin.categories.add" class="btn btn-success">Ajouter</a>
</p>
	
	
