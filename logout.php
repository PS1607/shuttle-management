<?php

  session_unset();
  session_destroy();

  echo '<script type="text/javascript">
    alert("Successfully Logged Out!")
       window.location="index.php";
      </script>'; 

?>