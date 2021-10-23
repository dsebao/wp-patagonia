const mix = require("laravel-mix");

const RESOURCES_DIR = './assets/';
const DIST_DIR = './dist/';

mix.js(`${RESOURCES_DIR}/scripts/app.js`, DIST_DIR);
mix.sass(`${RESOURCES_DIR}/styles/style.scss`, DIST_DIR);
mix.sass(`${RESOURCES_DIR}/styles/editor.scss`, DIST_DIR);
