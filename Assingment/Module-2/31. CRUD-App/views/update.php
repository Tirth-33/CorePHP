<h2>Edit User</h2>
<form method="POST" action="index.php?action=update">
  <input type="hidden" name="id" value="<?= $user['id'] ?>">
  <input type="text" name="name" value="<?= $user['name'] ?>" required>
  <input type="email" name="email" value="<?= $user['email'] ?>" required>
  <button type="submit">Update</button>
</form>