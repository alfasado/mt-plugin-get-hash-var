<?php
function smarty_block_mtifvarisarray ( $args, $content, &$ctx, &$repeat ) {
    if (! isset( $content ) ) {
        if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
        $var = $ctx->__stash[ 'vars' ][ $name ];
        if ( is_array( var ) ) {
            if ( array_values( $var ) === $var ) {
                return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
            }
        }
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, FALSE );
    } else {
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat );
    }
}
?>