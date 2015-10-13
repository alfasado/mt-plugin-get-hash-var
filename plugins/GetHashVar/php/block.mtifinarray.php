<?php
function smarty_block_mtifinarray ( $args, $content, &$ctx, &$repeat ) {
    if (! isset( $content ) ) {
        if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
        if ( isset( $args[ 'value' ] ) ) $key = $args[ 'value' ];
        if ( isset( $args[ 'var' ] ) ) $value = $args[ 'var' ];
        $array = $ctx->__stash[ 'vars' ][ $name ];
        if ( is_array( $array ) ) {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
        }
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, FALSE );
    } else {
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat );
    }
}
?>