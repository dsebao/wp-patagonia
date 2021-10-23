<?php

if (!function_exists('patagonia_support')) :
    function patagonia_support() {
        // Adding support for featured images.
        add_theme_support('post-thumbnails');

        // Adding support for core block visual styles.
        add_theme_support('wp-block-styles');

        // Adding support for responsive embedded content.
        add_theme_support('responsive-embeds');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Enqueue editor styles.
        add_editor_style(
            array(
                './dist/editor.css',
            )
        );

        // Add support for custom units.
        add_theme_support('custom-units');
    }
    add_action('init', 'patagonia_support');
endif;

if (!function_exists('patagonia_get_google_fonts_url')) :
    function patagonia_get_google_fonts_url()
    {

        if (!class_exists('WP_Theme_JSON_Resolver_Gutenberg')) {
            return '';
        }

        $theme_data = WP_Theme_JSON_Resolver_Gutenberg::get_merged_data()->get_settings();

        if (empty($theme_data['typography']['fontFamilies'])) {
            return '';
        }

        $theme_families = !empty($theme_data['typography']['fontFamilies']['theme']) ? $theme_data['typography']['fontFamilies']['theme'] : array();
        $user_families = !empty($theme_data['typography']['fontFamilies']['user']) ? $theme_data['typography']['fontFamilies']['user'] : array();
        $font_families = array_merge($theme_families, $user_families);

        if (!$font_families) {
            return '';
        }

        $font_family_urls = array();

        foreach ($font_families as $font_family) {
            if (!empty($font_family['google'])) {
                $font_family_urls[] = $font_family['google'];
            }
        }

        if (!$font_family_urls) {
            return '';
        }

        // Return a single request URL for all of the font families.
        return apply_filters('patagonia_google_fonts_url', esc_url_raw('https://fonts.googleapis.com/css2?' . implode('&', $font_family_urls) . '&display=swap'));
    }
endif;

/**
 * Enqueue scripts and styles.
 */
function patagonia_scripts()
{
    // Enqueue theme stylesheet.
    wp_register_style('google-fonts', patagonia_get_google_fonts_url());

    $dependencies = apply_filters('patagonia_style_dependencies', array('google-fonts'));

    wp_enqueue_style(
        'styles-front-end',
        get_template_directory_uri() . '/dist/style.css',
        $dependencies,
        wp_get_theme('Patagonia')->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'patagonia_scripts');
