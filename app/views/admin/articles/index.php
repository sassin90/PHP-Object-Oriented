
<h1> Administrer les articles </h1>


<table class="table">
	
	<thead>

		<tr>
			<th>ID</th>

			<th>Titre</th>

			<th>Actions</th>
		</tr>

	</thead>

	<tbody>

		<?php foreach ($posts as $post): ?>

		<tr>
			<td><?= $post->id ?></td>

			<td><?= $post->titre ?></td>

			<td>
				<a class="btn btn-primary" href="?page=admin.articles.edit&id=<?= $post->id; ?>">Editer</a>

				<form action="?page=admin.articles.delete" method="post" style="display:inline;" >

					<input type="hidden" name="id" value="<?= $post->id; ?>">

					<button type="submit" class="btn btn-danger">Supprimer</button>

				</form>

			</td>

		</tr>

		<?php endforeach; ?>

	</tbody>

</table>

<p>
	<a href="?page=admin.articles.add" class="btn btn-success">Ajouter</a>
</p>
	
	
