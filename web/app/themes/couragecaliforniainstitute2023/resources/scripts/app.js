// Import Bootstrap
import 'bootstrap';
import './routes/common.js';

import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {
  if ($('.page.home').length > 0) {
    import('./routes/home.js');
  }
  if ($('.page.blog').length > 0) {
    import('./routes/blog.js');
  }
  if ($('.page.voter-tools').length) {
    console.log('Voter Tools');
    import('./routes/voter-tools.js');
  }
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
