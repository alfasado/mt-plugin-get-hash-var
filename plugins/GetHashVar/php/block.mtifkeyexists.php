<?php
function smarty_block_mtifkeyexists ( $args, $content, &$ctx, &$repeat ) {
    if (! isset( $content ) ) {
        require_once( 'function.mtgethashvar.php' );
        $value = smarty_function_mtgethashvar ( $args, $ctx );
        if ( $value ) {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
        }
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, FALSE );
    } else {
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat );
    }
}
?>