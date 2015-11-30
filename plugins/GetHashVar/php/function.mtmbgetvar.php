<?php
function smarty_function_mtmbgetvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if (! $name ) return '';
    if ( strpos( $name, '$' ) === 0 ) {
        $name = preg_replace( '/^\$/', '', $name );
        $_name = $ctx->__stash[ 'vars' ][ $name ];
        if (! $_name ) {
            $_name = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
        }
        $name = $_name;
    }
    if ( $value = $ctx->__stash[ 'vars' ][ $name ] ) {
        return $value;
    }
    $args[ 'name' ] = $name;
    require_once( 'function.mtvar.php' );
    return smarty_function_mtvar( $args, $ctx );
}
?>