jQuery( document ).ready( function ( $ ) {
    maybeFixedHeader();
    $( window ).on( 'scroll', function() {
        maybeFixedHeader();
    } );
} );

function maybeFixedHeader() {
    let header = $( document ).find( '.header-container' );
    let offsetTop = header.offset().top;

    if ( offsetTop > 0 ) {
        header.addClass( 'header-fixed' );
    } else {
        header.removeClass( 'header-fixed' );
    }
}

$( '.ppt-product-preview-slider' ).on( 'slide.bs.carousel', function() {
    $( '.tiny-timer' ).addClass( 'countdown' );
} );
