<?php
function smarty_block_mtunsetvars( $args, $content, $ctx, &$repeat ) {
    if (! isset( $content ) ) {
        $token = md5( uniqid( '', 1 ) . rand() );
        $old_token = $ctx->stash( '__get_hash_var_current_token' );
        $ctx->stash( '__get_hash_var_old_token', $old_token );
        $ctx->stash( '__get_hash_var_current_token', $token );
        $ctx->stash( '__get_hash_var_old_vars_' . $token, $ctx->__stash[ 'vars' ] );
        unset( $ctx->__stash[ 'vars' ] );
    } else {
        $token = $ctx->stash( '__get_hash_var_current_token' );
        $ctx->__stash[ 'vars' ] = $ctx->stash( '__get_hash_var_old_vars_' . $token );
        $ctx->stash( '__get_hash_var_current_token',
            $ctx->stash( '__get_hash_var_old_token' ) );
        $repeat = FALSE;
    }
    return $content;
}
?>