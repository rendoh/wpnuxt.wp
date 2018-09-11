<?php

/**
 * remove tags
 */

remove_filter ('the_excerpt',  'wpautop');

/**
 * title
 */
function setup_theme() {
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'setup_theme');

function custom_title_separator() {
  return ' | ';
}
add_filter('document_title_separator', 'custom_title_separator');

function format_title($title) {
  global $meta_title;
  if (isset($title['tagline'])) {
    unset($title['tagline']);
  }

  if (!empty($meta_title)) {
    $title['title'] = $meta_title;
  }
  
  return $title;
}
add_filter('document_title_parts', 'format_title');

function get_page_title() {
  $page_title = wp_get_document_title();
  return $page_title;
}

// Allow anonymous comments
function filter_rest_allow_anonymous_comments() {
    return true;
}
add_filter('rest_allow_anonymous_comments','filter_rest_allow_anonymous_comments');