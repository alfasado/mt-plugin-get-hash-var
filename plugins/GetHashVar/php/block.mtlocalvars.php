<?php
function smarty_block_mtlocalvars( $args, $content, $ctx, &$repeat ) {
    if (! isset( $content ) ) {
        $token = md5( uniqid( '', 1 ) . rand() );
        $old_token = $ctx->stash( '__get_hash_var_current_token' );
        $ctx->stash( '__get_hash_var_old_token', $old_token );
        $ctx->stash( '__get_hash_var_current_token', $token );
        $ctx->stash( '__get_hash_var_old_vars_' . $token, $ctx->__stash[ 'vars' ] );
        foreach ( $args as $key => $value ) {
            $ctx->__stash[ 'vars' ][ $key ] = $value;
            $ctx->__stash[ 'vars' ][ strtolower( $key ) ] = $value;
        }
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