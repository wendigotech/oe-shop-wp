<?php get_header(); ?>

<main>
    <header>
        <h1><?php _e( '404 - Page Not Found', 'oe_shop' ); ?></h1>
    </header>
    <section>
        <p><?php _e( 'Oops! The page you\'re looking for doesn\'t exist.', 'oe_shop' ); ?></p>
        <p><?php _e( 'Please check the URL or go back to the homepage.', 'oe_shop' ); ?></p>
    </section>
    <footer>
        <a href="/" class="button"><?php _e( 'Go Home', 'oe_shop' ); ?></a>
    </footer>
</main>        

<?php get_footer(); ?>