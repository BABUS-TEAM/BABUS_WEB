<?php
 $title="contact";
 $page="contact";
 include("../config/config3.php");
 include("components/header1.php");
 include("components/navigation&preloader.php");
?>


    <!-- Map Section Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26440.72384129847!2d-118.24906619231132!3d34.06719475913053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c659f50c318d%3A0xe2ffb80a9d3820ae!2sChinatown%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1570213740685!5m2!1sen!2sbd"
            height="657" style="border:0;" allowfullscreen="">
        </iframe>
    </div>
    <!-- Map Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="cs-info">
                        <h2>Contact Info</h2>
                        <p>Babus system is avaialable at most of ticketing companies! </p>
                        <span>Atlas road , Sheger building Office. No 255</span>
                        <ul>
                            <li>+251 0113 345 587</li>
                            <li>babus@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-add">
                        <img src="<?php echo $imglocation; ?>contact-add.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

<?php
    include("components/footer1.php");
    include("components/ending1.php");
?>
