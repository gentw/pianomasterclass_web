var webpack = require('webpack');
var path = require('path');

module.exports = {
    entry: {
        admin: './resources/admin/main.admin.js'
    },
    output: {
        path: "/public/js",
        publicPath: "/public/",
        filename: "[name].js"
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                // excluding some local linked packages.
                // for normal use cases only node_modules is needed.
                exclude: /node_modules/,
                loader: 'babel'
            },
            {
                test: /\.scss$/,
                loaders: ['style', 'css', 'sass']
            },
            {
                test: /\.vue$/,
                loader: 'vue'
            },
            {
                test: /\.json$/,
                loader: 'json-loader'
            }
        ]
    },
    babel: {
        presets: ['es2015'],
        plugins: ['transform-runtime'],
        "comments": false
    },
    resolve: {
        modulesDirectories: ['node_modules'],
        alias: {
            'vue$': 'vue/dist/vue.common.js',
            'services': path.resolve(__dirname, 'resources/admin/services'),
            'directives':  path.resolve(__dirname, 'resources/admin/directives'),
            'helpers':  path.resolve(__dirname, 'resources/admin/components/helpers')
        }
    }
}