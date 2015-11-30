<?php
function smarty_block_mtmbunless ( $args, $content, &$ctx, &$repeat ) {
    require_once( 'block.mtmbif.php' );
    return smarty_block_mtmbif ( $args, $content, $ctx, $repeat );
}
?>