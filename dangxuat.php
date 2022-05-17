<?php include("connect_db/connection_db.php");
    session_start();
  
            session_destroy();
            header('Location: index.php');
        
?>