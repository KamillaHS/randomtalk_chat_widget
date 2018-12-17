<?php

// Add Scripts
function randomtalk_add_scripts()
{
    // Add main CSS file
    wp_enqueue_style('randomtalk-main-style', plugins_url(). '/randomtalk_chat_widget/css/style.css');
}

add_action('wp_enqueue_scripts', 'randomtalk_add_scripts');