<?php
function smarty_function_mtrestorestash ( $args, &$ctx ) {
    $stash = $args[ 'stash' ];
    if (! $stash ) return'';
    $key = '';
    if ( isset( $args[ 'key' ] ) ) $key = $args[ 'key' ];
    $ctx->stash( $stash, $ctx->stash( '__get_hash_var_old_stash_' . $key ) );
}
?>