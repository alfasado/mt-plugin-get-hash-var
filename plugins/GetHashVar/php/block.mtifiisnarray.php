<?php
function smarty_block_mtifisinarray ( $args, $content, &$ctx, &$repeat ) {
    require_once( 'block.mtifinarray.php' );
    return smarty_block_mtifinarray ( $args, $content, $ctx, $repeat );
}
?>