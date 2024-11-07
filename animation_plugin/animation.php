<?php
/**
 * Plugin Name: Animation Broken Glass
 * Description: short code: [open_new_html]
 * Version: 1.1
 * Author: grohonn.com
 */

function enqueue_custom_scripts() {
    // Enqueue the CSS file for custom styles (optional)
    wp_enqueue_style('custom-html-opener-style', plugin_dir_url(__FILE__) . 'custom-html-opener.css');
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Shortcode to display the new.html file in an iframe with a background iframe
function custom_html_opener_shortcode() {
    ob_start();
    ?>
    <!-- Inline styles for the background iframe -->
    <style>
.elementor.elementor-16.elementor-location-header.elementor-motion-effects-parent {
            display: none !important;
        }
        .elementor.elementor-153.elementor-location-footer {
    display: none !important;
}
         #masthead.site-header.header-layout-1 {
            display: none;
        }
        #backgroundIframe {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1; /* Place it behind everything else */
            border: none; /* Remove border */
           
        }
    </style>

    <!-- Background iframe that loads new.html -->
    <iframe id="backgroundIframe" 
            src="<?php echo plugin_dir_url(__FILE__) . 'new.html'; ?>" 
            sandbox="allow-same-origin allow-scripts allow-forms allow-popups allow-top-navigation"></iframe>

    <?php
    return ob_get_clean();
}
add_shortcode('open_new_html', 'custom_html_opener_shortcode');