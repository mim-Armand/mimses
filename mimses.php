<?php
// Session and NOUNCE manager function by mim.Armand - 2014
$isTokenOk = false;
$tok = $_SESSION['CSRFToken'];
session_name("mimses");
session_start();
if (isset($_SESSION['CSRFToken']) and isset($_POST['tok']) and $_POST['tok'] === $_SESSION['CSRFToken']) {
    $isTokenOk = true;
} else {
    $isTokenOk = false;
}
session_regenerate_id(TRUE);
$_SESSION['CSRFToken'] = UUIDGen(6);
$tok = $_SESSION['CSRFToken'];
function UUIDGen($len) {
    return bin2hex(openssl_random_pseudo_bytes($len, $cstrong));
}
?>