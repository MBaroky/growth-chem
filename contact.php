<?php include 'form.php'; ?>
<?php include 'header.php'; ?>
<style>
    #main-header + section{
        display:none !important;
    }
</style>
    <section id="contact-form-wrapper">
        <div class="container">
            <div class="intro"></div>
            <div class="row rtl">
                <div class="col text-center">
<div id="success_submit" style="padding-bottom:60px;"></div>

<?php echo @$_REQUEST['endFormMessage'];?><?php if(!isset($_REQUEST['endFormMessage']) && $_REQUEST['endFormMessage'] == 0){?>
                    <form class="text-right float-none mx-auto rtl" id="contact-form" method="post" style="max-width: 712px;"><input class="form-control" type="hidden" name="lang" value="arabic">
                        <div class="messages"></div>
                        <div class="controls">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group"><label class="d-none" for="formRequesterFirstName">الاسم</label><input class="form-control" type="text" id="form_name" name="formRequesterFirstName" required="" placeholder="الاسم">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"><label class="d-none" for="formRequesterEmail">البريد الالكتروني</label><input class="form-control" type="email" id="form_email" name="formRequesterEmail" required="" placeholder="البريد الالكتروني">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"><label class="d-none" for="formRequesterMobile">التليفون </label><input class="form-control" type="tel" id="form_phone" name="formRequesterMobile" placeholder="التليفون" required="">
                                        <div class="text-center float-none help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group"><label class="d-none" for="formRequesterMessage">الرسالة</label><textarea class="form-control" id="form_message" name="formRequesterMessage" placeholder="الرسالة" style="color: #333;"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center"><button class="btn btn-success btn-lg border rounded-0 float-none" value="لمعرفة المزيد" type="submit" required="" name="submit"><strong>لمعرفة المزيد</strong><br></button></div>
                        </div>
                    </form>
<script>
_gaq.push(['_trackEvent', 'submit', 'showed', '', 0]);
</script>
<?php } else { ?>
<script>
_gaq.push(['_trackEvent', 'submit', 'clicked', '', 0]);
</script>
<?php } ?>
</div>
            </div>
        </div>
    </section>
    <!--end of content-->
<?php include 'footer.php'; ?>
