'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

gulp.task('serve', ['sass'], function () {

    browserSync.init({
        proxy: 'reversebid.dev'
    });

    gulp.watch('./src/views/styles/sass/*.scss', ['sass']);
    gulp.watch('./src/views/partials/*.php').on('change', browserSync.reload);
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
