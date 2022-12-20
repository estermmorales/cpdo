<h2>Home page</h2>
<div class="m-4 ms-0">
    <?= get('message'); ?>
</div>
<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $users = findAll('users');
        foreach ($users as $user):
        ?>
        <tr>
            <td><?= $user->id; ?></td>
            <td><?= $user->name . ' ' .$user->lastname; ?></td>
            <td><?= $user->email; ?></td>
            <td>
                <a class="btn btn-success btn-sm" href="?page=edit_user&id=<?=$user->id;?>">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger btn-sm" href="?page=delete_user&id=<?=$user->id;?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="?page=create_user">Sign up</a>