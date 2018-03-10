var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat');

var imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache');

var sass = require('gulp-sass'),
    cssmin = require('gulp-cssmin');

var uglify = require('gulp-uglify');
var browserSync = require('browser-sync');

var themedir = 'resources/assets';

var files = [
    themedir+'/sass/**/*.scss',
    themedir+'/js/*.js',
    themedir+'/img/**/*',
    'resources/views/**/*.blade.php'
];

gulp.task('browser-sync', function () {
	browserSync.init(files, {
		proxy: "localhost/misservices",
		notify: false
	});
});

gulp.task('bs-reload', function () {
	browserSync.reload();
});

gulp.task('images', () => {
    gulp.src(themedir+'/img/**/*')
    .pipe(cache( imagemin( { optimizationLevel: 3, progressive: true, intercaled: true } ) ))
    .pipe(gulp.dest( 'public/img' ));
});

gulp.task('styles', function () {
	gulp.src([
        themedir+'/vendor/css/bootstrap.min.css',
		themedir+'/sass/main.scss'
	])
		.pipe(plumber({
			errorHandler: function (error) {
				console.log(error.message);
				this.emit('end');
			}
		}))
		.pipe(sass())
		.pipe(concat(rename('main.css')))
		.pipe(cssmin())
		.pipe(gulp.dest('public/css'))
        .pipe(browserSync.reload({ stream: true }));
});

gulp.task('default',['browser-sync'], function () {
	gulp.watch(themedir+"/sass/**/*.scss", ['styles']);
	//gulp.watch(themedir+'/assets/dev/js/*.js', ['scripts']);
	gulp.watch(files, ['bs-reload', 'images']);
});