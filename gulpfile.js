const elixir = require('laravel-elixir');
require('laravel-elixir-imagemin');
dotenv = require('dotenv').config();

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js');
});

elixir(function(mix) {
  mix.browserSync({
    proxy: process.env.APP_DOMAIN
  });
});

elixir(function(mix) {
   mix.imagemin();
});