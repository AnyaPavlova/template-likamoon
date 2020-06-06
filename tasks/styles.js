/**
 * DEPENDENCIES
 */
const { src, dest }    = require('gulp');
const config           = require('./config');
const less             = require('gulp-less');
const postcss          = require('gulp-postcss');
const mqpacker         = require('css-mqpacker');
const sourcemaps       = require('gulp-sourcemaps');
const notify           = require('gulp-notify');

// Compilation less
function styles() {
    return src(config.styles.input)
        .pipe(sourcemaps.init())
        .pipe(less()
            .on('error', notify.onError({
                message: '<%= error.fileName %>' +
                    '\nLine <%= error.lineNumber %>:' +
                    '\n<%= error.message %>',
                title  : '<%= error.plugin %>'
            }))
        )
        .pipe(postcss([
            mqpacker({
                sort: false
            })
        ]))
        .pipe(sourcemaps.write())
        .pipe(dest(config.styles.output));
}

styles.displayName = 'Styles';
styles.description = 'Convert less to css';

module.exports = styles;