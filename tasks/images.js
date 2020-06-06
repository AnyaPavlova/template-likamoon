/**
 * DEPENDENCIES
 */
const { src, dest } = require('gulp');
const config        = require('./config');
const imagemin = require('gulp-imagemin');

function images() {
    return src(config.images.input)
        .pipe(imagemin({},
            {progressive: true}
            )
        )
        .pipe(dest(config.images.output))
}

images.displayName = 'Images';
images.description = 'Images is done';

module.exports = images;