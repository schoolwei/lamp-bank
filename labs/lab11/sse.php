<?php
header("Cache-Control: no-store");
header("Content-Type: text/event-stream");

while (true) {
    echo 'data: ' . `./bme280` . "\n\n";
    ob_end_flush();
    flush();
    if (connection_aborted()) break;
    sleep(0.5);
}

?>