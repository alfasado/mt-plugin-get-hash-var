<?php
function smarty_function_mtresetvars ( $args, &$ctx ) {
    unset( $ctx->__stash[ 'vars' ] );
}
?>