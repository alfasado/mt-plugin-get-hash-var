<?php
function smarty_function_mtusleep ( $args, &$ctx ) {
    $microseconds = $args[ 'microseconds' ];
    $microseconds = $microseconds * 1;
    usleep( $microseconds * 1000 );
    return '';
}
?>