<?php
/**
 * PPT Theme general page
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
                    ],
                    [
                        'image' => 'presentation',
                        'caption' => 'بهترین ارائه ها را با ما تجربه کنید'
                    ],
                    [
                        'image' => 'projector',
                        'caption' => 'ارائه های متفاوت و خلاقانه با پرده نگار'
                    ],
                    [
                        'image' => 'screens',
                        'caption' => 'قالب ها و ابزارهای حرفه ای طراحی پاورپوینت'
                    ]
                ];
                ?>

                <div id="homepageSlider" class="ppt-homepage-slider ppt-slider carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php for ( $j = 0; $j < sizeof( $slides ); $j++ ) : ?>
                            <li data-target="#homepageSlider" data-slide-to="<?php echo $j ?>" class="<?php echo ( $j == 0 ? 'active' : '' ); ?>"></li>
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

                    <a href="#homepageSlider" class="carousel-control-prev" role="button" data-slide="prev">
                        <i class="ppt-icon ppt-chevron-left-thin"></i>
                        <span class="sr-only">قبلی</span>
                    </a>

                    <a href="#homepageSlider" class="carousel-control-next" role="button" data-slide="next">
                        <i class="ppt-icon ppt-chevron-right-thin"></i>
                        <span class="sr-only">بعدی</span>
                    </a>

                </div><!-- #homepageSlider -->

                <div class="ppt-icon-box">
                    <div class="icon-box-item">
                        <i class="ppt-icon ppt-cloud-download"></i>
                        <div class="number">1000+</div>
                        <div class="title">دانلود در روز</div>
                    </div><!-- .icon-box-item -->
                    <div class="icon-box-item">
                        <i class="ppt-icon ppt-toolset"></i>
                        <div class="number">1000+</div>
                        <div class="title">ابزار طراحی</div>
                    </div><!-- .icon-box-item -->
                    <div class="icon-box-item">
                        <i class="ppt-icon ppt-roller-brush"></i>
                        <div class="number">1000+</div>
                        <div class="title">قالب پاورپوینت</div>
                    </div><!-- .icon-box-item -->
                </div><!-- .ppt-icon-box -->

                <div class="ppt-special-offers">
                    <?php
                    $offers = [
                        [
                            'image' => 'product-1',
                            'title' => 'اسلاید گذر چهار رنگ'
                        ],
                        [
                            'image' => 'product-2',
                            'title' => 'قالب کارنمای گرادیانت'
                        ],
                        [
                            'image' => 'product-3',
                            'title' => 'اسلایدگذر ضحی'
                        ],
                        [
                            'image' => 'product-4',
                            'title' => 'قالب مراسم یار رضوان'
                        ],
                    ]
                    ?>

                    <div id="specialOffersSlider" class="ppt-slider carousel slide carousel-fade row" data-ride="carousel">
                        <ol class="carousel-indicators col-md-4">
                            <?php for ( $j = 0; $j < sizeof( $offers ); $j++ ) : ?>
                                <li data-target="#specialOffersSlider" data-slide-to="<?php echo $j ?>" class="<?php echo ( $j == 0 ? 'active' : '' ); ?>"><span class="title"><?php _e( $offers[$j]['title'], 'ppttheme' ); ?></span></li>
                            <?php endfor; ?>
                        </ol>
                        <div class="carousel-inner col-md-8">

                            <div class="carousel-title">
                                <i class="ppt-icon ppt-percent"></i>
                                <span class="text"><?php _e( 'پیشنهاد ویژه', 'ppttheme' ); ?></span>
                            </div>

                            <?php $i = 0; foreach ( $offers as $offer ) : ?>
                                <div class="carousel-item <?php echo ( $i == 0 ? 'active' : '' ); ?>">
                                    <a href="#" target="_blank" class="d-block w-100 carousel-slide background-image" style="background-image: url('<?php echo get_template_directory_uri() . '/img/products/' . $offer['image'] . '.png'; ?>')"></a>
                                </div><!-- .carousel-item -->
                                <?php $i++; endforeach; ?>

                        </div><!-- .carousel-inner -->

                    </div><!-- #specialOffersSlider -->

                </div><!-- .ppt-special-offers-->

                <div class="ppt-popular-products">
                    <?php
                    $popular_prod_args = [
                        'post_type'         => 'product',
                        'product_cat'       => 'products',
                        'posts_per_page'    => 15
                    ];
                    $popular_prod_query = new WP_Query( $popular_prod_args );
                    ?>
                    <h2><?php _e( 'محبوب ترین محصولات', 'ppttheme' ) ?></h2>
                    <div class="hr-separator"></div>
                    <div id="popularProductsScrollider" class="ppt-scrollider">
                        <div class="scrollide scrollide-right"><i class="ppt-icon ppt-chevron-right-thin"></i></div>
                        <div class="scrollide scrollide-left"><i class="ppt-icon ppt-chevron-left-thin"></i></div>
                        <div class="scrollide-box">
                                <?php
                                if ( $popular_prod_query->have_posts() ):
                                    while ( $popular_prod_query->have_posts() ): $popular_prod_query->the_post();
                                        ?>
                                        <div class="scrollide-item">
                                            <?php
                                            get_template_part( 'views/content/content', get_post_type() );
                                            ?>
                                        </div><!-- .scrollide-item -->
                                    <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                        </div><!-- .scrollide-box -->
                    </div><!-- .ppt-scrollider -->
                </div><!-- .ppt-popular-products -->

                <div class="ppt-popular-tools">
                    <?php
                    $popular_tool_args = [
                        'post_type'         => 'product',
                        'product_cat'       => 'products',
                        'posts_per_page'    => 8
                    ];
                    $popular_tool_query = new WP_Query( $popular_tool_args );
                    ?>
                    <h2><?php _e( 'پرکاربردترین ابزارها', 'ppttheme' ) ?></h2>
                    <div class="hr-separator"></div>
                    <div id="popularToolsScrollider" class="ppt-scrollider">
                        <div class="scrollide scrollide-right"><i class="ppt-icon ppt-chevron-right-thin"></i></div>
                        <div class="scrollide scrollide-left"><i class="ppt-icon ppt-chevron-left-thin"></i></div>
                        <div class="scrollide-box">
                            <?php
                            if ( $popular_tool_query->have_posts() ):
                                while ( $popular_tool_query->have_posts() ): $popular_tool_query->the_post();
                                    ?>
                                    <div class="scrollide-item">
                                        <?php
                                        get_template_part( 'views/content/content', get_post_type() );
                                        ?>
                                    </div><!-- .scrollide-item -->
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div><!-- .scrollide-box -->
                    </div><!-- .ppt-scrollider -->
                </div><!-- .ppt-popular-tools -->

                <div class="ppt-last-posts">
                        <h2><?php _e( 'آخرین پست های بلاگ', 'ppttheme' ) ?></h2>
                        <div class="hr-separator"></div>
                        <div id="lastPostsScrollider" class="ppt-scrollider">
                            <div class="scrollide scrollide-right"><i class="ppt-icon ppt-chevron-right-thin"></i></div>
                            <div class="scrollide scrollide-left"><i class="ppt-icon ppt-chevron-left-thin"></i></div>
                            <div class="scrollide-box">
                                <?php
                                if ( have_posts() ):
                                    while ( have_posts() ): the_post();
                                        ?>
                                        <div class="scrollide-item">
                                            <?php
                                            get_template_part( 'views/content/content', get_post_type() );
                                            ?>
                                        </div><!-- .scrollide-item -->
                                    <?php
                                    endwhile;
                                endif;
                                ?>
                            </div><!-- .scrollide-box -->
                        </div><!-- .ppt-scrollider -->
                </div><!-- .ppt-last-posts-->

            </div><!-- .container -->
        </main><!-- .site-main -->
    </section><!-- .content-area -->
<?php
get_footer();