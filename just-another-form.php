<?php
    /*
    Plugin Name: Just another Form
    Plugin URI:  
    Description: Plugin is created to test 
    Version:     1.0
    Author:      Adheesh Juvekar
    Author URI:  https://facebook.com/juvekaradheesh
    */
    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    function jaf_activate_plugin(){
        include_once('dbconn.php');
        $createTable = "CREATE TABLE wp_testtable (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            fname VARCHAR(30) NOT NULL,
            lname VARCHAR(30),
            email VARCHAR(50) NOT NULL
            )";
        $conn->query($createTable);
    }

    register_activation_hook( __FILE__, 'jaf_activate_plugin' );
    
    function jaf_deactivate_plugin(){
        include_once('dbconn.php');
        $deleteTable = "DROP TABLE wp_testtable";
        $conn->query($deleteTable);
    }

    register_deactivation_hook( __FILE__, 'jaf_deactivate_plugin' );
    
    function jaf_uninstall_plugin(){
        include_once('dbconn.php');
        $deleteTable = "DROP TABLE wp_testtable";
        $conn->query($deleteTable);
    }

    register_uninstall_hook(__FILE__, 'jaf_uninstall_plugin');
    

    function jaf_another_form(){
        require('form-display.php');
    }

    add_shortcode('just-another-form','jaf_shortcode');

    function jaf_shortcode(){
        ob_start();
        jaf_another_form();
        return ob_get_clean();
    }


    function jaf_another_form_display(){
        require('admin-display.php');
    }
    $path = home_url();
    $path .= "/wp-content/plugins/just-another-form/icon.png";
    function jaf_add_menu_page(){
        add_menu_page(
            "JA Form",
            "JA Form",
            "manage_options",
            "jaform", 
            "jaf_another_form_display",
            $path,
            20
        );
    }
    
    add_action(admin_menu,jaf_add_menu_page);
?>