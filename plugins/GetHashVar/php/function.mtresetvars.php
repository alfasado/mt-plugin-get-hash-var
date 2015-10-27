<?php
function smarty_function_mtresetvars ( $args, &$ctx ) {
    $ctx->__stash[ 'vars' ][ '__reset_vars_old_vars' ] = $ctx->__stash[ 'vars' ];
    unset( $ctx->__stash[ 'vars' ] );
}
?>