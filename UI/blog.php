<?php
 $title="blog";
 $page="blog";
 include("../config/config3.php");
 include("components/header1.php");
 include("components/navigation&preloader.php");
?>

    <!-- Hero Section Begin -->
    <div class="hero-listing set-bg" data-setbg="<?php echo $imglocation; ?>blog-bg.jpg">
    </div>
    <!-- Hero Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-item">
                       <div class="blog-pic set-bg" data-setbg="<?php echo $imglocation; ?>blog/blog-1.jpg">
                            <div class="blog-absolute">
                                <h2>23</h2>
                                <span>March</span>
                                <span>2019</span>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h2>Top 10 Tourist Destinations in Ethiopia</h2>
                            <ul>
                                <li>By Admin</li>
                                <li>3 Comments</li>
                            </ul>
                            <p>Ethiopia has been listed on the forbs list of ten countries to be visted after covid pandemic</p>
                            <a href="#" class="primary-btn">Read More</a>
                        </div>
                    </div>
                    <div class="blog-item">
                        <div class="blog-pic set-bg" data-setbg="<?php echo $imglocation; ?>blog/blog-2.jpg">
                            <div class="blog-absolute">
                                <h2>23</h2>
                                <span>March</span>
                                <span>2019</span>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h2>Top Restaurants In Addis Abeba</h2>
                            <ul>
                                <li>By Admin</li>
                                <li>3 Comments</li>
                            </ul>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Ut gravida mattis magna, non varius lorem sodales nec. In libero orci, ornare non nisl a, auctor euismod purus. Morbi pretium interdum vestibulum. Fusce nec eleifend ipsum. Sed non blandit tellus. Phasellus facilisis lobortis metus, sit amet viverra lectus finibus ac. Aenean non felis dapibus, placerat libero auctor, ornare ante. Morbi quis ex eleifend, sodales nulla vitae, scelerisque ante.</p>
                            <a href="#" class="primary-btn">Read More</a>
                        </div>
                    </div>
                    <div class="blog-item">
                        <div class="blog-pic set-bg" data-setbg="<?php echo $imglocation; ?>blog/blog-3.jpg">
                            <div class="blog-absolute">
                                <h2>23</h2>
                                <span>March</span>
                                <span>2019</span>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h2>Top Destinations in Addis Abeba</h2>
                            <ul>
                                <li>By Admin</li>
                                <li>3 Comments</li>
                            </ul>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Ut gravida mattis magna, non varius lorem sodales nec. In libero orci, ornare non nisl a, auctor euismod purus. Morbi pretium interdum vestibulum. Fusce nec eleifend ipsum. Sed non blandit tellus. Phasellus facilisis lobortis metus, sit amet viverra lectus finibus ac. Aenean non felis dapibus, placerat libero auctor, ornare ante. Morbi quis ex eleifend, sodales nulla vitae, scelerisque ante.</p>
                            <a href="#" class="primary-btn">Read More</a>
                        </div>
                    </div>
                    <div class="blog-pagination">
                        <a href="#" class="active">01</a>
                        <a href="#">02</a>
                        <a href="#">03</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

<?php
    include("components/footer1.php");
    include("components/ending1.php");
?>

