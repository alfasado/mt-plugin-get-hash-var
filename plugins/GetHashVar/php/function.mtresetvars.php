<?php
function smarty_function_mtresetvars ( $args, &$ctx ) {
    $ctx->__stash[ 'vars' ][ '__get_hash_var_old_vars' ] = $ctx->__stash[ 'vars' ];
    unset( $ctx->__stash[ 'vars' ] );
}
?>