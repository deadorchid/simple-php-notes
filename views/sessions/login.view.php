<?php require(base_path('views/partials/head.php')); ?>
<?php require(base_path('views/partials/nav.php')); ?>
<?php require(base_path('views/partials/banner.php')); ?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <form action="/login" method="POST" class="mx-auto max-w-md space-y-4 rounded-lg border border-gray-300 bg-gray-100 p-6">
      <div>
        <label class="block text-sm font-medium text-gray-900" for="email">Email</label>
        <input class="mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:outline-none" id="email" type="email" placeholder="Your email" name="email">
        <p class="inline-block text-red-600 text-xs mt-4 hover:underline">
          <?= isset($errors['email']) ? $errors['email'] : '' ?>  
        </p>  
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-900" for="password">Password</label>
        <input class="mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:outline-none" id="password" type="password" placeholder="Your password" name="password">
        <p class="inline-block text-red-600 text-xs mt-4 hover:underline">
          <?= isset($errors['password']) ? $errors['password'] : '' ?>
        </p> 
      </div>

      <button class="block w-full rounded-lg border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white transition-colors hover:bg-transparent hover:text-indigo-600" type="submit">
        Log in
      </button>
    </form>
    </div>
  </main>
<?php require(base_path('views/partials/footer.php')); ?>
