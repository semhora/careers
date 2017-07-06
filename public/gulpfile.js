var gulp      = require('gulp'),
    plumber   = require('gulp-plumber'),
    rename    = require('gulp-rename');

var concat    = require('gulp-concat');
var uglify    = require('gulp-uglify');

var imagemin  = require('gulp-imagemin'),
    cache     = require('gulp-cache');

var minifycss = require('gulp-minify-css');
var sass      = require('gulp-sass');
var bower     = require('gulp-bower');

var merge2    = require('merge2');
var bowerMain = require('bower-main');

gulp.task('vendorScriptsProduction', ['bower'], function() {

    var bowerMainJavaScriptFiles = bowerMain('js','min.js');

    return merge2(
        gulp.src(bowerMainJavaScriptFiles.minified),
        gulp.src(bowerMainJavaScriptFiles.minifiedNotFound)
            .pipe(concat('tmp.min.js'))
            .pipe(uglify())
    )
    .pipe(concat('bower-scripts.min.js'))
    .pipe(gulp.dest('assets'))
});

gulp.task('images', function(){
    gulp.src('assets/images/**/*')
        .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
        .pipe(gulp.dest('assets/images/'));
});

gulp.task('bower', function() {
    return bower()
            .pipe(gulp.dest('bower_components'));
});

gulp.task('styles', ['bower'],function(){
    return gulp.src(['assets/sass/**/*.scss'])
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }
        }))
    .pipe(sass())
    .pipe(minifycss())
    .pipe(concat('style.css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('assets'))
});

gulp.task('scripts', function(){
  return gulp.src('assets/scripts/**/*.js')
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(uglify())
    .pipe(concat('script.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('assets'))
});

gulp.task('default', ['bower', 'vendorScriptsProduction', 'styles', 'scripts'], function(){
    gulp.watch("assets/sass/**/*.scss", ['styles']);
    gulp.watch("assets/scripts/**/*.js", ['scripts']);
});