<?php include 'form.php'; ?>
<?php include 'header.php'; ?>

    <section id="contact-form-wrapper" style="background-color: #E8E8E8;border-bottom: solid 2px rgba(163,163,163,1);padding-top: 70px;">
        <div class="container">
            <div class="intro"></div>
            <div class="row">
                <div class="col text-center form-wrapper">
<div id="success_submit" style="padding-bottom:60px;"></div>

<?php echo @$_REQUEST['endFormMessage'];?><?php if(!isset($_REQUEST['endFormMessage']) && $_REQUEST['endFormMessage'] == 0){?>
                    <form class="text-right float-none mx-auto" id="contact-form" method="post" style="max-width: 712px;"><input class="form-control" type="hidden" name="lang" value="english">
                        <div class="messages"></div>
                        <div class="controls">
                            <div class="form-row row-cols-1">
                                <div class="col">
                                    <div class="form-group d-flex"><label for="formRequesterFirstName">&nbsp;Name</label><input class="form-control" type="text" id="form_name" name="formRequesterFirstName" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group d-flex"><label for="formRequesterEmail">Email</label><input class="form-control" type="email" id="form_email" name="formRequesterEmail" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group d-flex"><label for="formRequesterMobile">Phone</label><input class="form-control" type="tel" id="form_phone" name="formRequesterMobile" required="">
                                        <div class="text-center float-none help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group d-flex"><label for="formRequesterMessage">Message</label><textarea class="form-control" id="form_message" name="formRequesterMessage" style="color: #333;"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 text-left"><button class="btn btn-primary btn-lg border rounded float-right" value="تواصل معنا" type="submit" required="" name="submit" style="background-color: rgba(224,152,41,1);border-radius: 30px !important;padding: 10px 40px;"><strong>Contact Us</strong><br></button></div>
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
