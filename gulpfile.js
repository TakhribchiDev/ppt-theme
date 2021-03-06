// Load Gulp
const { src, dest, task, watch, series, parallel } = require( 'gulp' );

// CSS related plugins
let autoprefixer    = require( 'gulp-autoprefixer' );
let sass            = require( 'gulp-sass' );

// JS related plugins
let babelify        = require( 'babelify' );
let browserify      = require( 'browserify' );
let buffer          = require( 'vinyl-buffer' );
let source          = require( 'vinyl-source-stream' );
let uglify          = require( 'gulp-uglify' );

// Utility Plugins
let rename          = require( 'gulp-rename' );
let sourcemaps      = require( 'gulp-sourcemaps' );
let notify          = require( 'gulp-notify' );

// Browser related plugins
let browserSync     = require( 'browser-sync' );

// Project related variables
let styleSRC        = './sass/';
let styleURL        = './css/';
let styleFiles      = [ 'ppt.admin.scss', 'ppt.scss' ];
let mapURL          = './';

let jsSRC           = './scripts/';
let jsFiles         = [ 'ppt.admin.js', 'ppt.js', 'main.js' ];
let jsURL           = './js/';

let imageWatch      = './img/**/*.img';
let styleWatch      = './sass/**/*.scss';
let jsWatch         = './scripts/**/*.js';

let phpWatch        = ['./*.php', './**/*.php'];

// Task functions
function browser_sync() {
    browserSync.init({
        open: false,
        injectChanges: true,
        proxy: 'http://ppt.test/'
    });
}

function reload( done ) {
    browserSync.reload();
    done();
}

function css( done ) {
    styleFiles.map( function( file ) {
        return  src( styleSRC + file )
            .pipe( sourcemaps.init() )
            .pipe( sass({
                errorLogConsole: true,
                outputStyle: 'compressed'
            }) )
            .on( 'error', console.error.bind( console ) )
            .pipe( autoprefixer({
                cascade: false
            }) )
            .pipe( rename({
                suffix: '.min'
            }) )
            .pipe( sourcemaps.write( mapURL ) )
            .pipe( dest( styleURL ) )
            .pipe( browserSync.stream() );
    } );
    done();
}

function js(done) {
    jsFiles.map( function( entry ) {
        return browserify({
            entries: [jsSRC + entry]
        })
            .transform( babelify, { presets: [ '@babel/preset-env' ] } )
            .bundle()
            .pipe( source( entry ) )
            .pipe( rename( {
                extname: '.min.js'
            } ) )
            .pipe( buffer() )
            .pipe( sourcemaps.init({ loadMaps: true }) )
            .pipe( uglify() )
            .pipe( sourcemaps.write( '.' ) )
            .pipe( dest( jsURL ) );
    });
    done();
}

function watch_files() {
    watch( styleWatch, css );
    watch( jsWatch, series( js, reload ) );
    watch( imageWatch, reload );

    phpWatch.forEach( function( url ) {
        watch( url, reload);
    } );

    src( jsURL + 'main.min.js' )
        .pipe( notify({ message: 'Gulp is Watching, Happy Coding!' }) );
}

// Tasks
task( 'js', js );
task( 'css', css );
task( 'browser_sync', browser_sync );
task( 'default', parallel( css, js ) );
task( 'watch', parallel( browser_sync, watch_files ) );