<?php require(base_path('views/partials/head.php')); ?>
  <?php require(base_path('views/partials/nav.php')); ?>
  <?php require(base_path('views/partials/banner.php')); ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <form action="/note" method="POST" class="mx-auto max-w-md space-y-4 rounded-lg border border-gray-300 bg-gray-100 p-6">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="note_id" value="<?=$note['id']?>">
        <div>
          <label class="block text-sm font-medium text-gray-900" for="body">Note body</label>
          <textarea class="mt-1 w-full resize-none rounded-lg border-gray-300 focus:border-indigo-500 focus:outline-none" id="body" name="body" rows="4" placeholder="Your description"><?=  isset($note) && array_key_exists('body', $note) ? $note['body'] : '' ?></textarea>
          <p class="inline-block text-red-600 text-xs mt-4 hover:underline">
            <?= isset($errors['body']) ? $errors['body'] : '' ?>
          </p>
        </div>
 
        <a href="/note?id=<?=$note['id']?>" class="block w-full rounded-lg border border-gray-600 bg-gray-600 px-12 py-3 text-sm font-medium text-center text-white transition-colors hover:bg-transparent hover:text-gray-600">
          Cancel
        </a>
        <button class="block w-full rounded-lg border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white transition-colors hover:bg-transparent hover:text-indigo-600" type="submit">
          Update
        </button>
      </form>
    </div>
  </main>
<?php require(base_path('views/partials/footer.php')); ?>
