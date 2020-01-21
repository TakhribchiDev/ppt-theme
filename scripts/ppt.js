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

$( document ).ready( function () {
    $( '.single_add_to_cart_button' ).prepend( '<i class="ppt-icon ppt-cart-add"></i>' );
    $( '.ppt-price' ).prepend( '<span class="label"><i class="ppt-icon ppt-coins"></i>' + 'قیمت:' + '</span>' );
    $( '.product_meta .posted_in' ).prepend( '<i class="ppt-icon ppt-category"></i>' );
    $( '.product_meta .tagged_as' ).prepend( '<i class="ppt-icon ppt-tags"></i>' );
} );

// Tabs related functionality
$( document ).ready( function() {
    let tabsContainer = $( '.ppt-tabs' );
    let tabs = tabsContainer.find( '.ppt-tab' );

    tabs.on( 'click', function( element ) {
        $( '.ppt-tab' ).removeClass( 'active' );
        $( '.ppt-tab-content' ).removeClass( 'active' );

        $( this ).addClass( 'active' );

        let tabID = $( this ).data( 'tab' );
        $( tabID ).addClass( 'active' );
    } );
} );

// Steps related functionality
$( document ).ready( function() {
    let stepsbar = $( '.ppt-stepsbar' );
    let stepsContainer = $( '.ppt-steps' );
    let buttons = stepsContainer.find( '.step-btn' );

    buttons.on( 'click', function( event ) {
        event.preventDefault();

        stepsbar.find( '.step-' + $( this ).data( 'current' ) ).removeClass( 'active' );
        stepsContainer.find( '.step-content-' + $( this ).data( 'current' ) ).removeClass( 'active' );

        stepsbar.find( '.step-' + $( this ).data( 'step' ) ).addClass( 'active' );
        stepsContainer.find( '.step-content-' + $( this ).data( 'step' ) ).addClass( 'active' );
    } );
} );

// Enable popovers
$(function () {
    $('[data-toggle="popover"]').popover()
});
