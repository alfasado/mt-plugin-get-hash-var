<?php
function smarty_function_mtarraysearch ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'var' ] ) ) $value = $args[ 'var' ];
    if ( isset( $args[ 'scope' ] ) ) $scope = $args[ 'scope' ];
    if ( (! $name ) && (! $value ) ) return '';
    $var = $ctx->__stash[ 'vars' ][ $name ];
    if (! $var ) {
        $var = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
    }
    if (! $var ) {
        if ( isset( $args[ 'var' ] ) ) $var = $args[ 'var' ];
    }
    if ( $var ) {
        if ( is_array( $var ) ) {
            if ( array_values( $var ) === $var ) {
                $key = array_search( $value, $var );
                if ( $key !== FALSE ) {
                    return $key;
                }
            } else {
                $i = 0;
                if (! $scope ) $scope = 'key';
                foreach ( $var as $key => $val ) {
                    if ( $scope == 'key' ) {
                        if ( $key == $value ) {
                            return $i;
                        }
                    } else {
                        if ( $val == $value ) {
                            return $i;
                        }
                    }
                    $i++;
                }
            }
        }
    }
    return '';
}
?>