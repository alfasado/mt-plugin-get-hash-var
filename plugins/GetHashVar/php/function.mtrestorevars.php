<?php
function smarty_function_mtrestorevars ( $args, &$ctx ) {
    $ctx->__stash[ 'vars' ] = $ctx->__stash[ 'vars' ][ '__get_hash_var_old_vars' ];
}
?>