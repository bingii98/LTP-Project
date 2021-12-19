<?php if (!is_current_user_admin()) return;

require_once 'bi-includes/_model/Parameter.php';
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
                        <td>
                            <?php if ($data->getKey() == 'become_professor_description') : ?>
                                <?= base64_decode($data->getValue()) ?>
                            <?php else: ?>
                                <?= $data->getValue() ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="btn btn-edit" href="?action=edit-parameter&data=<?= $data->getKey() ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div
    </div>
</div>