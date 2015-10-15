<?php
function smarty_block_mtifvalueexists ( $args, $content, &$ctx, &$repeat ) {
    if (! isset( $content ) ) {
        require_once( 'function.mtgethashkey.php' );
        $value = smarty_function_mtgethashkey ( $args, $ctx );
        if ( $value ) {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
        }
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, FALSE );
    } else {
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat );
    }
}
?>