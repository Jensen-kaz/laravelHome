var gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');


var srs = {
    sass: 'resources/sass/*.scss',
    build: {
        js: {
            path: 'public/js/',
            index: 'app.min.js'
        },
        css: {
            path: 'public/css/',
        },
    },
    js: {
        scripts: [
            'resources/js/*.js',
        ]
    },
};

gulp.task('sass', function(){
    return gulp.src(srs.sass)
        .pipe(sass())
        .pipe(gulp.dest(srs.build.css.path))
});

gulp.task('js:scripts', function(){
    return gulp.src(srs.js.scripts)
        .pipe(concat(srs.build.js.index))
        .pipe(uglify())
        .pipe(gulp.dest(srs.build.js.path));
});
