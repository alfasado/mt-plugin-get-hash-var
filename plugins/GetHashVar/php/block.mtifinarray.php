<?php
function smarty_block_mtifinarray ( $args, $content, &$ctx, &$repeat ) {
    if (! isset( $content ) ) {
        if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
        if ( isset( $args[ 'value' ] ) ) $value = $args[ 'value' ];
        if ( isset( $args[ 'var' ] ) ) $value = $args[ 'var' ];
        $array = $ctx->__stash[ 'vars' ][ $name ];
        if (! $array ) {
            $array = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
        }
        $cond = TRUE;
        if ( isset( $args[ 'else' ] ) ) $else = TRUE;
        if ( is_array( $array ) ) {
            if ( in_array( $value, $array ) ) {
                if (! $else ) {
                    return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
                } else {
                    return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, FALSE );
                }
            }
        }
        if (! $else ) {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, FALSE );
        } else {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
        }
    } else {
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat );
    }
}
?>