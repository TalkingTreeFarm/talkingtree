/************************************************
 * gulp.task('NAME_OF_TASK', function() {       *
 *     return gulp.src(['PATH_TO_SOURCE_FILE']) *
 *     .pipe(**INSERT_TASK**)                   *
 *     .pipe(gulp.dest('PATH_TO_DESTINATION')); *
 * });                                          *
 ************************************************/

// Require dependencies
var gulp    = require('gulp');
var $       = require('gulp-load-plugins')();
var bs      = require('browser-sync').create();
var beep    = require('beepbeep');
var onError = function(err) {
    $.notify.onError({
        title:   "Gulp error in " + err.plugin,
        message: err.toString()
    })(err);
    beep(3);    // Comment out if you don't have 'beepbeep' installed
    this.emit('end');
};

// Launch Browsersync Server
gulp.task('browser-sync', ['sass'], function() {
    bs.init({
        proxy: "talkingtree.dev",   // Root of your local directory
    });
});

// Compile SASS to CSS using gulp-sass
gulp.task('sass', function() {
    return gulp.src('./public/assets/css/main.sass')
    .pipe($.plumber({
        errorHandler: onError
    }))
    .pipe($.sass({
        style: "expanded",
        onError: bs.notify()
    }))
    .pipe($.autoprefixer(['last 15 versions', '> 5%', 'ie 8'], {
        cascade: true
    }))
    .pipe(gulp.dest('./public/assets/css/'))
    .pipe(bs.reload({
        stream: true
    }));
});

// Watch for changes to Views
gulp.task('views', function() {
    return gulp.src('./app/views/**/*.php')
    .pipe(bs.reload({
        stream: true
    }));
});

// Watch for changes in files and rerun gulp
gulp.task('watch', function() {
    gulp.watch(['./public/assets/css/**/*.sass'], ['sass']);
    gulp.watch(['./app/views/**/*.php'], ['views']);
});

/*******************************
 * Run with `gulp` in terminal *
 *                             *
 * Runs Browsersync            *
 * Watches files               *
 *******************************/
gulp.task('default', ['browser-sync', 'watch']);
