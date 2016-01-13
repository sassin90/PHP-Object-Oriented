<h1> Administrer les utilisateurs </h1>

<table class="table">
	
	<thead>

		<tr>
			<th>ID</th>

			<th>Username</th>

			<th>Password</th>

			<th>City</th>
		</tr>

	</thead>

	<tbody>

		<?php foreach ($users as $user): ?>

		<tr>
			<td><?= $user->id ?></td>

			<td><?= $user->username ?></td>

			<td><?= $user->password ?></td>

			<td><?= $user->villes ?></td>

			<?php endforeach; ?>

		</tr>	

	</tbody>

</table>

