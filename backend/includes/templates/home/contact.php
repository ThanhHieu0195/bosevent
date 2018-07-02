<?php
$hotline = \includes\Bootstrap::bootstrap()->configs->getAttribute('hotline');
$support = \includes\Bootstrap::bootstrap()->configs->getAttribute('support');
$support_phone = \includes\Bootstrap::bootstrap()->configs->getAttribute('support_phone');
$address = \includes\Bootstrap::bootstrap()->configs->getAttribute('address');
$consultant = \includes\Bootstrap::bootstrap()->configs->getAttribute('consultant');
?>
<div class="contact-info">
    <div class="row-contact-info row">
        <div class="col-contact-info col-md-6 col-lg-4">
            <div class="row">
                <h3 class="col-sm-3 col-md-4">Liên hệ Email</h3>
                <div class="col-right col-sm-8 col-md-7 col-sm-offset-1 col-md-offset-1">
                    <div class="contact-info-row col-sm-6 col-md-12"><strong class="text-dark">Tư vấn</strong>
                        <?php echo esc_html($consultant) ?></div>
                    <div class="contact-info-row col-sm-6 col-md-12 "><strong class="text-dark">Hỗ trợ</strong>
                        <?php echo esc_html($support) ?></div>
                </div>
            </div>
        </div>
        <div class="col-contact-info col-md-6 col-lg-4">
            <div class="row">
                <h3 class="col-sm-3 col-md-4">Gọi cho chúng tôi</h3>
                <div class="col-right col-sm-8 col-md-7 col-sm-offset-1 col-md-offset-1">
                    <div class="contact-info-row col-sm-6 col-md-12"><strong class="text-dark">Hotline</strong>
                        <?php echo esc_html($hotline) ?></div>
                    <div class="contact-info-row col-sm-6 col-md-12 "><strong class="text-dark">Hỗ trợ</strong>
                        <?php echo esc_html($support_phone) ?></div>
                </div>
            </div>
        </div>
        <div class="col-contact-info col-md-6 col-lg-4">
            <div class="row">
                <h3 class="col-sm-3 col-md-4">Đỉa chỉ</h3>
                <div class="col-right col-sm-8 col-md-7 col-sm-offset-1 col-md-offset-1">
                    <div class="contact-info-row col-sm-6 col-md-12"><?php echo esc_html($address) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>