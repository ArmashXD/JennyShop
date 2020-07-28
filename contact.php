<?php
include('views/header.php');
?>
<!--================Contact Area =================-->
<section class="contact_area p_100">
    <div class="container">
        <div class="contact_title">
            <h2>Get in Touch</h2>
            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.</p>
        </div>
        <div class="row contact_details">
            <div class="col-lg-4 col-md-6">
                <div class="media">
                    <div class="d-flex">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="media-body">
                        <p>House # 402, Roboto Street,<br />New York, USA.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="media">
                    <div class="d-flex">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="media-body">
                        <a href="tel:+1109171234567">+110 - 917 - 123 - 4567</a>
                        <a href="tel:+1101911897654">+110 - 191 - 189 - 7654</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="media">
                    <div class="d-flex">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="media-body">
                        <a href="mailto:busines@persuit.com">busines@persuit.com</a>
                        <a href="mailto:support@persuit.com">support@persuit.com</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact_form_inner">
            <h3>Drop a Message</h3>
            <form class="contact_us_form row" action="views/contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                <div class="form-group col-lg-4">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name *">
                </div>
                <div class="form-group col-lg-4">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address *">
                </div>
                <div class="form-group col-lg-4">
                    <input type="text" class="form-control" id="website" name="website" placeholder="Your Website">
                </div>
                <div class="form-group col-lg-12">
                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Type Your Message..."></textarea>
                </div>
                <div class="form-group col-lg-12">
                    <button type="submit" value="submit" class="btn update_btn form-control">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!--================End Contact Area =================-->

<?php include('views/footer.php') ?>


<!--================Contact Success and Error message Area =================-->
<div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <h2>Thank you</h2>
                <p>Your message is successfully sent...</p>
            </div>
        </div>
    </div>
</div>