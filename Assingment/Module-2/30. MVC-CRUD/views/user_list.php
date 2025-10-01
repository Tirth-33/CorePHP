<h2>User List</h2>
<a href="index.php?action=create">Add User</a>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
<?php foreach ($users as $user): ?>
<tr>
  <td><?= $user['id'] ?></td>
  <td><?= htmlspecialchars($user['name']) ?></td>
  <td><?= htmlspecialchars($user['email']) ?></td>
  <td>
    <a href="index.php?action=edit&id=<?= $user['id'] ?>">Edit</a>
    <a href="index.php?action=delete&id=<?= $user['id'] ?>">Delete</a>
  </td>
</tr>
<?php endforeach; ?>
</table>