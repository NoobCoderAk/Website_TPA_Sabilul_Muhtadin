<h1>User List</h1>
<a href="<?= site_url('users/create') ?>">Create New User</a>
<table>
    <tr>
        <th>ID</th>
        <th>judul</th>
        <th>deskripsi</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($artikel as $data): ?>
        <tr>
            <td><?= $data['id'] ?></td>
            <td><?= $data['judul'] ?></td>
            <td>
                <a href="<?= site_url('artikel/edit/' . $data['id']) ?>">Edit</a>
                <a href="<?= site_url('artikel/delete/' . $data['id']) ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>