const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.react('resources/js/blog/app.js', 'public/js')
    .react('resources/js/dj/app.js', 'public/dj/js')
    .react('resources/js/media/app.js', 'public/media/js')
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.css$/,
                    loaders: [
                        {loader: 'style-loader'},
                        {
                            loader: 'css-loader',
                            options: {
                                modules: {
                                    mode: 'local',
                                    exportGlobals: true,
                                    // localIdentName: '[name]__[local]--[hash:base64:5]',
                                    localIdentName: '[hash:base64:10]--[hash:base64:5]',
                                    context: path.resolve(__dirname, 'src'),
                                    hashPrefix: 'my-custom-hash',
                                },
                                importLoaders: 1
                            }
                        }

                    ]
                },
            ],
        }
    });
