'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var browserSync = require('browser-sync').create();

gulp.task('serve', ['sass', 'scripts'], function () {

    browserSync.init({
        proxy: 'reversebid.dev'
    });

    gulp.watch('./src/views/styles/sass/**/*.scss', ['sass']);
    gulp.watch('./src/views/scripts/*.js', ['scripts']);
    gulp.watch('./src/**/*.php').on('change', browserSync.reload);
    gulp.watch('./src/**/**/*.php').on('change', browserSync.reload);
});

gulp.task('sass', function () {
    return gulp.src('./src/views/styles/sass/app.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./public/assets/styles'))
        .pipe(browserSync.stream());
});

gulp.task('sass:materialize', function () {
    return gulp.src('./src/views/styles/materialize/materialize.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./public/assets/vendor/bootstrap/css'))
        .pipe(browserSync.stream());
});

gulp.task('scripts', function () {
    return gulp.src('./src/views/scripts/*.js')
        .pipe(concat('main.js', {newLine: '\n\n'}))
        .pipe(gulp.dest('./public/assets/scripts/'))
        .pipe(browserSync.stream());
});
