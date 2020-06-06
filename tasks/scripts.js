/**
 * DEPENDENCIES
 */
const { src, dest } = require('gulp');
const babel         = require('gulp-babel');
const config        = require('./config');

function scripts() {
    return src(config.scripts.input)
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(dest(config.scripts.output))
}

scripts.displayName = 'Scripts';
scripts.description = 'Scripts compiled ES5';

module.exports = scripts;