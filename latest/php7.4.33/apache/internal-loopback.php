<?php
/**
 * Internal loopback / REST API fix for Docker + Cloudflare Tunnel
 */

add_filter('https_ssl_verify', '__return_false');

add_filter('wp_http_validate_url', function($url) {
    // rewrite HTTPS -> HTTP for internal container requests
    if (strpos($url, 'https://mirror.villaestate.pl') === 0) {
        $url = str_replace('https://mirror.villaestate.pl', 'http://mirror.villaestate.pl', $url);
    }
    return $url;
});