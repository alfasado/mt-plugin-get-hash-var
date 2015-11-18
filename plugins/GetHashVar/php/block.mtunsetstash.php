<?php
function smarty_block_mtunsetstash( $args, $content, $ctx, &$repeat ) {
    $stash = $args[ 'stash' ];
    if (! isset( $content ) ) {
        $token = md5( uniqid( '', 1 ) . rand() );
        $old_token = $ctx->stash( '__get_hash_var_current_token' );
        $ctx->stash( '__get_hash_var_old_token', $old_token );
        $ctx->stash( '__get_hash_var_current_token', $token );
        $ctx->stash( '__get_hash_var_old_stash_' . $token, $ctx->stash( $stash ) );
        $ctx->stash( $stash, NULL );
    } else {
        $token = $ctx->stash( '__get_hash_var_current_token' );
        $ctx->stash( $stash, $ctx->stash( '__get_hash_var_old_stash_' . $token ) );
        $ctx->stash( '__get_hash_var_current_token',
            $ctx->stash( '__get_hash_var_old_token' ) );
        $repeat = FALSE;
    }
    return $content;
}
?>