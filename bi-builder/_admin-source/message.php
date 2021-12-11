<?php
if (!is_current_user_admin()) return;

require_once 'bi-includes/_model/Message.php';
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

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$datas = Message::getPagination($page);
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
                    <th>Date</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datas['data'] as $data) : ?>
                    <tr>
                        <td>
                            <div class="small font-weight-bold"><?= $data->getDate() ?></div>
                        </td>
                        <td>
                            <span class="small"><?= base64_decode($data->getValue()) ?></span>
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
                            <li class="paginate_button page-item previous" id="dataTable_previous"><a href="admin?action=message&page=<?= $datas['current_page'] - 1 ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link"><i class="fas fa-caret-left"></i></a></li>
                        <?php endif; ?>
                        <?php if ($datas['total_page'] > 1) : ?>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <?php endif; ?>
                        <?php if ($datas['current_page'] < $datas['total_page'] && $datas['total_page'] > 1) : ?>
                            <li class="paginate_button page-item next" id="dataTable_next"><a href="admin?action=message&page=<?= $datas['current_page'] + 1 ?>" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link"><i class="fas fa-caret-right"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>