// bower install
// sudo npm install gulp gulp-uglify gulp-rename gulp-less gulp-concat gulp-plumber gulp-cache-bust gulp-replace --save-dev

// Required

var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    less = require('gulp-less'),
    concat = require('gulp-concat'),
    plumber = require('gulp-plumber'),
    replace = require('gulp-replace'),
    imageResize = require('gulp-image-resize');

// Scripts Task

gulp.task('scripts', function() {
    gulp.src(['./bower_components/jquery/dist/jquery.js',
            './bower_components/bootstrap/dist/js/bootstrap.js',
            './bower_components/salvattore/dist/salvattore.js',
            './bower_components/chocolat/dist/js/jquery.chocolat.js',
            './js/jquery-easing-effects.js',
            './js/main.js'
        ])
        .pipe(plumber()) // prevents breaking and has to go first here
        .pipe(concat('selimlab.js'))
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./js/'));
});

// LESS Task

gulp.task('styles', function() {
    gulp.src('./css/less/selimlab.less')
        .pipe(plumber()) // prevents breaking
        .pipe(less())
        .pipe(gulp.dest('css/'));
});

// Cache Task

gulp.task('cache', function() {
    var stamp = (new Date()).getTime().toString();
    gulp.src('./*.php')
        .pipe(replace(/(t=\d{13,})/g, 't=' + stamp)) // http://www.cheatography.com/davechild/cheat-sheets/regular-expressions/ https://regex101.com/#javascript
        .pipe(gulp.dest('./'));
});

// Thumbnails Task
gulp.task('thumbs', function() {
    gulp.src('./img/facilities/*.jpg')
        .pipe(imageResize({
            width: 640,
            height: 640,
            crop: false,
            upscale: false
        }))
//        .pipe(rename(function (path) { path.basename += "-thumbnail"; }))
        .pipe(gulp.dest('./img/facilities/thumbnails/'));
});

// Watch task (primarily for LESS)

gulp.task('watch', function() {
    gulp.watch('./js/main.js', ['scripts', 'cache']);
    gulp.watch('./css/less/*.less', ['styles', 'cache']);
    gulp.watch('./img/facilities/*.jpg', ['thumbs']);
});

// Default task (calls other tasks)

gulp.task('default', ['scripts', 'styles', 'watch', 'cache', 'thumbs']);
