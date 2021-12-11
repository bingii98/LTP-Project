<?php if (!is_current_user_admin()) return;

require_once 'bi-includes/_model/Parameter.php';
require_once 'bi-includes/_model/Subjects.php';

/** CHECK DELETE */
if (isset($_POST['delete']) && !empty($_POST['delete'])) {
    $rs = Subjects::delete($_POST['delete']);
    if ($rs['error'] == 0) {
        echo 'Deleted ' . $rs['username'] . '!';
    } else {
        echo 'Something went wrong!';
    }
}


$datas = Subjects::getAll(); ?>
<form class="card shadow mb-4" method="post">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Setting Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datas as $data) : ?>
                    <tr>
                        <td>
                            <?= $data->getID() ?>
                        </td>
                        <td><?= $data->getName() ?></td>
                        <td>
                            <button class="btn btn-remove" name="delete" value="<?= $data->getID() ?>" title="Delete User"><i class="fas fa-trash"></i></button>
                            <a class="btn btn-edit" href="?action=subject-edit&subject=<?= $data->getID() ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div
    </div>
</form>