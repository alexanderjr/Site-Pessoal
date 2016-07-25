var gulp = require('gulp'),
    imagemin = require('gulp-imagemin'),
    htmlmin = require('gulp-html-minifier'),
    clean    = require('gulp-clean'),
    concat    = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    notify = require('gulp-notify'),
    cleanCSS = require('gulp-clean-css'),
    inlinesource  = require('gulp-inline-source');

gulp.task('default',['clean'], function(){
   var config = {optimizationLevel: 5, progressive: true, interlaced: true};
   //images
   gulp.src('src/img/**/*').pipe(imagemin(config)).pipe(gulp.dest('dist/img'));
   //css
   gulp.src("src/css/*.css").pipe(cleanCSS()).pipe(concat('style.css')).pipe(gulp.dest('dist/css'));
   //fonts
   gulp.src("src/fonts/**/*").pipe(gulp.dest("dist/fonts/"));
   //php
   gulp.src('src/php/**/*')
   .pipe(gulp.dest('dist/php/'));
   //index.php and js
   gulp.src('src/index.php')
    .pipe(inlinesource())
   	.pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('dist/'))
    .pipe(notify("Finalizado"));
});

gulp.task('clean', function(){
	var stream = gulp.src('dist').pipe(clean());
	return stream;
});
