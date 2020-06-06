'use strict';

/**
 * DEPENDENCIES
 */
const gulp = require('gulp');
const fonts = require('./tasks/fonts');
const svg = require('./tasks/svg');
const pages = require('./tasks/pages');
const clean = require('./tasks/clean');
const server = require('./tasks/server/server').server;
const watch = require('./tasks/watch');
const styles = require('./tasks/styles');
const pluginsJs = require('./tasks/pluginsJs');
const pluginsCss = require('./tasks/pluginsCss');
const scripts = require('./tasks/scripts');
const images = require('./tasks/images');
const favicons = require('./tasks/favicons');

/**
 * TASKS
 */
gulp.task('favicons', gulp.series(favicons));

gulp.task('svg', gulp.series(svg));

gulp.task('images', gulp.series(images));

gulp.task('fonts', gulp.series(fonts));

gulp.task('clean', gulp.series(clean));

gulp.task('plugins', gulp.parallel(pluginsCss, pluginsJs));

gulp.task('build', gulp.series(clean, gulp.parallel(pages, styles, scripts, svg, images, favicons, fonts, pluginsJs, pluginsCss)));

gulp.task('dev', gulp.series(server, watch));

gulp.task('production', gulp.series(clean, 'build'));