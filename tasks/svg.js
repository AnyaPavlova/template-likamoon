'use strict';

/**
 * DEPENDENCIES
 */
const { src, dest } = require('gulp');
const config = require('./config');
const svgo = require('gulp-svgo');

function svg() {
    return src(config.svg.input)
        .pipe(svgo({
            plugins: [{
                removeStyleElement: true
            }]
        }))
        .pipe(dest(config.svg.output));
}

svg.displayName = 'Svg sprite';
svg.description = 'Create svg sprite';

module.exports = svg;