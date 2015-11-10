<?php
require_once( 'MTUtil.php' );
function smarty_block_mtloopwithsort ( $args, $content, &$ctx, &$repeat ) {
    if (! isset( $content ) ) {
        $ctx->localize( $localvars );
        if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
        if ( isset( $args[ 'kind' ] ) ) $kind = $args[ 'kind' ];
        if ( isset( $args[ 'scope' ] ) ) $scope = $args[ 'scope' ];
        if ( isset( $args[ 'order' ] ) ) $order = $args[ 'order' ];
        if ( $scope == 'value' ) {
            $scope = 'var';
        } else if (! $scope ) {
            $scope = 'key';
        }
        if (! $kind ) {
            $kind = 'numeric';
        }
        $strcmp = NULL;
        if ( $kind == 'string' ) {
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
            $repeat = FALSE;
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
            $_array = array();
            foreach ( $array as $key => $value ) {
                array_push( $_array, array( $key => $value ) );
            }
            $array = $_array;
        }
        $counter = 0;
        $ctx->stash( 'sorted_array', $array );
    } else {
        $array = $ctx->stash( 'sorted_array' );
        $counter = $ctx->stash( '_array_counter' );
    }
    if (! count( $array ) ) {
        $ctx->restore( $localvars );
        return '';
    }
    $lastn = count( $array );
    if ( $counter < $lastn ) {
        $var = $array[ $counter ];
        $ctx->stash( '_array_counter', $counter + 1 );
        $count = $counter + 1;
        $ctx->__stash[ 'vars' ][ '__counter__' ] = $count;
        if ( is_array( $var ) ) {
            foreach ( $var as $key => $value ) {
                $ctx->__stash[ 'vars' ][ '__key__' ] = $key;
                $ctx->__stash[ 'vars' ][ '__value__' ] = $value;
            }
        } else {
            $ctx->__stash[ 'vars' ][ '__key__' ] = $counter;
            $ctx->__stash[ 'vars' ][ '__value__' ] = $value;
        }
        $ctx->__stash[ 'vars' ][ '__odd__' ]     = ( $count % 2 ) == 1;
        $ctx->__stash[ 'vars' ][ '__even__' ]    = ( $count % 2 ) == 0;
        $ctx->__stash[ 'vars' ][ '__first__' ]   = $count == 1;
        $ctx->__stash[ 'vars' ][ '__last__' ]    = ( $count == $lastn );
        $repeat = TRUE;
    } else {
        $ctx->restore( $localvars );
        $repeat = FALSE;
    }
    return $content;
}
?>