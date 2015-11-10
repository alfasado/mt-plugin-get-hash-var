<?php
function smarty_function_mtgetarrayrand ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if (! $name ) return '';
    $array = $ctx->__stash[ 'vars' ][ $name ];
    if (! $array ) {
        $array = $ctx->__stash[ 'vars' ][ strtolower( $array ) ];
    }
    if ( is_array( $array ) ) {
        $id = array_rand( $array );
        return $array[ $id ];
    }
    return '';
}
?>