<?php if (!is_current_user_admin()) return;

require_once 'bi-includes/_model/Address.php';

/** CHECK DELETE */
if (isset($_POST['delete']) && !empty($_POST['delete'])) {
    $rs = Address::delete($_POST['delete']);
    if ($rs['error'] == 0) {
        echo 'Deleted ' . $rs['room'] . ' class!';
    } else {
        echo 'Something went wrong!';
    }
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$address = Address::getPagination($page);
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
                    <th>Tỉnh/Thành Phố</th>
                    <th>Quận/Huyện</th>
                    <th>Mô tả</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($address['data'] as $ads) :
                    ?>
                    <tr>
                        <td class="small"><?= $ads->getProvinces() ?></td>
                        <td class="small"><?= $ads->getDistrict() ?></td>
                        <td class="small"><?= $ads->getDescription ?></td>
                        <td>
                            <button class="btn btn-remove" name="delete" value="<?= $ads->getId() ?>" title="Delete"><i class="fas fa-trash"></i></button>
                            <a class="btn btn-edit" href="?action=class-edit&data=<?= $ads->getId() ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing <?= $address['start'] ?> to <?= $address['end'] ?> of <?= $address['total'] ?> entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                    <ul class="pagination">
                        <?php if ($address['current_page'] > 1 && $address['total_page'] > 1) : ?>
                            <li class="paginate_button page-item previous" id="dataTable_previous"><a href="admin?action=class&page=<?= $address['current_page'] - 1 ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link"><i class="fas fa-caret-left"></i></a></li>
                        <?php endif; ?>
                        <?php if ($address['current_page'] < $address['total_page'] && $address['total_page'] > 1) : ?>
                            <li class="paginate_button page-item next" id="dataTable_next"><a href="admin?action=class&page=<?= $address['current_page'] + 1 ?>" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link"><i class="fas fa-caret-right"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>