class ScrolliderProductThumbs {
    constructor() {
        this.init();
    }

    init() {
        // Adding Scrollider to product gallery thumbs
        $( document ).ready( function() {
            let gallery = $( '.ppt-single-product' ).find( '.woocommerce-product-gallery' );
            let thumbs = gallery.find( 'ol.flex-control-nav' );
            let thumbsItem = thumbs.find( 'li' );

            let rightScrollideHtml = '<div class="scrollide scrollide-right"><i class="ppt-icon ppt-chevron-right-circle"></i></div>';
            let leftScrollideHtml = '<div class="scrollide scrollide-left"><i class="ppt-icon ppt-chevron-left-circle"></i></div>';

            let scrolliderID = 'productThumbsScrollider';

            gallery.addClass( 'ppt-scrollider' );
            gallery.attr( 'id', scrolliderID );

            thumbs.addClass( 'scrollide-box' );
            thumbs.before( rightScrollideHtml, leftScrollideHtml );
            thumbsItem.addClass( 'scrollide-item' );
        } );
    }
}

export default ScrolliderProductThumbs;