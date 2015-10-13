<?php
function smarty_block_mtifvarexists ( $args, $content, &$ctx, &$repeat ) {
    require_once( 'block.mtifvalueexists.php' );
    return smarty_block_mtifvalueexists ( $args, $content, $ctx, $repeat );
}
?>