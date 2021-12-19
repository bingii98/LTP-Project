<?php if (!is_current_user_admin()) return;

require_once 'bi-includes/_model/Parameter.php';
$data = Parameter::getByKey($_GET['data']) ?>
<section class="contact section-padding pt-55">
    <div class="container">
        <div class="form">
            <input type="hidden" class="back-page" value="<?= Config::HOME_PATH ?>/admin?action=parameter">
            <form id="add-address" action="admin-ajax">
                <input type="hidden" name="action" value="edit-parameter">
                <input type="hidden" name="data" value="<?= $data->getId() ?>">
                <div class="form-box bg-repeat bg-img" data-background="img/bg-pattern.jpg" data-title="Sửa thông tin - <?= $data->getData() ?>">
                    <div class="form-group">
                        <label><?= $data->getData() ?></label>
                        <?php if ($data->getKey() == 'become_professor_description') : ?>
                            <div class="editor-wrapper">
                                <div id="editor-toolbar"></div>
                                <div id="editor-content" contenteditable>
                                    <?= base64_decode($data->getValue()) ?>
                                </div>
                                <textarea name="value" hidden>
                                    <?= base64_decode($data->getValue()) ?>
                                </textarea>
                            </div>
                        <?php else: ?>
                            <input type="text" name="value" class="form-control" value="<?= $data->getValue() ?>" placeholder="Value">
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <div class="btn-wrap text-center mt-50">
                            <button type="submit" class="btn-curve btn-normal"><span>Xác nhận</span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>