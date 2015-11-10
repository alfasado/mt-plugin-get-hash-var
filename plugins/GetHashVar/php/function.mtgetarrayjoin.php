<?php
function smarty_function_mtgetarrayjoin ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'glue' ] ) ) $glue = $args[ 'glue' ];
    if (! $name ) return '';
    if (! isset( $glue ) ) {
        $glue = '';
    }
    $array = $ctx->__stash[ 'vars' ][ $name ];
    if (! $array ) {
        $array = $ctx->__stash[ 'vars' ][ strtolower( $array ) ];
    }
    if ( is_array( $array ) ) {
        return implode( $glue, $array );
    }
    return '';
}
?>