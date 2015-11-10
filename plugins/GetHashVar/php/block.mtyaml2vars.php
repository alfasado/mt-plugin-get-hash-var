<?php
function smarty_block_mtyaml2vars( $args, $content, &$ctx, &$repeat ) {
    if ( isset( $content ) ) {
        if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
        $spyc = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'extlib' . 
            DIRECTORY_SEPARATOR . 'spyc' . DIRECTORY_SEPARATOR . 'spyc.php';
        require_once( $spyc );
        $array = Spyc::YAMLLoad( $content );
        if ( $name ) {
            # FIXME: str to lowercase
            $ctx->__stash[ 'vars' ][ $name ] = $array;
            $ctx->__stash[ 'vars' ][ strtolower( $name ) ] = $array;
        } else if ( array_values( $array ) !== $array ) {
            foreach ( $array as $key => $var ) {
                $ctx->__stash[ 'vars' ][ $key ] = $var;
                $ctx->__stash[ 'vars' ][ strtolower( $key ) ] = $var;
            }
        }
    }
    return '';
}
?>