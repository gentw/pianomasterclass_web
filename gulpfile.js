var gulp = require('gulp');
var sass = require('gulp-sass');
var webpack = require('webpack-stream');
var watch = require('gulp-watch');
var batch = require('gulp-batch');
var copy = require('gulp-copy');
var concat = require('gulp-concat');
var minifyCSS = require('gulp-minify-css');
var uglify = require('gulp-uglify');

// CONNECT SCRIPTS
var php = require('gulp-connect-php');
var bs = require('browser-sync').create();

gulp.task('php', function() {
    php.server({ base: './public', port: 8006, keepalive: true});
});

gulp.task('browser-sync', ['adminScss', 'php', 'webpack', 'build.index', 'watchSrc', 'image', 'fonts'], function() {
     bs.init({
        host: 'localhost',
        proxy: '127.0.0.1:8005',
        port: 3000,
        open: true,
        notify: false
    });
});

// Run webpack
gulp.task('webpack', function(){
  return gulp.src(['./resources/admin/main.admin.js'])
    .pipe(webpack( require('./webpack.config.js') ))
    .pipe(uglify())
    .pipe(gulp.dest('public/js/'))
    .pipe(bs.reload({stream: true}));
});

gulp.task('minifyJs', function () {
  return gulp.src(['./public/js/*.js'])
        .pipe(uglify())

});


gulp.task('watchSrc', function () {
  return gulp.src(["./resources/admin/components/**/*.vue"])
        .pipe(bs.reload({stream: true}));
});

// =============== ADMIN ==============

  gulp.task('adminScss', function () {
      return gulp.src('./resources/admin/scss/admin.scss')
            .pipe(sass())
            .pipe(minifyCSS())
            .pipe(concat('admin.min.css'))
            .pipe(gulp.dest('public/css'))
            .pipe(bs.reload({stream: true}));
  });


// =====================================


// Copy index.html file
gulp.task('build.index', function(){
  return gulp.src(['./resources/views/index.blade.php', './resources/views/admin/dashboard.blade.php']);
});

gulp.task('image', function () {
  gulp.src('./resources/img/*')
    .pipe(gulp.dest('./public/img'));
});

gulp.task('fonts', function () {
  gulp.src('./resources/fonts/*')
    .pipe(gulp.dest('./public/fonts'));
});

// LIBRARIES

gulp.task('cssPlugins', function () {
  return gulp.src([
      'bower_components/font-awesome/css/font-awesome.min.css',
      'bower_components/toastr/toastr.min.css',
      'bower_components/sweetalert/dist/sweetalert.css',
      'bower_components/wow/css/libs/animate.css',
      'bower_components/swiper/dist/css/swiper.min.css',
      'bower_components/jssocials/dist/jssocials.css',
      'bower_components/jssocials/dist/jssocials-theme-flat.css',
      'resources/app/css/tether.min.js',
      
      // 'bower_components/aos/dist/aos.css',
      'bower_components/owl.carousel/dist/assets/owl.carousel.min.css',
      'bower_components/owl.carousel/dist/assets/owl.theme.default.min.css',
      'bower_components/simplelightbox/dist/simplelightbox.min.css',

    ])
  // .pipe(minifyCSS())
  .pipe(concat('build.min.css'))
  .pipe(gulp.dest('public/css'));
});

gulp.task('jsPlugins', function () {
    return gulp.src([
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/gsap/src/minified/jquery.gsap.min.js',
        'bower_components/gsap/src/minified/TweenMax.min.js',
        'bower_components/gsap/src/minified/TimelineLite.min.js',
        'bower_components/toastr/toastr.min.js',
        'bower_components/sweetalert/dist/sweetalert.min.js',
        'bower_components/wow/dist/wow.min.js',
        'bower_components/rellax/rellax.min.js',
        'bower_components/swiper/dist/js/swiper.min.js',
        'bower_components/owl.carousel/dist/owl.carousel.min.js',
        'bower_components/simplelightbox/dist/simple-lightbox.js',
        'resources/scripts/*.js',
        'resources/app/js/tether.min.js',
        'resources/app/js/now-ui-kit.js',
        'resources/app/js/parallax.js',
        'resources/app/js/swiper.min.js',
        

      ])
    .pipe(concat('base.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('public/js'))
});



gulp.task('watch', ['browser-sync'], function () {
    gulp.watch(['./resources/admin/main.admin.js'], ['webpack']);
    
    gulp.watch("./resources/admin/scss/**/*.scss", ['adminScss']);
    gulp.watch(["./resources/views/index.blade.php", "./resources/views/admin/dashboard.blade.php","./resources/admin/components/**/*.vue", "./resources/admin/components/**/*.html",  "./resources/admin/components/templates/*.html"], ['build.index', 'webpack']).on('change', bs.reload);
});

// BUILD SCRIPTS
gulp.task('build', ['jsPlugins', 'cssPlugins', 'image', 'fonts'], function () {
  console.log("***************");
  console.log("All scripts builded");
  console.log("***************");
});


// Default task
// gulp.task('default', ['webpack', 'build.index', 'wsass']);
