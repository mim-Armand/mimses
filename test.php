<?php
include_once ("mimses.php");
if(isAjax()){
echo $tok;
die;
}
echo 'isTokenOk: ' . $isTokenOk . 'here it will be false because when you refresh the page you dont have a token already but if you put a link it will work ( you need to send the token through get or post tho)<br>';
echo 'token in the time of page load: <b style="color: red;">' . $tok . '</b><br> look at the console and try to copy paste the JS function in this page to do some AJAX requests qnd see the output on console';
function isAjax() {

    // this function is to check whether it is an AJAX call or a simple page load.
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MIMSES v 0.02</title>
</head>
<body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1-rc2/jquery.min.js"></script>
<script type="text/javascript">
    tok = "<?php $_SESSION[CSRFToken] ?>";
    $.ajax({// Here we use JQuery but it works with or without it
            type: 'POST',
            url:'test.php',
            data: {
                tok: tok, // here you send the token with other data you wanna send
                some: "other data"
            },
            success: function(res, status, xhr) {
                tok = res; // here server just answer with token but if you have (and sure you do) more complex answer you should parse it and assign the token variable to a var to use it in your next request
                console.log("new recieved tiken is: " + res);
            },
            error: function(xhr, status, err) {
                console.log('ERR! ' + err)
            }
        });
  </script>
</body>
</html>