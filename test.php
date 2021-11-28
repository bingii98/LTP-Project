<?php
require_once 'model/User.php';
require_once 'model/Role.php';
$users = user::getAll(); ?>

<table>
    <thead>
    <tr>
        <th>Full Name</th>
        <th>Username</th>
        <th>Role</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td>
                <a href="?edit">
                    <?= $user->getLastName() . ' ' . $user->getFirstName() ?>
                </a>
            </td>
            <td><?= $user->getUserName() ?></td>
            <td><?= Role::getRole($user->getRole()) ?></td>
            <td><?= $user->getEmail() ?></td>
            <td><a class="remove" href="?delete"><i class="fas fa-trash"></i></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>