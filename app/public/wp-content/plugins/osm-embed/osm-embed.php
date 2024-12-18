<?php
/**
 * Plugin Name: OSM Embed
 * Description: A plugin to embed an OpenStreetMap iframe using a shortcode.
 * Version: 1.0
 * Author: Martin Smeder
 */

// Shortcode to embed OpenStreetMap
function osm_embed_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'lat' => '51.505', // Default latitude 
            'lon' => '-0.09',  // Default longitude
            'zoom' => '13',    // Default zoom level
            'height' => '400px',
            'width' => '100%',
        ),
        $atts
    );

    return '<iframe width="' . esc_attr($atts['width']) . '" height="' . esc_attr($atts['height']) . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=' . ($atts['lon'] - 0.01) . '%2C' . ($atts['lat'] - 0.01) . '%2C' . ($atts['lon'] + 0.01) . '%2C' . ($atts['lat'] + 0.01) . '&amp;layer=mapnik"></iframe>';
}
add_shortcode('osm_embed', 'osm_embed_shortcode');