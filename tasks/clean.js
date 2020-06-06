'use strict';

/**
 * DEPENDENCIES
 */
const config = require('./config');
const del    = require('del');

/**
 * CLEAN
 */
function clean() {
    return del([
        config.pages.clean,
        config.scripts.output,
        config.styles.output,
        config.fonts.output,
        config.images.output,
        config.svg.output,
        config.favicons.output
    ]);
}

clean.displayName = 'Clean';
clean.description = 'Clean page files';

module.exports = clean;
