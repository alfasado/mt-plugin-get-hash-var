<?php
function smarty_function_mtgetarrayvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'num' ] ) ) $num = $args[ 'num' ];
    if ( (! $name ) || (! $num ) ) return '';
    $array = $ctx->__stash[ 'vars' ][ $name ];
    if ( is_array( $array ) ) {
        if ( isset( $array[ $num ] ) ) {
            $num--;
            return $array[ $num ];
        }
    }
}
?>