<?php

/*
* Plugin Name: RandomTalk Chat Widget
* Description: This is a plugin for WordPress, which will make you able to add a widget to your website, where you can chat without making your own user.
* Version: 0.1
* Author: Kamilla Høybye Strøbæk
* Author URI: kamillahoybye.dk
*/

// Security
defined('ABSPATH') or die('YOU CANNOT PASS!');

// Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/randomtalk-scripts.php');

// Load Class
require_once(plugin_dir_path(__FILE__).'/includes/randomtalk-class.php');


// Register Widget
function register_randomtalk()
{
    register_widget('randomtalk_chat_widget');
}

// Hook in function
add_action('widgets_init', 'register_randomtalk');


