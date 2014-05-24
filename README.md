> MIMSES.
> ======
> ######Minimalist Sesion managment for PHP.
***
> Keep things simple!

> MIMSES is a very simple php script I wrote to manage Sessions and Nonces in my applications, it respects all the security issues I knew about sessions and Nonces, although may not perfect but can be updated to be more and more close to that state of existance! anyway! it's SUPER DUPER simple and it's a goof thing!


>Usage:
>just include the file in your php files:
>
```php
<?php
include_once ("mimses.php");
?>
```
> or just copy paste the code in your php files (at the begining of it), then:
- it will start and create a session on server, sending the session id to client to refrence later through ciikies,
- on the server it generates a UUID (with definable strength, default to 12 chars) and keeps it in the session variables (this would be out NONCE check value)
- it regenerate and re-assign both session ID and UUID in each http request (Yeah! Updates the cookie even on AJAX requests! AJAX is an standard http request!) and updates both client cookie and server sessions
- you can modify cookie and session parameters to address your requirments if neccessary (by default they use your server's defaults)
- **You just need to send back the UUID saved serverside (in `$_SESSION['CSRFToken'];`) back to the client either using javascript or embedding it somewhere in the DOM (like a hidden form element) and make the client send it back in their next request so we'll check if it's the same and give them a new one for next request! (that's *NONCE* !)**
- For ease of use a global variable is assigned to UUID, it's called ` $tok`
- checking for the NONCE and session checks are very easy, if these checks pass, a global var named `$isTokenOk` will be `true`, otherwise `false`, that's it!


I'll try to update this document and provide use cases but let me know if you need them so I'll add priorities,
Please let me know if you see a bug or think something is wrong, I'm still learning! :)