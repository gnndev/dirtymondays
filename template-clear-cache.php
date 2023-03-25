<?php
/*
Template Name: clear cache
*/

get_header(); ?>

<?php if (function_exists('sg_cachepress_purge_cache')) {
    sg_cachepress_purge_cache();
} ?>

<?php get_footer(); ?>