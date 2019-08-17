<div class="page-head" data-component="main-nav">
    <div class="page-head__logo-container">
        <div class="container">
            <button data-element="toggle" class="page-head__mobile-nav-toggle hamburger--collapse">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
            <a class="page-head__logo" href="/"><?php include(locate_template('icons/logo.php')); ?></a>
        </div>
    </div>
    <div class="page-head__navigation" data-element="navigation">
        <?php
            wp_nav_menu( [
                'container' => 'nav',
                'container_id' => 'main-nav',
                'theme_location' => 'primary'
            ] );
        ?>
    </div>
</div>