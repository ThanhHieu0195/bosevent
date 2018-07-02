<?php
$hotline = \includes\Bootstrap::bootstrap()->configs->getAttribute('hotline');
$support = \includes\Bootstrap::bootstrap()->configs->getAttribute('support');
$support_phone = \includes\Bootstrap::bootstrap()->configs->getAttribute('support_phone');
$address = \includes\Bootstrap::bootstrap()->configs->getAttribute('address');
$consultant = \includes\Bootstrap::bootstrap()->configs->getAttribute('consultant');
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="section-info">
                    <div class="title-hr"></div>
                    <div class="info-title"><?php echo esc_html__('Liên hệ với chúng tôi', 'dm') ?></div>
                </div>
            </div>
            <div class="col-md-9">
                <h4 class="contact-title contact-top">Việt phúc contrucstion company limited</h4>
                <p class="contact-row">Địa chỉ: <?php echo esc_html($address) ?></p>
                <p class="contact-row">Email: infor@vietphucco.com</p>
                <p class="contact-row">Skype: vietphucco</p>
                <p class="contact-row">Fax: (+84) 28.1234568</p>
            </div>
        </div>
    </div>
</section>