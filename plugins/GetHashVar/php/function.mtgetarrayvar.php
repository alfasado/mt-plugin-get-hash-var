<?php
function smarty_function_mtgetarrayvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'num' ] ) ) $index = $args[ 'num' ] - 1;
    if ( isset( $args[ 'index' ] ) ) $index = $args[ 'index' ];
    if (! $name ) return '';
    if (! isset( $index ) ) {
        return '';
    }
    $array = $ctx->__stash[ 'vars' ][ $name ];
    if ( is_array( $array ) ) {
        if ( isset( $array[ $index ] ) ) {
            return $array[ $index ];
        }
    }
}
?>