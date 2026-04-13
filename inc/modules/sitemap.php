<?php

add_filter('wp_sitemaps_add_provider', 'remove_sitemap_provider', 10, 2);
add_filter('wp_sitemaps_post_types', 'remove_sitemaps_post_types');
add_filter('wp_sitemaps_posts_entry', 'sitemaps_posts_entry_set', 10, 2);
add_filter('wp_sitemaps_index_entry', 'sitemaps_index_entry_set', 10, 4);

function remove_sitemap_provider($provider, $name)
{

    $providers = ['users', 'taxonomies'];

    if (in_array($name, $providers)) {
        return false;
    }

    return $provider;
}

function remove_sitemaps_post_types($post_types)
{
    unset($post_types['post']);

    return $post_types;
}

function sitemaps_posts_entry_set($entry, $post)
{
    $front_page = get_option('page_on_front');

    $entry['lastmod']    = get_the_modified_date('c', $post);
    $entry['priority']   = 0.8;
    $entry['changefreq'] = 'weekly';

    if ($front_page == $post->ID) {
        $entry['priority'] = 1;
        $entry['changefreq'] = 'daily';
    }
    return $entry;
}

function sitemaps_index_entry_set($sitemap_entry, $object_type, $type, $page)
{

    $last_post = wp_get_recent_posts([
        'post_type' => $type,
        'post_status' => 'publish',
        'numberposts' => 1,
        'orderby' => 'post_modified',
        'order' => 'DESC'
    ]);

    if (! empty($last_post[0])) {
		$sitemap_entry['lastmod'] = get_the_modified_date('c', $last_post[0]['ID']);
	}


    return $sitemap_entry;
}
