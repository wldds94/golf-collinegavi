/* eslint-disable import/no-extraneous-dependencies */
const { merge } = require('webpack-merge');
const TerserPlugin = require('terser-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')

const webpackConfiguration = require('../webpack.config');
const environment = require('./environment');

module.exports = merge(webpackConfiguration, {
  mode: 'development',

  /* Manage source maps generation process */
  devtool: 'eval-source-map',

  /* Optimization configuration */
  optimization: {
    minimize: false,
    minimizer: [
      new TerserPlugin({
        parallel: true,
      }),
      // new CssMinimizerPlugin(),
    ],
  },

  /* Development Server Configuration */
  devServer: {
    static: {
      directory: environment.paths.output,
      publicPath: '/',
      watch: true,
    },
    devMiddleware: {
      writeToDisk: true,
    },
    watchFiles: ['**/*.php'],
    client: {
      overlay: true,
    },
    open: false,
    compress: true,
    hot: false,
    allowedHosts: [
      '*',
    ],
    headers: { 'Access-Control-Allow-Origin': 'http://localhost' },
    ...environment.server,
  },

  /* File watcher options */
  watchOptions: {
    aggregateTimeout: 300,
    poll: 300,
    ignored: /node_modules/,
  },

  /* Additional plugins configuration */
  plugins: [
    new BrowserSyncPlugin({
      // browse to http://localhost:8000/ during development,
      // ./dist directory is being served
      server: { baseDir: ['dist'] },
      ...environment.server,
    })
  ],
});
