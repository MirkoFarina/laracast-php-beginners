<?php
require base_path('views/partials/head.php');;
require base_path('views/partials/nav.php');;
?>

<?php require base_path('views/partials/header.php'); ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <?php foreach ($notes as   $note) : ?>
      <li>
        <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
          <?= htmlspecialchars($note['body']) ?>
        </a>
      </li>
    <?php endforeach; ?>

    <div class="mt-6">
      <a class="text-blue-500 hover:underline" href="/note/create">Create new Note</a>
    </div>
  </div>
</main>

<?= require base_path('views/partials/footer.php');; ?>