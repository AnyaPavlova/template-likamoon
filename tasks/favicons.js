/**
 * DEPENDENCIES
 */
const { src, dest } = require('gulp');
const config        = require('./config');
const imagemin = require('gulp-imagemin');

function favicons() {
    return src(config.favicons.input)
        .pipe(imagemin())
        .pipe(dest(config.favicons.output))
}

favicons.displayName = 'Favicons';
favicons.description = 'Favicons is done';

module.exports = favicons;