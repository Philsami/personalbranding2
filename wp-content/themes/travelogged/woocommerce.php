<?php
/**
 *
 * The Template for Woocommerce.
 *
 * @package Travelogged
 */
get_header();
?>

<?php get_template_part( 'inc/header-section' ) ?> <!-- Header section -->

<!--blog-page-cont-->
<div class="page-blog main-container post-details">
    <div class="space container ">
        <!--blogo-post-->
        <div class="row">
            <div class="col-lg-12 col-md-12 view_post">
                <?php woocommerce_content(); ?>
            <!--post-->
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>