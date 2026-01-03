<?php
/**
 * Force admin-ajax loopbacks to HTTP inside containers
 */

add_filter('admin_url', function ($url, $path, $blog_id) {
    if (strpos($url, 'https://mirror.villaestate.pl') === 0) {
        $url = str_replace('https://', 'http://', $url);
    }
    return $url;
}, 10, 3);

add_filter('rest_url', function ($url) {
    if (strpos($url, 'https://mirror.villaestate.pl') === 0) {
        $url = str_replace('https://', 'http://', $url);
    }
    return $url;
});
