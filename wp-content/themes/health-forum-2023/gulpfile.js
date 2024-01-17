require('dotenv').config();

var gulp = require('gulp');
var sass = require('gulp-sass');
var babel = require('gulp-babel');
var concat = require('gulp-concat');
var notify = require('gulp-notify');
var uglify = require('gulp-uglify');
var jslint = require('gulp-jslint');
var rename = require('gulp-rename');
var imagemin = require('gulp-imagemin');
var autoprefixer = require('gulp-autoprefixer');
var bs = require('browser-sync').create(); // create a browser sync instance.

const orchestrator = require('@ace/orchestrator');

gulp.task('browser-sync', function () {
  bs.init({
    proxy: 'http://localhost:8888/websites/health-forum-2023/', // We need to use a proxy instead of the built-in server because WordPress has to do some server-side rendering for the theme to work
    watchOptions: {
      debounceDelay: 1000 // This introduces a small delay when watching for file change events to avoid triggering too many reloads
    }
  });
});

gulp.task('img', function () {
  gulp
    .src('./assets/img/*.{png,jpg,gif,svg}')
    .pipe(
      imagemin({
        optimizationLevel: 7,
        progressive: true
      })
    )

    .pipe(gulp.dest('./dist/img'))
    .pipe(
      notify({
        message: 'Images task complete',
        onLast: true,
        sound: false
      })
    );
});

gulp.task('sass', function () {
  gulp
    .src('./assets/css/*.scss')
    .pipe(
      sass({
        outputStyle: 'expanded'
      }).on('error', sass.logError)
    )
    .pipe(
      autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
      })
    )
    .pipe(gulp.dest('./dist/css'))
    // .pipe(bs.reload({stream: true}));
    .pipe(
      notify({
        message: 'Sass Compilation task complete',
        onLast: true,
        sound: false
      })
    );
});

gulp.task('js', function () {
  gulp
    .src('./assets/js/*.js')
    .pipe(jslint())
    .pipe(concat('custom.js'))
    .pipe(
      babel({
        presets: ['env']
      })
    )
    .pipe(
      rename({
        basename: 'custom',
        suffix: '.min'
      })
    )
    // .pipe(uglify())
    .pipe(gulp.dest('./dist/js'))
    // .pipe(bs.reload({stream: true}));
    .pipe(
      notify({
        message: 'JS scripts task complete',
        onLast: true,
        sound: false
      })
    );
});

gulp.task('watch', ['browser-sync'], function () {
  gulp
    .watch('./assets/img/raw/*.{png,jpg,gif,svg}', ['img'])
    .on('change', bs.reload);
  gulp
    .watch('assets/img/raw/*', { cwd: './' }, ['img'])
    .on('change', bs.reload);
  gulp.watch('./*.*').on('change', bs.reload);

  gulp.watch('./components/*.*').on('change', bs.reload);

  gulp.watch('./modules/*.*').on('change', bs.reload);

  gulp.watch('./assets/css/*.scss', ['sass']).on('change', bs.reload);

  gulp
    .watch('./assets/css/components/*.scss', ['sass'])
    .on('change', bs.reload);

  gulp.watch('./assets/css/modules/*.scss', ['sass']).on('change', bs.reload);

  gulp.watch('./assets/js/*.js', ['js']).on('change', bs.reload);
});

gulp.task('ace', function () {
  const aceManifestScript = orchestrator.default({
    product: 'wsjplus',
    type: 'default',
    useSSR: true
  });

  require('fs').writeFileSync('./cmp-head.php', aceManifestScript);
});

console.log(process.env.BUILD_CONFIG_PROFILE);
console.log(process.env.ACE_URL);
console.log(process.env.ACE_CONFIG);
console.log('ORCHESTRATOR FINISHED');

gulp.task('default', ['sass', 'js', 'img', 'watch', 'browser-sync', 'ace']);