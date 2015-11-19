<?php
function smarty_function_mtsetglobalvar ( $args, &$ctx ) {
    require_once( 'function.mtsetvar.php' );
    smarty_function_mtsetvar( $args, $ctx );
    $global_vars = $ctx->stash( '__get_hash_var_global_vars' );
    if(! isset( $global_vars ) ) {
        $global_vars = array();
    }
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( $name ) {
        $global_vars[ $name ] = $ctx->__stash[ 'vars' ][ $name ];
    }
    $ctx->stash( '__get_hash_var_global_vars', $global_vars );
}
?>