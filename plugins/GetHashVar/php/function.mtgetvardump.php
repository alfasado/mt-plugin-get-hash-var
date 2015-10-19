<?php
function smarty_function_mtgetvardump ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    ob_start();
    if ( $name ) {
        echo "${name} => \n";
        var_dump( $ctx->__stash[ 'vars' ][ $name ] );
    } else {
        var_dump( $ctx->__stash[ 'vars' ] );
    }
    $dump = ob_get_contents();
    ob_end_clean();
    require_once( 'MTUtil.php' );
    $dump = encode_html( $dump );
    $dump = '<pre><code style="overflow:auto">' . $dump . '</code></pre>';
    return $dump;
}
?>