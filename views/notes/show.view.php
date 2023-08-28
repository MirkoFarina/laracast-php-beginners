<?php
require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/nav.php';
?>

<?php require __DIR__ . '/../partials/header.php' ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <a href="/notes" class="text-blue-500 hover:undeerline" >
      Go back
    </a>
     <p> <?= htmlspecialchars( $note['body'])?> </p>
  </div>
</main>

<?= require __DIR__ . '/../partials/footer.php'; ?>