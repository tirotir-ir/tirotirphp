<?php
// Redirect to another page. Must run before any output.
header("Location: welcome.php");
exit(); // always stop the script after a redirect
