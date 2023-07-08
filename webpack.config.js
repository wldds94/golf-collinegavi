var path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

const environment = require('./configuration/environment');

module.exports = {
    entry: {
        'main': path.resolve(environment.paths.source, 'js', 'main.js'),
    },
    output: {
        filename: 'js/[name].js',
        path: environment.paths.output,
    },
    module: {
        rules: [
            {
                test: /\.((c|sa|sc)ss)$/i,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'sass-loader'],
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: ['babel-loader'],
            },
            {
                test: /\.(png|gif|jpe?g|svg)$/i,
                type: 'asset/resource',
                generator: {
                    filename: './img/[name][ext]',
                },
                // use: [{
                //     loader: "url-loader",
                //     options: {
                //         name: "[name].[ext]",
                //         outputPath: "img",
                //     }
                // }],
            },
            {
                test: /\.(eot|ttf|woff|woff2)$/,
                type: 'asset/resource',
                generator: {
                    filename: './fonts/[name][ext]',
                },
                // use: [{
                //     loader: "file-loader",
                //     options: {
                //         name: "[name].[ext]",
                //         outputPath: "fonts/",
                //     }
                // }], // 'url-loader?limit=1024',
                // // // generator: {
                // // //     filename: 'fonts/[name][ext]',
                // // // },
                // // use: [{
                // //     loader: "url-loader",
                // //     options: {
                // //         name: "[name].[contenthash].[ext]",
                // //         outputPath: "fonts",
                // //     }
                // // }], // 'url-loader?limit=1024',
            },
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'css/[name].css',
        }),
        new CleanWebpackPlugin({
            verbose: true,
            cleanOnceBeforeBuildPatterns: ['**/*', '!stats.json'], // , '!img', '!img/**/*'
        }),
        new CopyWebpackPlugin({
            patterns: [
                // assets
                {
                    from: path.resolve(environment.paths.source, 'img'),
                    to: path.resolve(environment.paths.output, 'img'),
                    toType: 'dir',
                    globOptions: {
                        ignore: ['*.DS_Store', 'Thumbs.db'],
                    },
                    noErrorOnMissing: true,
                },
                // dependecies
                // {
                //     from: 'node_modules/slick-carousel/slick/slick.css',
                //     to: path.resolve(environment.paths.output, 'css'),
                // },
                // {
                //     from: 'node_modules/slick-carousel/slick/slick.min.js',
                //     to: path.resolve(environment.paths.output, 'js'),
                // },
                // {
                //     from: path.resolve(environment.paths.source, 'js', 'customizer.js'),
                //     to: path.resolve(environment.paths.output, 'js'),
                // },
            ],
        }),
    ],
    target: 'web',
}