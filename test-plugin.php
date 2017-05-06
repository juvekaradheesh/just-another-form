<?php
    /*
    Plugin Name: Test Plugin
    Plugin URI:  
    Description: Plugin is created to test 
    Version:     1.0
    Author:      Adheesh Juvekar
    Author URI:  https://facebook.com/juvekaradheesh
    */
    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    function testplugin_activate_plugin(){
        include_once('dbconn.php');
        $createTable = "CREATE TABLE wp_testtable (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            fname VARCHAR(30) NOT NULL,
            lname VARCHAR(30),
            email VARCHAR(50) NOT NULL
            )";
        $conn->query($createTable);
    }

    register_activation_hook( __FILE__, 'testplugin_activate_plugin' );
    
    function testplugin_deactivate_plugin(){
        include_once('dbconn.php');
        $deleteTable = "DROP TABLE wp_testtable";
        $conn->query($deleteTable);
    }

    register_deactivation_hook( __FILE__, 'testplugin_deactivate_plugin' );
    
    function testplugin_uninstall_plugin(){
        include_once('dbconn.php');
        $deleteTable = "DROP TABLE wp_testtable";
        $conn->query($deleteTable);
    }

    register_uninstall_hook(__FILE__, 'testplugin_uninstall_plugin');

?>