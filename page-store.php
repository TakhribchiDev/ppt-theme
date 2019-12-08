<?php
/**
 * PPT Theme Store page
 *
 * @package ppttheme
 */

get_header();
?>
    <section id="primary" class="content-area ppt-content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">

                <?php
                $slides = [
                    [
                        'image' => 'discuss',
                        'caption' => 'با ما وقتتون رو برای چیزای مهمتر بزارید'
                    ],
                    [
                        'image' => 'designing',
                        'caption' => 'کار سخت طراحی قالب ارائه را به ما بسپارید'
                    ],
                    [
                        'image' => 'design-desk',
                        'caption' => 'طراحی پاورپوینت با پرده نگار آسان می شود'
                    ]
                ];
                ?>

                <div id="storePageSlider" class="ppt-storepage-slider ppt-slider carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php for ( $j = 0; $j < sizeof( $slides ); $j++ ) : ?>
                            <li data-target="#storePageSlider" data-slide-to="<?php echo $j ?>" class="<?php echo ( $j == 0 ? 'active' : '' ); ?>"></li>
                        <?php endfor; ?>
                    </ol>
                    <div class="carousel-inner">

                        <?php $i = 0; foreach ( $slides as $slide ) : ?>
                            <div class="carousel-item <?php echo ( $i == 0 ? 'active' : '' ); ?>">
                                <div class="d-block w-100 carousel-slide background-image" style="background-image: url('<?php echo get_template_directory_uri() . '/img/slider/' . $slide['image'] . '.jpg'; ?>')"></div>
                                <h1 class="caption"><?php _e( $slide['caption'], 'ppttheme'); ?></h1>
                            </div><!-- .carousel-item -->
                            <?php $i++; endforeach; ?>

                    </div><!-- .carousel-inner -->

                    <a href="#storePageSlider" class="carousel-control-prev" role="button" data-slide="prev">
                        <i class="ppt-icon ppt-chevron-left-thin"></i>
                        <span class="sr-only">قبلی</span>
                    </a>

                    <a href="#storePageSlider" class="carousel-control-next" role="button" data-slide="next">
                        <i class="ppt-icon ppt-chevron-right-thin"></i>
                        <span class="sr-only">بعدی</span>
                    </a>

                </div><!-- #storePageSlider -->

                <div class="ppt-products">
                    <?php
                    $products_args = [
                        'post_type'         => 'product',
                        'product_cat'       => 'products',
                        'posts_per_page'    => 15
                    ];
                    $products_query = new WP_Query( $products_args );
                    ?>
                    <h2><?php _e( 'لیست محصولات', 'ppttheme' ) ?></h2>
                    <div class="hr-separator"></div>
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-9">
                            <?php
                            if ( $products_query->have_posts() ):
                                $i = 1;
                                while ( $products_query->have_posts() ): $products_query->the_post();
                                    if ( $i % 3 == 1 ) : echo '<div class="row">'; endif;
                                    ?>
                                    <div class="col-md-4">
                                        <?php
                                        get_template_part( 'views/content/content', get_post_type() );
                                        ?>
                                    </div><!-- .col-md-4 -->
                                <?php
                                    if ( $i % 3 == 0 ) : echo '</div><!-- .row -->'; endif;
                                    $i++;
                                endwhile;
                            endif;
                            ?>
                        </div> <!-- .col-md-9 -->
                    </div><!-- .row -->
                </div><!-- .ppt-products -->

            </div><!-- .container -->
        </main><!-- .site-main -->
    </section><!-- .content-area -->
<?php
get_footer();