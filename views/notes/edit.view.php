<?php
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
?>

<?php require base_path('views/partials/header.php'); ?>
<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<form action="/note" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">
			<input type="hidden" name="_method" value='PATCH'>
			<input type="hidden" name="id" value='<?= $note['id'] ?>'>
			<div>
				<label class="block text-gray-700 text-sm font-bold mb-2" for="body">Body message</label>
				<textarea placeholder="insert note .." class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" name="body"><?= $note['body'] ?? ''  ?></textarea>
				<div>
					<?php if (isset($errors['body'])) : ?>
						<p class="text-red-500 text-xs mt-2">
							<?= $errors['body'] ?>
						</p>
					<?php endif; ?>
				</div>
			</div>

			<div class="flex justify-end mt-4">
				<a href="/notes" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
					Cancel
				</a>
				<button class="bg-yellow-500 hover:bg-YELLOW-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">EDIT</button>
			</div>
		</form>
	</div>

</main>

<?= require base_path('views/partials/footer.php'); ?>