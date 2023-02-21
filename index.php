<?php
    include_once './model/connect.php';
    include_once './model/func.php';
    $today = date("Y-m-d");
    $obj = new func();
    $result = $obj->getRabbit();
    $obj->checkdate($today);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");
        body{
            background-color: #F1FFFD;
        }
        .form{
            background-color: white;
            border-radius: 10px;  
        }
    </style>
</head>
<body>
            <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand">Fram</a>
                <form class="d-flex">
                    <!-- <button type="button" class="btn" id="liveToastBtn"><i class="bi bi-bell"></i></button> -->

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img width="20"src="https://cdn-icons-png.flaticon.com/512/523/523442.png" class="rounded me-2" alt="...">
      <strong class="me-auto">Rabbit Fram</strong>
      <small></small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <?php
        foreach($result as $row){
            if(isset($_SESSION[$row['name']])){
    ?>      
            <div class="toast-body">
            <?php
            echo $_SESSION[$row['name']];
            
            ?>
            </div>

    <?php
        }
     }
     session_unset();
    ?>

  </div>
</div> 
                </form>
            </div>
            </nav>
        <br><br>
    <div class="container">
    <div class="row">
    <div class="col-4"></div>
    <div class="col-4 form">
        <br>
    <h4 style="text-align:center;">Welcome to Rabbit Fram</h4>
    <br>
    <table id="customers">
    <tr>
    <th>ID</th>
    <th>Name</th> 
    <th>Date</th>
    </tr>
    <?php
    foreach($result as $row){
    ?>
    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['date']?></td>
    </tr>
    <?php
    }
    ?>
    </table>
    <br><br>
    </div>
    <div class="col-4"></div>
    <br><br>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script>
        window.onload = (event) => {
            let myAlert = document.querySelector('.toast');
            let bsAlert = new bootstrap.Toast(myAlert);
            bsAlert.show();
        }
     </script>
    
</body>
</html>