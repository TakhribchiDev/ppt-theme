class Scrollider {
    constructor() {
        this.init();
    }

    init() {
        let that = this; // Just because this does'nt work in jQuery methods
        $( '.ppt-scrollider' ).ready( function() {
            let scrolliders = $( '.ppt-scrollider' );
            $.each(scrolliders, function (index, scrollider) {
                that.scrolliderSetup(scrollider.id);
            });
        } );
    }

    scrolliderSetup( id ) {
        let scrollider = $( document ).find( '#' + id );
        let scrollideBox = scrollider.find( '.scrollide-box' );

        this.showScrollides( scrollider );
        let that = this; // Just because this does'nt work in jQuery "on" method
        scrollideBox.on( 'scroll', function() {
            that.showScrollides( scrollider );
        } );

        this.scrollideOnClick( scrollider );
    }


    showScrollides( scrollider ) {
        let scrollideMargin = 50;

        let leftScrollide = scrollider.find( '.scrollide-left' );
        let rightScrollide = scrollider.find( '.scrollide-right' );

        let scrollideBox = scrollider.find( '.scrollide-box' );
        let scrollPos = this.getScrollPos( scrollideBox );
        let hiddenContentWidth = this.getHiddenWidth( scrollider );

        console.log( scrollPos );
        console.log( hiddenContentWidth );

        if ( scrollPos <= scrollideMargin ) {
            leftScrollide.removeClass( 'hidden' );
            rightScrollide.addClass( 'hidden' );
        } else if ( scrollPos < ( hiddenContentWidth - scrollideMargin ) ) {
            leftScrollide.removeClass( 'hidden' );
            rightScrollide.removeClass( 'hidden' );
        } else {
            leftScrollide.addClass( 'hidden' );
            rightScrollide.removeClass( 'hidden' );
        }
    }

    scrollideOnClick( scrollider ) {
        let leftScrollide = scrollider.find( '.scrollide-left' );
        let rightScrollide = scrollider.find( '.scrollide-right' );

        let scrollideBox = scrollider.find( '.scrollide-box' );
        let hiddenContentWidth = this.getHiddenWidth( scrollider );

        let lastScrollPos = this.getScrollPos( scrollideBox );
        let itemWidth = this.getWidth( scrollideBox.find( '.scrollide-item' ) );

        leftScrollide.on( 'click', function() {
            let nextScrollPos = lastScrollPos - 4 * itemWidth;
            nextScrollPos = nextScrollPos > -hiddenContentWidth ? nextScrollPos : -hiddenContentWidth;

            scrollider.find( '.scrollide-box' ).animate( { scrollLeft: nextScrollPos }, 320 );

            lastScrollPos = nextScrollPos;
        } );

        rightScrollide.on( 'click', function() {
            let nextScrollPos = lastScrollPos + 4 * itemWidth;
            nextScrollPos = nextScrollPos < 0 ? nextScrollPos : 0;

            scrollider.find( '.scrollide-box' ).animate( { scrollLeft: nextScrollPos }, 320 );

            lastScrollPos = nextScrollPos;
        } );
    }

    getScrollPos ( element ) {
        return Math.abs( element.scrollLeft() );
    }

    getWidth( element ) {
        return element.outerWidth();
    }

    getContentWidth( scrollider ) {
        let scrollideBox = scrollider.find( '.scrollide-box' );
        let itemsLength = scrollideBox.find( '.scrollide-item' ).length;
        let itemWidth = this.getWidth( scrollideBox.find( '.scrollide-item' ) );

        return itemsLength * itemWidth;
    }

    getHiddenWidth( scrollider ) {
        let scrollideBox = scrollider.find( '.scrollide-box' );

        return this.getContentWidth( scrollider ) - this.getWidth( scrollideBox );
    }
}

export default Scrollider;