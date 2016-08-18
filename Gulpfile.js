var gulp = require('gulp'),
	gutil = require('gulp-util'),
	sass = require('gulp-ruby-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	minifycss = require('gulp-minify-css'),
	concat = require('gulp-concat'),
	jshint = require('gulp-jshint'),
	uglify = require('gulp-uglifyjs'),
	sourcemaps = require('gulp-sourcemaps');

// express server

gulp.task('express', function() {
	var express = require('express');
	var app = express();
	app.use(express.static(__dirname));
	app.listen(4000);
});

// gulp watch

gulp.task('watch', function() {
	gulp.watch(['wp-content/themes/jumpstart/sass/**', 'wp-content/themes/jumpstart/js/main.js'], ['styles', 'jshint', 'scripts']);
});

// register default tasks

gulp.task('default', ['express', 'watch', 'jshint', 'scripts', 'styles'], function() {

});

// sass stuff

gulp.task('styles', function() {
	return sass('wp-content/themes/jumpstart/sass', { style: 'compressed' })
	.pipe(gulp.dest('wp-content/themes/jumpstart/dist/css'))
	.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
	.pipe(minifycss())
	.pipe(gulp.dest('wp-content/themes/jumpstart/dist/css'))
});

// javascript

gulp.task('jshint', function() {
  return gulp.src('wp-content/themes/jumpstart/dist/js/main.js')
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('scripts', function() {
  return gulp.src(['bower_components/fastclick/lib/fastclick.js',
  					'bower_components/jquery/dist/jquery.min.js',
  					'bower_components/classie/classie.js',
  					'wp-content/themes/looklisten/js/selectfx.js',
  					'wp-content/themes/looklisten/js/main.js',
  					'bower_components/modernizr/modernizr.js'
  					])
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('wp-content/themes/jumpstart/dist/js/'));
});
