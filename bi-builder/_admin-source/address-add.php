<?php if (!is_current_user_admin()) return; ?>
<section class="contact section-padding pt-55">
    <div class="container">
        <div class="form">
            <input type="hidden" class="back-page" value="<?= Config::HOME_PATH ?>/admin?action=address">
            <form id="add-address" action="admin-ajax">
                <input type="hidden" name="action" value="add-address">
                <input type="hidden" name="admin" value="true">
                <div class="form-box bg-repeat bg-img" data-background="img/bg-pattern.jpg" data-title="Thêm mô tả - địa chỉ">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tỉnh / Thành phố</label>
                            <select name="provinces" required>
                                <option value="">Tỉnh / Thành phố</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Huyện / Quận</label>
                            <select name="district">
                                <option value="">Quận / Huyện</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <div class="editor-wrapper">
                            <div id="editor-toolbar"></div>
                            <div id="editor-content" contenteditable></div>
                            <textarea name="description" hidden></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="address-error"></div>
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