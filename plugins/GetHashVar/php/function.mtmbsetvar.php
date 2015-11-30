<?php
function smarty_function_mtmbsetvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if (! $name ) return '';
    if ( isset( $args[ 'value' ] ) ) $value = $args[ 'value' ];
    if (! $value ) return '';
    if ( strpos( $name, '$' ) === 0 ) {
        $name = preg_replace( '/^\$/', '', $name );
        $_name = $ctx->__stash[ 'vars' ][ $name ];
        if (! $_name ) {
            $_name = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
        }
        $name = $_name;
    }
    if ( strpos( $value, '$' ) === 0 ) {
        $value = preg_replace( '/^\$/', '', $value );
        $_value = $ctx->__stash[ 'vars' ][ $value ];
        if (! $_value ) {
            $_value = $ctx->__stash[ 'vars' ][ strtolower( $value ) ];
        }
        $value = $_value;
    }
    $ctx->__stash[ 'vars' ][ $name ] = $value;
    $ctx->__stash[ 'vars' ][ strtolower( $name ) ] = $value;
    $args[ 'name' ] = $name;
    $args[ 'value' ] = $value;
    require_once( 'function.mtsetvar.php' );
    smarty_function_mtsetvar( $args, $ctx );
}
?>