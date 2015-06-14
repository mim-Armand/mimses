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
- it will start and create a session on server, sending the session id to client to refrence later through cookies,
- on the server it generates a UUID (with definable strength, default to 12 chars) and keeps it in the session variables (this would be out NONCE check value)
- it regenerate and re-assign both session ID and UUID in each http request (Yeah! Updates the cookie even on AJAX requests! AJAX is an standard http request!) and updates both client cookie and server sessions
- you can modify cookie and session parameters to address your requirments if neccessary (by default they use your server's defaults)
- **You just need to send back the UUID saved serverside (in `$_SESSION['CSRFToken'];`) back to the client either using javascript or embedding it somewhere in the DOM (like a hidden form element) and make the client send it back in their next request so we'll check if it's the same and give them a new one for next request! (that's *NONCE* !)**
- For ease of use a global variable is assigned to UUID, it's called ` $tok`
- checking for the NONCE and session checks are very easy, if these checks pass, a global var named `$isTokenOk` will be `true`, otherwise `false`, that's it!

>###Example:
- put the test.php and mimses.php files on your server and open the test.php URL file in your browser
- copy the following javascript function and run it through your browser console (F12)
```javascript
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
```
> #### Next:
- [ ] prepare more examples
  - [x] simple AJAX examples
  - [ ] more production ready AJAX
  - [ ] some php samples
- [ ] add parameters
  - [x] cookie parameters
  - [x] global security variables (like the strength of UUID)
  - [ ] add more encryption options like BCRYPT for paranoidic reasons! :ghost:
- [ ] add some security improvments like:
  - [x] frequency of request alerts
  - [ ] IP change alerts
  - [ ] time limit alerts


I'll try to update this document and provide use cases but let me know if you need them so I'll add priorities,
Please let me know if you see a bug or think something is wrong, I'm still learning! :)
