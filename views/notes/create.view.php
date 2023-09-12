<?php
require base_path('views/partials/head.php');
require base_path( 'views/partials/nav.php');
?>

<?php require base_path('views/partials/header.php'); ?>
<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<div class="mb-4">
			<?php if (isset($success)) : ?>
				<p class="text-green-500 text-md mt-2">
					<?= $success ?>
				</p>
			<?php endif; ?>
		</div>
		<form action="/notes" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">
			<div>
				<label class="block text-gray-700 text-sm font-bold mb-2" for="body">Body message</label>
				<textarea placeholder="insert note .." class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" name="body"><?= $_POST['body'] ?? ''  ?></textarea>
				<div>
					<?php if (isset($errors['body'])) : ?>
						<p class="text-red-500 text-xs mt-2">
							<?= $errors['body'] ?>
						</p>
					<?php endif; ?>
				</div>
			</div>

			<div class="text-center mt-4">
				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">create</button>
			</div>
		</form>
		<a href="/notes" class="text-blue-500 hover:undeerline">
			Go back
		</a>
	</div>

</main>

<?= require base_path('views/partials/footer.php'); ?>