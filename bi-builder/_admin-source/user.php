<?php if (!is_current_user_admin()) return;

require_once 'bi-includes/_model/User.php';
require_once 'bi-includes/_model/Role.php';

/** CHECK DELETE */
if (isset($_POST['delete']) && !empty($_POST['delete'])) {
    $rs = User::delete($_POST['delete']);
    if ($rs['error'] == 0) {
        echo 'Deleted ' . $rs['username'] . '!';
    } else {
        echo 'Something went wrong!';
    }
}

/** CHECK UPDATE */
if (isset($_POST['confirm_professor']) && !empty($_POST['confirm_professor'])) {
    $rs = User::updatePendingProfessor($_POST['confirm_professor']);
    echo 'Update ' . $rs['username'] . '!';
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$users = User::getUser_Pagination($page);

?>
<form class="card shadow mb-4" method="post">
    <input type="hidden" name="action" value="user">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                <?php foreach ($users['data'] as $user) : ?>
                    <tr>
                        <td class="small font-weight-bold">
                            <a href="?edit=<?= $user->getUsername() ?>">
                                <?= $user->getLastName() . ' ' . $user->getFirstName() ?>
                            </a>
                        </td>
                        <td class="small"><?= $user->getUserName() ?></td>
                        <td class="small">
                            <?= Role::getRole($user->getRole()) ?>
                            <?php if ($user->getPendingProfessor() == 1) : ?>
                                <div class="d-flex">
                                    <button class="btn btn-link btn-sm pl-0" name="confirm_professor" value="<?= $user->getUserID() ?>">Duyệt làm gia sư</button>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="small"><?= $user->getEmail() ?></td>
                        <td>
                            <button class="btn btn-remove" name="delete" value="<?= $user->getUserID() ?>" title="Delete User"><i class="fas fa-trash"></i></button>
                            <a class="btn btn-edit" href="?action=user-edit&user=<?= $user->getUsername() ?>" title="Edit User"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing <?= $users['start'] ?> to <?= $users['end'] ?> of <?= $users['total'] ?> entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                    <ul class="pagination">
                        <?php if ($users['current_page'] > 1 && $users['total_page'] > 1) : ?>
                            <li class="paginate_button page-item previous" id="dataTable_previous"><a href="admin?action=user&page=<?= $users['current_page'] - 1 ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link"><i class="fas fa-caret-left"></i></a></li>
                        <?php endif; ?>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <?php if ($users['current_page'] < $users['total_page'] && $users['total_page'] > 1) : ?>
                            <li class="paginate_button page-item next" id="dataTable_next"><a href="admin?action=user&page=<?= $users['current_page'] + 1 ?>" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link"><i class="fas fa-caret-right"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>