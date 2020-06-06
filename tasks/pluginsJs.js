/**
 * DEPENDENCIES
 */
const { src, dest }    = require('gulp');
const config           = require('./config');
const notify           = require('gulp-notify');

// concat html
function pluginsJs() {
    return src(config.plugins.inputJs)
        .pipe(dest(config.plugins.outputJs));
}

pluginsJs.displayName = 'Plugins Js';
pluginsJs.description = 'Plugins js copy to www';

module.exports = pluginsJs;