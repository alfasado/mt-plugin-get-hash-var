<?php
function smarty_block_mtmbif ( $args, $content, &$ctx, &$repeat ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    $var = $ctx->__stash[ 'vars' ][ $name ];
    if (! $var ) {
        $var = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
    }
    if (! $var ) {
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, FALSE );
    }
    if ( is_array( $var ) ) {
        if ( array_values( $var ) === $var ) {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
        }
    }
    foreach ( $args as $key => $value ) {
        if ( strpos( $value, '$' ) === 0 ) {
            $value = preg_replace( '/^\$/', '', $name );
            $_value = $ctx->__stash[ 'vars' ][ $value ];
            if (! $_value ) {
                $_value = $ctx->__stash[ 'vars' ][ strtolower( $value ) ];
            }
            $args[ $key ] = $_value;
        }
    }
    $this_tag = $ctx->this_tag();
    if ( $this_tag == 'mtmbif' ) {
        require_once( 'block.mtif.php' );
        return smarty_block_mtif( $args, $content, $ctx, $repeat );
    } else if ( $this_tag == 'mtmbunless' ) {
        require_once( 'block.mtunless.php' );
        return smarty_block_mtunless( $args, $content, $ctx, $repeat );
    } else {
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, FALSE );
    }
}
?>