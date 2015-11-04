<?php
function smarty_block_mtyaml2vars( $args, $content, &$ctx, &$repeat ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if (! $name ) return '';
    if ( isset( $content ) ) {
        $spyc = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'extlib' . 
            DIRECTORY_SEPARATOR . 'spyc' . DIRECTORY_SEPARATOR . 'spyc.php';
        require_once( $spyc );
        $array = Spyc::YAMLLoad( $content );
        $ctx->__stash[ 'vars' ][ $name ] = $array;
    }
    return '';
}
?>