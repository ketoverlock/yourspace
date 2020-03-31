var gulp = require('gulp');
var scss = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

gulp.task('scss', function() {
    return gulp
        .src('./scss/main.scss')
        .pipe(scss({outputStyle: 'compressed'}))
        .pipe(autoprefixer({browserlist: ['> 0.5%', 'last 2 versions', 'maintained node versions', 'not dead']}))
        .pipe(gulp.dest(''));
});

gulp.task('js-compress', function() {
    return gulp
        .src('./js/*.js')
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./js/min/'));
});

gulp.task('watch', function() {
    gulp.watch('./scss/**/*.scss', ['scss']);
    gulp.watch('./js/*.js', ['js-compress']);
});

gulp.task('default', ['scss', 'js-compress', 'watch']);