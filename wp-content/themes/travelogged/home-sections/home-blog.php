<?php
    if ( wl_theme_is_companion_active() ) {
        if ( get_theme_mod( 'blog_home','1' ) == "1" ) {
?>
<!--Blog Post Section-->
<section class="blog_post space bg">
    <div class="container">
		<!--section-heading-->
		<div class="section-heading  text-center">
            <h2 class="section-title"><span> <?php echo esc_html( get_theme_mod( 'travelogged_blog_title','Our Blogs') ); ?> </span></h2>
            <p> <?php echo esc_html( get_theme_mod( 'travelogged_blog_desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.') ); ?> </p>
        </div>
		<!--owl-carousel-slider-->
        <div class="owl-carousel blog-slider owl-theme owl-nav_mainclr owl_btn2">
            <?php 
                $post_data = array( 'post_type' => 'post', 'posts_per_page' => -1, 'post__not_in' => get_option( 'sticky_posts' ) ); 
                $post_data = new WP_Query( $post_data );
                if ( $post_data->have_posts() ) { $count = 1;
                while ( $post_data->have_posts() ) : $post_data->the_post(); 
            ?>
			<!--item-slider-->
            <div class="item row">
                <?php if ( has_post_thumbnail() ) { ?>
                <div class="col-md-5 blog_post_img">
                    <img src="<?php esc_url( the_post_thumbnail_url() ); ?>" class="img-fluid" alt="<?php the_title(); ?>"/>
                </div>
                <?php } ?>
                <div class="col-md-7 blog_post_cont">
                    <div class="cont-inner">
                        <h4><span><?php the_title(); ?></span></h4>
                        <h6 class="date"> 29/12/2018 </h6>
                        <?php echo esc_html( substr( get_the_excerpt(), 0, get_theme_mod( 'excerpt_blog', 200 ) ) ); ?>
                        <button type="submit" class="btn"> <a href="<?php esc_url( the_permalink() ); ?>">Read More</a></button>
                    </div>
                </div>
            </div>
			<!--item-slider-->
            <?php endwhile; } wp_reset_query(); ?>
        </div>
    </div>
</section>
<?php } } ?>