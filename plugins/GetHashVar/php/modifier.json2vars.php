<?php
function smarty_modifier_json2vars( $json, $name ) {
    global $mt;
    $ctx =& $mt->context();
    $json = json_decode( $json, TRUE );
    $ctx->__stash[ 'vars' ][ $name ] = $json;
    $ctx->__stash[ 'vars' ][ strtolower( $name ) ] = $json;
    return '';
}
?>