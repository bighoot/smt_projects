<?php 
/* Short and sweet */
define('WP_USE_THEMES', false);
require('./blog/wp-blog-header.php');
?>

This is the WP Integration Test Page</br></br></br></br>


<?php tablepress_print_table( 'id=1&use_datatables=true&print_name=false' ); ?>