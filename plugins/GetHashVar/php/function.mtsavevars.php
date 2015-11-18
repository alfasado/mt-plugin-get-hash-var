<?php
function smarty_function_mtsavevars ( $args, &$ctx ) {
    $key = '';
    if ( isset( $args[ 'key' ] ) ) $key = $args[ 'key' ];
    $ctx->__stash[ 'vars' ][ '__get_hash_var_old_vars_' . $key ] = $ctx->__stash[ 'vars' ];
}
?>