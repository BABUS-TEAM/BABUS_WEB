<?php
 $title="login";
 $page="login";
 include("../config/config3.php");
 include("components/header1.php");
 include("components/navigation&preloader.php");
?>

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row mb-110">
                <div class="col-lg-6">
                    <img src="<?php echo $imglocation; ?>e03ecb526abb1822f7cd4e4556c88ce8.jpg">
                </div>
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="howit-item">
                        <h2><?php echo $lang['50']; ?></h2>
                    </div>
                    <form action="#" class="contact-form">
                        <input type="hidden" name="lang" value="<?php echo $_SESSION['lang']; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="username" placeholder="<?php echo $lang['74']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
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
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

<?php
    include("components/footer1.php");
    include("components/ending1.php");
?>

