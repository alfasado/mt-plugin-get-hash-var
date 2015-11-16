<?php
function smarty_modifier_db2ts( $text, $arg ) {
    $mt = MT::get_instance();
    return $mt->db()->db2ts( $text );
}
?>