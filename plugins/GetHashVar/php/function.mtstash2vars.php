<?php
function smarty_function_mtstash2vars ( $args, &$ctx ) {
    if ( isset( $args[ 'stash' ] ) ) $stash = $args[ 'stash' ];
    if (! $stash ) return '';
    $data = $ctx->stash( $stash );
    if ( is_object( $data ) ) {
        $values = $data->GetArray();
        if ( $data->has_meta() ) {
            $meta = $data->get_meta_info()[ $stash ];
            if ( is_array( $meta ) ) {
                foreach ( $meta as $key => $value ) {
                    $field_name = $stash . '_' . str_replace( '.', '_', $key );
                    $values[ $field_name ] = $data->$key;
                }
            }
        }
        foreach ( $values as $key => $value ) {
            $ctx->__stash[ 'vars' ][ $key ] = $value;
        }
    }
    return '';
}
?>