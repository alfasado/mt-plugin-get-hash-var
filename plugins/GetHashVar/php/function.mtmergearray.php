<?php
function smarty_function_mtmergearray ( $args, &$ctx ) {
    require_once( 'function.mtarraymerge.php' );
    return smarty_function_mtarraymerge ( $args, $ctx );
}
?>