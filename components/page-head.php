<div class="page-head">
    <div class="page-head__logo-container">
        <div class="container">
            <a href="/"><?php include(locate_template('icons/logo.php')); ?></a>
        </div>
    </div>
    <div class="page-head__navigation">
        <div class="container">
            <?php
                wp_nav_menu( [
                    'container' => 'nav',
                    'container_id' => 'main-nav',
                    'theme_location' => 'primary'
                ] );
            ?>
        </div>
    </div>
</div>