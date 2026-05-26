<?php
function randomByUsername($data) {
    $username = get_current_user();
    echo $data[hexdec(substr(hash('sha256', $username), 0, 8)) % count($data)];
    if (isset($_GET['username']) && $_GET['username'] !== '') {
        $username = $_GET['username'];
        $index = hexdec(substr(hash('sha256', $username), 0, 8)) % count($data);
        echo '<br>'. $data[$index];
        }
}
?>