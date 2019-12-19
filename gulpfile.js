var gulp = require('gulp'),
    concat = require('gulp-concat'),
    babel = require('gulp-babel'),
    uglify = require('gulp-uglify-es').default,
    uglifycss = require('gulp-uglifycss');


var srs = {
    sass: 'resources/sass/*.scss',
    build: {
        js: {
            path: 'public/js/',
            index: 'app.min.js',
        },
        css: {
            path: 'public/css/',
            index: 'app.min.css',
        },
    },
    js: {
        scripts: [
            'resources/js/main.js',
            'resources/js/libs/toastr.js',
        ]
    },
    css: {
        scripts: [
            'resources/css/*.css',
            'resources/js/libs/toastr/nuget/content/toastr.min.css',
        ]
    },
};


gulp.task('js:scripts', function(){
    return gulp.src(srs.js.scripts, { allowEmpty: true })
        .pipe(concat(srs.build.js.index))
        .pipe(uglify())
        .pipe(gulp.dest(srs.build.js.path));
});

gulp.task('css:scripts', function(){
    return gulp.src(srs.css.scripts)
        .pipe(concat(srs.build.css.index))
        .pipe(uglifycss())
        .pipe(gulp.dest(srs.build.css.path));
});
