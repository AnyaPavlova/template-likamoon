/**
 * DEPENDENCIES
 */
const { src, dest }    = require('gulp');
const config           = require('./config');
const notify           = require('gulp-notify');

function pluginsCss() {
    return src(config.plugins.inputCss)
        .pipe(dest(config.plugins.outputCss));
}

pluginsCss.displayName = 'Plugins Css';
pluginsCss.description = 'Plugins Css copy to www';

module.exports = pluginsCss;