<h2>Edit user</h2>

<div class="m-4 ms-0">
    <?= get('message'); ?>
</div>

<?php
    $user = find('users', 'id', $_GET['id']);
?>

<form action="pages/forms/update_user.php" method="post" role="form">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="<?=$user->name;?>">
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" name="lastname" id="lastname" value="<?=$user->lastname;?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?=$user->email;?>">
    </div>
    <input type="hidden" name="id" value="<?=$user->id;?>">

    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
