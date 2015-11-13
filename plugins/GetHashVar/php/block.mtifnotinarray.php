<?php
function smarty_block_mtifnotinarray ( $args, $content, &$ctx, &$repeat ) {
    require_once( 'block.mtifinarray.php' );
    $args[ 'else' ] = 1;
    return smarty_block_mtifinarray( $args, $content, $ctx, $repeat );
}
?>