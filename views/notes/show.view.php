<?php require(base_path('views/partials/head.php')); ?>
  <?php require(base_path('views/partials/nav.php')); ?>
  <?php require(base_path('views/partials/banner.php')); ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <a href="/notes" class="text-xl text-blue-500 hover:underline">Go back.</a>
      
      <p class="mt-6"><?= htmlspecialchars($note['body']) ?></p>

      <a href="/note/edit?id=<?=$note['id']?>" class="text-xs text-blue-500 hover:underline">Edit note</a>

      <form action="/note" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" value="<?=$note['id']?>" name="id">
        <button class="block mt-4 rounded-lg border border-red-600 bg-red-600 px-12 py-3 text-sm font-medium text-white transition-colors hover:bg-transparent hover:text-red-600" type="submit">
            Delete a note
        </button>
      </form>
    </div>
  </main>
<?php require(base_path('views/partials/footer.php')); ?>
