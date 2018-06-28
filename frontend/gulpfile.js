const gulp = require('gulp');
const sass = require('gulp-sass');
const pug = require('pug');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const gutil = require('gulp-util');

gulp.task('sass', function () {
    return
    gulp.src('(./src/scss/**/*.scss')
        .pipe(sass({
            style: 'expanded',
            sourceComments: 'map',
            errLogToConsole: true
        }))
        .pipe(autoprefixer('last 2 version', "> 1%", 'ie 8', 'ie 9'))
        .pipe(gulp.dest('./dist/css'))
        .on('error', gutil.log)
        .pipe(browserSync.stream());
});

gulp.task('pug', function () {
    return
    gulp.src('.src/pug/**/*.pug')
        .pipe(pug())
        .pipe(gulp.dest('./dist/html'))
        .on('error', gutil.log)
        .pipe(browserSync.stream())
});

gulp.task('serve', ['sass', 'pug'], function () {
    browserSync.init({
        server: './dist'
    });
    gulp.watch('./src/scss/**/*.css', ['sass']);
    gulp.watch('./src/pug/**/*.pug', ['pug']);
    gulp.watch('./dist/html/**/*.html').on('change', browserSync.reload);
});

gulp.task('build', ['sass', 'pug'], function () {
    console.log('building');
})