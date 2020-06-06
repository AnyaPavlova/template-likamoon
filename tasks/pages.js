/**
 * DEPENDENCIES
 */
const { src, dest }    = require('gulp');
const fileinclude      = require('gulp-file-include');
const config           = require('./config');
const notify           = require('gulp-notify');

// concat html
function html() {
    return src(config.pages.input)
        .pipe(fileinclude({
                prefix: '@@',
                basepath: '@file'
            })
                .on('error', notify.onError({
                    message: '<%= error.fileName %>' +
                        '\nLine <%= error.lineNumber %>:' +
                        '\n<%= error.message %>',
                    title  : '<%= error.plugin %>'
                }))
        )
        .pipe(dest(config.pages.output));
}

html.displayName = 'Html';
html.description = 'Concat html files';

module.exports = html;