<?php
function smarty_modifier_mtignore( $text, $arg ) {
    if ( $arg ) {
        return '';
    }
    return $text;
}
?>