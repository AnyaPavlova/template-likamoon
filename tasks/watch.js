'use strict';

/**
 * DEPENDENCIES
 */
const gulp = require('gulp');
const config = require('./config');
const reload = require('./server/reload');
const pages = require('./pages');
const styles = require('./styles');
const scripts = require('./scripts');
const images = require('./images');
const svg = require('./svg');
const fonts = require('./fonts');

/**
 * WATCH
 */
function watch() {
    gulp.watch(config.pages.watch, gulp.series(pages, reload));
    gulp.watch(config.styles.watch, gulp.series(styles, reload));
    gulp.watch(config.scripts.watch, gulp.series(scripts, reload));
    gulp.watch(config.images.watch, gulp.series(images, reload));
    gulp.watch(config.svg.watch, gulp.series(svg, reload));
    gulp.watch(config.fonts.watch, gulp.series(fonts, reload));
}

watch.displayName = 'Watch';
watch.description = 'Watch dev files';

module.exports = watch;
