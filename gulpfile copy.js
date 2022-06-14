'use strict';

/* Paths */
var path = {
  dist: {
    js: 'public/assets/js/',
    css: 'public/assets/css/',
    style: 'public/assets/css/'
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
    css: ['resources/assets/scss/**/*.scss', '!resources/assets/scss/fonts/*.scss', '!resources/assets/scss/colors/*.scss', '!resources/assets/scss/theme/_colors.scss'],
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
    touch = require('gulp-touch-cmd');
    
/* Server */
var config = {
    server: {
        baseDir: 'public/assets'
    },
    ghostMode: false, // By setting true, clicks, scrolls and form inputs on any device will be mirrored to all others
    notify: false
};

/* Tasks */

// Start the server
gulp.task('webserver', function () {
    webserver(config);
});

// Compile theme styles
gulp.task('css:dist', function () {
  return gulp.src(path.src.style)
    .pipe(newer(path.dist.style))
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass()
      .on('error', function (err) {
        sass.logError(err);
        this.emit('end');
      })
    )
    .pipe(sassUnicode())
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(path.dist.style))
    .pipe(touch())
    .on('end', () => { reload(); });
});

// Compile vendor styles
gulp.task('vendorcss:dist', function () {
  return gulp.src(path.src.vendorcss)
    .pipe(concat('plugins.css'))
    .pipe(cleanCSS())
    .pipe(gulp.dest(path.dist.css))
    .pipe(touch())
    .on('end', () => { reload(); });
});


gulp.task('pluginsjs:dist', function() {
    return gulp.src([
      'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
      path.src.vendorjs
    ])
    .pipe(jsImport({hideConsole: true}))
    .pipe(concat('plugins.js'))
    .pipe(uglify())
    .pipe(gulp.dest(path.dist.js))
    .pipe(touch())
    .on('end', () => { reload(); });
});


gulp.task('themejs:dist', function () {
  return gulp.src(path.src.themejs)
    .pipe(gulp.dest(path.dist.js))
    .pipe(plumber())
    //.pipe(uglify())
    .pipe(gulp.dest(path.dist.js))
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
    'vendorcss:dist',
    'pluginsjs:dist',
    'themejs:dist'
    )

);


// Launching tasks when files change
gulp.task('watch', function () {
    gulp.watch(path.watch.css, gulp.series('css:dist'));
    gulp.watch(path.watch.vendorcss, gulp.series('vendorcss:dist'));
    gulp.watch(path.watch.vendorjs, gulp.series('pluginsjs:dist'));
    gulp.watch(path.watch.themejs, gulp.series('themejs:dist'));
});

// Serve
gulp.task('serve', gulp.series(
    gulp.parallel('webserver','watch')
));


// Dist
gulp.task('build:dist', gulp.series(
    'build:dist'
));

// Default tasks
gulp.task('default', gulp.series(
    'build:dist',
    gulp.parallel('webserver','watch')
));
