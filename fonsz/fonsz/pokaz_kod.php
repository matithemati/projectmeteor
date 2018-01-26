<?php if( isset( $_GET['kod'] ) ) {

  $kod = highlight_string( file_get_contents( $_SERVER['SCRIPT_FILENAME'] ), 1 );

  die( '<meta charset="utf-8"><style>

code{ background: #ccc; display: inline-block; font: bold 18px "Courier New"; padding: 5px; margin: 0; word-wrap: break-word; box-sizing: border-box; width: 100%; }

</style><code>'. $kod .'</code>' );

}