<?php
require base_path('views/partials/head.php');;
require base_path('views/partials/nav.php');;
?>

<?php require base_path('views/partials/header.php'); ?>
<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<a href="/notes" class="text-blue-500 hover:undeerline">
			Go back
		</a>
		<p class="mb-4"> <?= htmlspecialchars($note['body']) ?> </p>

		<a href="/note/edit?id=<?= $note['id'] ?>" class="text-yellow-500 border border-current px-3 py-1 rounded">Edit</a>
		<form action="" method="POST" class="mt-6">
			<input type="hidden" name="_method" value="DELETE">
			<input type="hidden" name="id" value="<?= $note['id']  ?>">
			<button class="text-red-400 text-sm ">
				Delete
			</button>
		</form>
	</div>
</main>

<?= require base_path('views/partials/footer.php');; ?>