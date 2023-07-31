<?php
require('partials/head.php');
require('partials/nav.php');
?>

<?php require('partials/header.php') ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <a href="/notes" class="text-blue-500 hover:undeerline" >
      Go back
    </a>
     <p> <?= $note['body'] ?> </p>
  </div>
</main>

<?= require('partials/footer.php'); ?>