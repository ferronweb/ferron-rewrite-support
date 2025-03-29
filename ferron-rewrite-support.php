<?php
/**
* Plugin Name: Ferron URL rewriting support
* Description: This plugin enables support for URL rewriting in Ferron web server. This allows you to use URLs like "http://website.example/2025/03/29/sample-post/" instead of "http://website.example/index.php/2025/03/29/sample-post/".
* Version: 1.0.0
* Author: Ferron
* Author URI: https://www.ferronweb.org/
**/

// Filter for checking if the web server is Ferron (it supports URL rewriting)
function got_ferron_url_rewrite($got_url_rewrite) {
  // Whether the server software is Ferron or something else.
  $is_ferron = str_contains($_SERVER['SERVER_SOFTWARE'], 'Ferron');

  if ($is_ferron) {
    return true;
  } else {
    return $got_url_rewrite;
  }
}

// Apply the filter to enable support for URL rewriting in Ferron web server.
add_filter('got_url_rewrite', 'got_ferron_url_rewrite');
