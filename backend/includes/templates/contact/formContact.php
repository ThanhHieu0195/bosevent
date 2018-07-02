<section class="section-message section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="section-info">
                    <div class="title-hr"></div>
                    <div class="info-title"><?php echo esc_html__('Gửi thắc mắc cho chúng tôi', 'dm') ?></div>
                </div>
            </div>
            <div class="col-md-9">
                <form class="js-form">
                    <div class="row">
                        <div class="form-group col-sm-6 col-lg-4">
                            <input class="input-gray" type="text" name="name" required placeholder="Họ & tên*">
                        </div>
                        <div class="form-group col-sm-6 col-lg-4">
                            <input class="input-gray" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group col-sm-12 col-lg-4">
                            <input class="input-gray" type="text" name="subject" placeholder="Tiêu đề">
                        </div>
                        <div class="form-group col-sm-12">
                            <textarea class="input-gray" name="message" required placeholder="Nội dung nhắn*"></textarea>
                        </div>
                        <div class="col-sm-12"><button type="submit" class="btn-upper btn-primary btn">Gửi đi</button></div>
                    </div>
                    <div class="success-message"><i class="fa fa-check text-primary"></i> Cám ơn bạn!. Thắc mắc/yêu cầu của bạn đã được gửi đi...</div>
                    <div class="error-message">Xin lỗi bạn! Thắc mắc/yêu cầu của bạn chưa được gửi đi bạn có thể liên hệ trực tiếp vói chúng tôi bằng điện thoại</div>
                </form>
            </div>
        </div>
    </div>
</section>