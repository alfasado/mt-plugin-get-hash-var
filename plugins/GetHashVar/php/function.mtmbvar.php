<?php
function smarty_function_mtmbvar ( $args, &$ctx ) {
    require_once( 'function.mtmbgetvar.php' );
    return smarty_function_mtmbgetvar( $args, $ctx );
}
?>