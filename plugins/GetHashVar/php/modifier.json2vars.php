<?php
function smarty_modifier_json2vars( $json, $name ) {
    global $mt;
    $ctx =& $mt->context();
    $ctx->__stash[ 'vars' ][ $name ] = json_decode( $json, TRUE );
    return '';
}
?>