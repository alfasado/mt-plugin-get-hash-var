<?php
function smarty_function_mtrestorevars ( $args, &$ctx ) {
    $ctx->__stash[ 'vars' ] = $ctx->__stash[ 'vars' ][ '__reset_vars_old_vars' ];
}
?>