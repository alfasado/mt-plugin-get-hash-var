<?php
function smarty_function_mtgetarrayvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'num' ] ) ) $index = $args[ 'num' ] - 1;
    if ( isset( $args[ 'index' ] ) ) $index = $args[ 'index' ];
    if ( isset( $args[ 'scope' ] ) ) $scope = $args[ 'scope' ];
    if (! $name ) return '';
    if (! isset( $index ) ) {
        return '';
    }
    $array = $ctx->__stash[ 'vars' ][ $name ];
    if (! $array ) {
        $array = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
    }
    if ( is_array( $array ) ) {
        if ( array_values( $array ) === $array ) {
            if ( isset( $array[ $index ] ) ) {
                return $array[ $index ];
            }
        } else {
            $i = 0;
            if (! $scope ) $scope = 'key';
            foreach ( $array as $key => $var ) {
                if ( $i == $index ) {
                    if ( $scope == 'key' ) {
                        return $key;
                    } else {
                        return $var;
                    }
                }
                $i++;
            }
        }
    }
    return '';
}
?>