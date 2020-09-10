<?php if( get_theme_mod( 'show_contact_bar' ) ){ ?>
    <div class="container header-topbar">
        <div class="topbar_row wow fadeInDown animated" data-wow-duration="2s" data-wow-offset="250">
            <?php if(  get_theme_mod( 'number' ) ) { ?>
                    <div class="topbar-col">
                        <div class="info_header-box">
                            <i class="fa fa-phone"> </i>
                            <span>: <?php echo esc_attr( get_theme_mod( 'number','+1 987654321' ) ); ?> </span>
                        </div>
                    </div>
            <?php } if( get_theme_mod( 'email' )  ) { ?>
			<div class="topbar-col ">
				<div class="info_header-box">
					<i class="far fa-envelope"></i>
					<span>: <?php echo esc_attr( get_theme_mod( 'email','example@example.com' ) ); ?> </span>
				</div>
            </div>
            <?php } ?>
            <div class="topbar-col">
               <ul class="team_social">
                    <?php if( get_theme_mod( 'facebook' ) ) { ?>
                    <li>
                        <a href="<?php echo esc_url( get_theme_mod( 'facebook','#' ) ); ?>" target="_blank"> <i class="fab fa-facebook-f"></i> </a>
                    </li>
                    <?php } if( get_theme_mod( 'twitter' )  ) { ?>
                    <li>
                        <a href="<?php echo esc_url( get_theme_mod( 'twitter','#' ) ); ?>" target="_blank"> <i class="fab fa-twitter"></i> </a>
                    </li>
                    <?php } if( get_theme_mod( 'instagram' )  ) { ?>
                    <li>
                        <a href="<?php echo esc_url( get_theme_mod( 'instagram','#' ) ); ?>" target="_blank"> <i class="fab fa-instagram"></i> </a>
                    </li>
                    <?php } if( get_theme_mod( 'linkedin' )  ) { ?>
                    <li>
                        <a href="<?php echo esc_url( get_theme_mod( 'linkedin','#' ) ); ?>" target="_blank"> <i class="fab fa-linkedin"></i> </a>
                    </li>
                    <?php } if( get_theme_mod( 'youtube' ) ) { ?>
                    <li>
                        <a href="<?php echo esc_url( get_theme_mod( 'youtube','#' ) ); ?>" target="_blank" > <i class="fab fa-youtube"></i> </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>