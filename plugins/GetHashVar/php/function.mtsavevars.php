<?php
function smarty_function_mtsavevars ( $args, &$ctx ) {
    $key = '';
    $vars = $ctx->__stash[ 'vars' ];
    if ( isset( $args[ 'key' ] ) ) $key = $args[ 'key' ];
    $ctx->stash( '__get_hash_var_old_vars_' . $key, $vars );
}
?>