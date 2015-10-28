<?php
function smarty_function_mtsavevars ( $args, &$ctx ) {
    $ctx->__stash[ 'vars' ][ '__get_hash_var_old_vars' ] = $ctx->__stash[ 'vars' ];
}
?>