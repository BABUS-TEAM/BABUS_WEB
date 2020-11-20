<?php
 $title="register";
 $page="register";
 include("../config/config3.php");
 include("components/header1.php");
 include("components/navigation&preloader.php");
?>

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row mb-110">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="howit-item">
                        <h2><?php echo $lang['48']; ?></h2>
                    </div>
                    <form action="#" class="contact-form">
                        <input type="hidden" name="lang" value="<?php echo $_SESSION['lang']; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="firstname" placeholder="<?php echo $lang['74']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="lastname" placeholder="<?php echo $lang['74']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="email" placeholder="<?php echo $lang['74']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="phonenumber" placeholder="<?php echo $lang['74']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="username" placeholder="<?php echo $lang['74']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="password" name="password" placeholder="<?php echo $lang['75']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 text-center">
                                <button type="submit"><?php echo $lang['50']; ?></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 order-2 order-lg-1">
                    <img src="<?php echo $imglocation; ?>Capture1.JPG" style="height: 100%; width:100%;">
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

<?php
    include("components/footer1.php");
    include("components/ending1.php");
?>

