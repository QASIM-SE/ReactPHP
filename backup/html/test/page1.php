<!DOCTYPE html>
<html>
    <head>
        <script>

            var xtel = new XMLHttpRequest();
// replace 123.123.123.123 with the correct IP address
xtel.open("POST", "http://47.241.91.38/test/page1.php", true);
// you won't be able to get a proper response from the telnet server 
xtel.onreadystatechange = function () {return true;} 
xtel.send("valid command 1" + "\n" + "valid command 2" + "\n");
        </script>
    </head>
<body>

<h2>Text input fields</h2>

<!-- message form -->

<form action="#" method="post">

  <input type="text" name="message">
  <input type="submit" value="Send">
</form>


</body>
</html>

