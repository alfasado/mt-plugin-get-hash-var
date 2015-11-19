<?php
function smarty_function_mtresetvars ( $args, &$ctx ) {
    $key = '';
    $vars = $ctx->__stash[ 'vars' ];
    if ( isset( $args[ 'key' ] ) ) $key = $args[ 'key' ];
    unset( $ctx->__stash[ 'vars' ] );
    $ctx->stash( '__get_hash_var_old_vars_' . $key, $vars );
}
?>