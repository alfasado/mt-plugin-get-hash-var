<?php
function smarty_function_mtmergehash ( $args, &$ctx ) {
    require_once( 'function.mtarraymerge.php' );
    return smarty_function_mtarraymerge ( $args, $ctx );
}
?>