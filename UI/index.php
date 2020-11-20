<?php
 $title="home";
 $page="home";
 include("../config/config3.php");
 include("components/header1.php");
 include("components/navigation&preloader.php");
?>
 <!-- App Section Begin -->
 <section class="app-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="<?php echo $imglocation; ?>phone.png" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="app-text">
                        <div class="section-title">
                            <h2><?php echo $lang['60']; ?></h2>
                            <p><?php echo $lang['61']; ?></p>
                        </div>
                        <p><?php echo $lang['62']; ?></p>
                        <ul>
                            <li><img src="<?php echo $imglocation; ?>check-icon.png" alt=""><?php echo $lang['63']; ?></li>
                            <li><img src="<?php echo $imglocation; ?>check-icon.png" alt=""><?php echo $lang['64']; ?></li>
                            <li><img src="<?php echo $imglocation; ?>check-icon.png" alt=""><?php echo $lang['65']; ?>
                            </li>
                        </ul>
                        <a href="#"><img src="<?php echo $imglocation; ?>apple-store.jpg" alt=""></a>
                        <a href="#"><img src="<?php echo $imglocation; ?>google-store.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- App Section End -->
    

    <!-- How It Works Section Begin -->
    <section class="work-section set-bg" data-setbg="<?php echo $imglocation; ?>line-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo $lang['66']; ?></h2>
                        <p><?php echo $lang['67']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-work-item">
                        <div class="number">01.</div>
                        <div class="work-text">
                            <h4><?php echo $lang['68']; ?></h4>
                            <p><?php echo $lang['69']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-work-item">
                        <div class="number">02.</div>
                        <div class="work-text">
                            <h4><?php echo $lang['70']; ?></h4>
                            <p><?php echo $lang['71']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-work-item">
                        <div class="number">03.</div>
                        <div class="work-text">
                            <h4><?php echo $lang['72']; ?></h4>
                            <p><?php echo $lang['73']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How It Works Section End -->

   
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
