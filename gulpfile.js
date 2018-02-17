var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync');
var rename = require('gulp-rename');
var replace = require('gulp-replace');
var imageResize = require('gulp-image-resize');

// Paths
var paths = {
  styles: {
    src: ['fonts/**/*.scss', 'scss/**/*.scss'],
    dest: 'css'
  },
  scripts: {
    src: [
      'node_modules/jquery/dist/jquery.js',
      'node_modules/bootstrap/dist/js/bootstrap.js',
      'scripts/**/*.js'
    ],
    dest: 'js'
  },
  images: {
    src: 'img/**/*.*',
    dest: 'img/'
  },
  thumbnails: {
    src: 'img/facilities/*.jpg',
    dest: 'img/facilities/thumbnails'
  },
  views: {
    src: ['*.php', 'inc/**/*.php']
  }
};

// SASS task
var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};
var autoprefixerOptions = {
  browsers: ['last 2 versions', '> 5%', 'Firefox ESR'],
  cascade: false
};
gulp.task('styles', function () {
  return gulp
    .src(paths.styles.src)
    // .pipe(sourcemaps.init())
    .pipe(sass(sassOptions).on('error', sass.logError))
    // .pipe(autoprefixer(autoprefixerOptions))
    // .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.styles.dest));
});
gulp.task('styles-prod', function () {
  return gulp
    .src(paths.styles.srcProcess)
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(gulp.dest(paths.styles.dest));
});

// Compile JavaScript
gulp.task('scripts', function() {
  return gulp
    .src(paths.scripts.src)
    .pipe(sourcemaps.init())
    .pipe(concat('site.js'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.scripts.dest));
});
gulp.task('scripts-prod', function() {
  return gulp
    .src(paths.scripts.src)
    .pipe(concat('site.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.scripts.dest));
});

// Thumbnails task
gulp.task('thumbnails', function() {
  return gulp
    .src(paths.thumbnails.src)
    .pipe(imageResize({
        width: 640,
        height: 640,
        crop: false,
        upscale: false
    }))
//  .pipe(rename(function (path) { path.basename += "-thumbnail"; }))
    .pipe(gulp.dest(paths.thumbnails.dest));
});

// Cache Task
// gulp.task('cache', function() {
//     var stamp = (new Date()).getTime().toString();
//     gulp.src('./*.php')
//         .pipe(replace(/(t=\d{13,})/g, 't=' + stamp)) // http://www.cheatography.com/davechild/cheat-sheets/regular-expressions/ https://regex101.com/#javascript
//         .pipe(gulp.dest('./'));
// });

// Watch taks
gulp.task('watch', function () {
  // browserSync({
  //   proxy: 'http://localhost:8888/selimlab/',
  //   files: [
  //     paths.styles.dest + '/**/*.css',
  //     paths.scripts.dest + '/**/*.js',
  //     paths.thumbnails.dest + '/**/*.*',
  //     paths.views.dest + '/*.ejs'
  //   ]
  // });
  gulp.watch(paths.styles.src, ['styles' /* , 'cache' */])
    .on('change', function(event) {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
  gulp.watch(paths.scripts.src, ['scripts' /* , 'cache' */])
    .on('change', function(event) {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
  gulp.watch(paths.thumbnails.src, ['thumbnails'])
    .on('change', function(event) {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
});

// Production tast
gulp.task('prod', ['styles-prod', 'scripts-prod', 'thumbnails']);

// Default task (calls other tasks)
gulp.task('default', ['scripts', 'styles', 'watch', 'thumbnails' /* , 'cache' */]);
