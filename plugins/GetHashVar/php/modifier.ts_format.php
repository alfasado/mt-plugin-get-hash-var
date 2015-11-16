<?php
function smarty_modifier_ts_format( $text, $arg ) {
    $mt = MT::get_instance();
    $ctx =& $mt->context();
    $text = $mt->db()->db2ts( $text );
    $args = array( 'ts' => $text, 'format' => $arg );
    return $ctx->_hdlr_date( $args, $ctx );
}
?>