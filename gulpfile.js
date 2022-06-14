'use strict';

/* Paths */
var path = {
  dist: {
    js: 'public/assets/js/',
    css: 'public/assets/css/'
  },
  src: {
    js: 'resources/assets/js/',
    vendorjs: 'resources/assets/js/vendor/*.*',
    themejs: 'resources/assets/js/theme.js',
    style: 'resources/assets/scss/style.scss',
    vendorcss: 'resources/assets/css/vendor/*.*'
  },
  watch: {
    themejs: 'resources/assets/js/theme.js',
    vendorjs: 'resources/assets/js/vendor/*.*',
    css: ['resources/assets/scss/**/*.scss'],
    vendorcss: 'resources/assets/css/vendor/*.*',
    user: 'resources/assets/scss/_user-variables.scss'
  }
};

/* Include gulp and plugins */
var gulp = require('gulp'),
    webserver = require('browser-sync'),
    reload = webserver.reload,
    plumber = require('gulp-plumber'),
    sourcemaps = require('gulp-sourcemaps'),
    sass = require('gulp-sass')(require('sass')),
    sassUnicode = require('gulp-sass-unicode'),
    autoprefixer = require('gulp-autoprefixer'),
    cleanCSS = require('gulp-clean-css'),
    uglify = require('gulp-uglify'),
    cache = require('gulp-cache'),
    imagemin = require('gulp-imagemin'),
    jpegrecompress = require('imagemin-jpeg-recompress'),
    pngquant = require('imagemin-pngquant'),
    del = require('del'),
    fileinclude = require('gulp-file-include'),
    beautify = require('gulp-beautify'),
    minify = require('gulp-minify'),
    concat = require('gulp-concat'),
    jsImport = require('gulp-js-import'),
    newer = require('gulp-newer'),
    replace = require('gulp-replace'),
    touch = require('gulp-touch-cmd'),
    merge = require('merge-stream');;
    
/* Server */
var config = {
    server: {
        baseDir: 'public/assets'
    },
    ghostMode: false, // By setting true, clicks, scrolls and form inputs on any device will be mirrored to all others
    notify: false
};

/* Tasks */


// Compile theme styles
gulp.task('css:dist', function () {

  return merge(
    gulp.src(path.src.vendorcss)
    .pipe(cleanCSS()),
    gulp.src(path.src.style)
      .pipe(plumber())
      .pipe(sass()
        .on('error', function (err) {
          sass.logError(err);
          this.emit('end');
        })
      )
      .pipe(sassUnicode())
      .pipe(autoprefixer())
      .pipe(cleanCSS())

  ).pipe(concat('style.css')).pipe(sourcemaps.init()).pipe(sourcemaps.write('.')).pipe(gulp.dest(path.dist.css));

});

gulp.task('appjs:dist', function() {
    return gulp.src([
      'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
      path.src.vendorjs,
      path.src.themejs
    ])
    .pipe(jsImport({hideConsole: true}))
    .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest(path.dist.js))
    .pipe(touch())
    .on('end', () => { reload(); });
});


// Clear cache
gulp.task('cache:clear', function () {
    cache.clearAll();
});



// Assembly Dist
gulp.task('build:dist',

    gulp.parallel(
    'css:dist',
    'appjs:dist'
    )

);


// Launching tasks when files change
gulp.task('watch', function () {
    gulp.watch(path.watch.css, gulp.series('css:dist'));
    gulp.watch(path.watch.vendorcss, gulp.series('css:dist'));
    gulp.watch(path.watch.vendorjs, gulp.series('appjs:dist'));
    gulp.watch(path.watch.themejs, gulp.series('appjs:dist'));
});

// Serve
gulp.task('serve', gulp.series(
    gulp.parallel('watch')
));


// Dist
gulp.task('build:dist', gulp.series(
    'build:dist'
));

// Default tasks
gulp.task('default', gulp.series(
    'build:dist',
    gulp.parallel('watch')
));
