const sourceBase = 'src';
const buildBase = 'www';

module.exports = {
    server: {
        watch: `${buildBase}`
    },
    scripts: {
        watch: `${sourceBase}/js/**/*.js`,
        input: `${sourceBase}/js/*.js`,
        output: `${buildBase}/js`
    },
    styles: {
        input: `${sourceBase}/css/*.less`,
        watch: `${sourceBase}/css/**/*.less`,
        output: `${buildBase}/css`
    },
    plugins: {
        inputJs: `${sourceBase}/plugins/**/*.js`,
        inputCss: `${sourceBase}/plugins/**/*.css`,
        outputJs: `${buildBase}/js`,
        outputCss: `${buildBase}/css`
    },
    pages: {
        input: `${sourceBase}/html/*.html`,
        watch: `${sourceBase}/html/**/*.html`,
        output: `${buildBase}`,
        clean: `${buildBase}/*.html`
    },
    fonts: {
        input: `${sourceBase}/fonts/**/*.{ttf,otf,woff,woff2}`,
        watch: `${sourceBase}/fonts/**/*.{ttf,otf,woff,woff2}`,
        output: `${buildBase}/fonts`
    },
    images: {
        input: `${sourceBase}/images/**/*.{jpg,png,jpeg,webp,gif}`,
        watch: `${sourceBase}/images/**/*.{jpg,png,jpeg,webp,gif}`,
        output: `${buildBase}/images`
    },
    svg: {
        input: `${sourceBase}/images/**/*.svg`,
        watch: `${sourceBase}/images/**/*.svg`,
        output: `${buildBase}/images`
    },
    favicons: {
        input: `${sourceBase}/favicons/*.{ico,png}`,
        output: `${buildBase}/favicons`
    }
};