<?php
function smarty_function_mtarraysort ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'kind' ] ) ) $kind = $args[ 'kind' ];
    if ( isset( $args[ 'scope' ] ) ) $scope = $args[ 'scope' ];
    if ( isset( $args[ 'order' ] ) ) $order = $args[ 'order' ];
    if ( isset( $args[ 'sort_order' ] ) ) $order = $args[ 'sort_order' ];
    if ( $scope == 'value' ) {
        $scope = 'var';
    } else if (! $scope ) {
        $scope = 'key';
    }
    if (! $kind ) {
        $kind = 'numeric';
    }
    $strcmp = NULL;
    if ( $kind == 'str' ) {
        $strcmp = 'strcmp';
    }
    if (! $order ) {
        $order = 'ascend';
    }
    $array = $ctx->__stash[ 'vars' ][ $name ];
    if (! $array ) {
        $array = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
    }
    if (! $array ) {
        return '';
    }
    if ( array_values( $array ) === $array ) {
        if ( $order == 'ascend' ) {
            sort( $array, $strcmp );
        } else {
            rsort( $array, $strcmp );
        }
    } else {
        if ( ( $scope == 'key' ) && ( $order == 'ascend' ) ) {
            ksort( $array, $strcmp );
        } else if ( ( $scope == 'key' ) && ( $order == 'descend' ) ) {
            krsort( $array, $strcmp );
        } else if ( ( $scope == 'var' ) && ( $order == 'ascend' ) ) {
            asort( $array, $strcmp );
        } else if ( ( $scope == 'var' ) && ( $order == 'descend' ) ) {
            arsort( $array, $strcmp );
        }
    }
    $ctx->__stash[ 'vars' ][ $name ] = $array;
}
?>