/**
 * DEPENDENCIES
 */
const { src, dest } = require('gulp');
const config = require('./config');

function fonts() {
    return src(config.fonts.input)
        .pipe(dest(config.fonts.output));
}

fonts.displayName = 'Fonts';
fonts.description = 'Fonts move';

module.exports = fonts;