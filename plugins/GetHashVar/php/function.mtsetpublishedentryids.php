<?php
function smarty_function_mtsetpublishedentryids ( $args, &$ctx ) {
    if ( isset( $args[ 'entry_ids' ] ) ) $ids = $args[ 'entry_ids' ];
    if (! $ids ) return '';
    if ( is_array( $ids ) ) {
        foreach ( $ids as $id ) {
            $_REQUEST[ 'entry_ids_published' ][ $id ] = 1;
        }
    }
}
?>