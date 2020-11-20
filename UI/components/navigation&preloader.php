<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="logo">
                <a href="./index.html"><img src="<?php echo $imglocation; ?>logo.png" alt=""></a>
            </div>
            <nav class="main-menu mobile-menu">
                <ul>
                    <li <?php if($page=="home"){ echo 'class="active"'; } ?>><a href="<?php echo $link; ?>home"><?php echo $lang['45']; ?></a></li>
                    <li <?php if($page=="blog"){ echo 'class="active"'; } ?>><a href="<?php echo $link; ?>blog"><?php echo $lang['46']; ?></a></li>
                    <li <?php if($page=="contact"){ echo 'class="active"'; } ?>><a href="<?php echo $link; ?>contact"><?php echo $lang['47']; ?></li>
                    <li <?php if($page=="register"){ echo 'class="active"'; } ?>><a href="<?php echo $link; ?>register"><?php echo $lang['48']; ?></li>
                </ul>
            </nav>
            <div class="header-right">
                <div class="user-access">
                    <a href="?lang=en"><?php echo $lang['51']; ?>/</a>
                    <a href="?lang=am"><?php echo $lang['52']; ?></a>
                </div>
                <a href="login" class="primary-btn"><?php echo $lang['50']; ?></a>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>

   <!-- Header End -->
