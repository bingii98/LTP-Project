<?php
require_once './_model/Room.php';
require_once './_model/User.php';

/** CHECK DELETE */
if (isset($_POST['delete']) && !empty($_POST['delete'])) {
    $rs = User::delete($_POST['delete']);
    if ($rs['error'] == 0) {
        echo 'Deleted ' . $rs['username'] . '!';
    } else {
        echo 'Something went wrong!';
    }
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$datas = Room::getPagination($page);
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
                    <th>Tiêu đề</th>
                    <th>Gia sư</th>
                    <th>Loại</th>
                    <th>Số buổi/tuần</th>
                    <th>Số giờ/buổi</th>
                    <th>Giá</th>
                    <th>Học viên/ Đề nghị dạy</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datas['data'] as $data) :
                    ?>
                    <tr>
                        <td class="small font-weight-bold">
                            <a href="?action=room&edit=<?= $data->getId() ?>">
                                <?= $data->getTitle() ?>
                            </a>
                        </td>
                        <td class="small"><?= User::getByID(Room::getOwner($data->getId()))->getUsername() ?></td>
                        <td class="small"><?= $data->getType() ?></td>
                        <td class="small"><?= $data->getTime() ?></td>
                        <td class="small"><?= $data->getHours() ?></td>
                        <td class="small">
                            <?= number_format($data->getPrice(), 0, '', ',') . " vnđ"; ?>
                        </td>
                        <td class="small"><?= $data->getOfferToTeach() ?></td>
                        <td>
                            <button class="btn btn-remove" name="delete" value="<?= $data->getId() ?>" title="Delete"><i class="fas fa-trash"></i></button>
                            <a class="btn btn-edit" href="?action=class-edit&data=<?= $data->getId() ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing <?= $datas['start'] ?> to <?= $datas['end'] ?> of <?= $datas['total'] ?> entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                    <ul class="pagination">
                        <?php if ($datas['current_page'] > 1 && $datas['total_page'] > 1) : ?>
                            <li class="paginate_button page-item previous" id="dataTable_previous"><a href="admin?action=user&page=<?= $datas['current_page'] - 1 ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link"><i class="fas fa-caret-left"></i></a></li>
                        <?php endif; ?>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <?php if ($datas['current_page'] < $datas['total_page'] && $datas['total_page'] > 1) : ?>
                            <li class="paginate_button page-item next" id="dataTable_next"><a href="admin?action=user&page=<?= $datas['current_page'] + 1 ?>" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link"><i class="fas fa-caret-right"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>