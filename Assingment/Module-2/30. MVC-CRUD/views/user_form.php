<h2><?= isset($user) ? 'Edit' : 'Create' ?> User</h2>
<form method="POST">
  <input type="text" name="name" value="<?= $user['name'] ?? '' ?>" required>
  <input type="email" name="email" value="<?= $user['email'] ?? '' ?>" required>
  <button type="submit">Save</button>
</form>