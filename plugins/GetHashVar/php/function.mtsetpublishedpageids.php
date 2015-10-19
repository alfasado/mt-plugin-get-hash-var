<?php
function smarty_function_mtsetpublishedpageids ( $args, &$ctx ) {
    require_once( 'function.mtsetpublishedentryids.php' );
    return smarty_function_mtsetpublishedentryids( $args, $ctx );
}
?>