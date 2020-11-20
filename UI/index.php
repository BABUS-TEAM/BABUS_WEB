<?php
 $title="home";
 $page="home";
 include("../config/config3.php");
 include("components/header1.php");
 include("components/navigation&preloader.php");
?>


    <!-- Testimonial Section Begin -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="testimonial-item owl-carousel">
                        <div class="single-testimonial-item">
                            <img src="<?php echo $imglocation; ?>testimonial-1.png" alt="">
                            <p>Tnxs.</p>
                            <h4>Abenezer Elias</h4>
                            <span>CEO Company</span>
                        </div>
                        <div class="single-testimonial-item">
                            <img src="<?php echo $imglocation; ?>testimonial-1.png" alt="">
                            <p>m.</p>
                            <h4>Natnael Abera</h4>
                            <span>CEO Company</span>
                        </div>
                        <div class="single-testimonial-item">
                            <img src="<?php echo $imglocation; ?>testimonial-1.png" alt="">
                            <p>h</p>
                            <h4>Salem Getachew</h4>
                            <span>CEO Company</span>
                        </div>
                        <div class="single-testimonial-item">
                            <img src="<?php echo $imglocation; ?>testimonial-1.png" alt="">
                            <p>h</p>
                            <h4>Nahom Tadesse</h4>
                            <span>CEO Company</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="bg-img">
                <img src="<?php echo $imglocation; ?>testimonial-bg.png" alt="">
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

<?php
    include("components/footer1.php");
    include("components/ending1.php");
?>
