<?php if (!is_current_user_admin()) return;

require_once '_model/Parameter.php';
$datas = Parameter::getAll(); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Setting Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datas as $data) : ?>
                    <tr>
                        <td>
                            <a href="?edit=<?= $data->getKey() ?>">
                                <?= $data->getData() ?>
                            </a>
                        </td>
                        <td><?= $data->getValue() ?></td>
                        <td>
                            <a class="btn btn-edit" href="?edit=<?= $data->getKey() ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div
    </div>
</div>