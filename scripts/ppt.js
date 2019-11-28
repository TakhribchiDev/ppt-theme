jQuery( document ).ready( function ($) {
    $( window ).scroll( 'scroll', function () {
        let header = $( document ).find( '.header-container' );
        let scrollTop = $( window ).scrollTop();

        if ( scrollTop > 0 ) {
            header.addClass( 'header-fixed' );
        } else {
            header.removeClass( 'header-fixed' );
        }
    } );
} );