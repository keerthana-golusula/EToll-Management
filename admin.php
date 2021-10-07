<?php
include 'connection.php';
    if(isset($_GET["rmsubmit"])){
        echo "<script>show('removetollgatecont');</script>";
    echo "deleted";
        $query="DELETE FROM TOLLGATE WHERE TID=".$_GET["rmtoll"];
        $res=oci_parse($conn,$query);
        $exec=oci_execute($res);
        oci_commit($conn);
        if(!$exec)
        {
            echo "Invalid tollgate number";
        }
        else
            echo "successful";
    }
    ?>

<head>
    <title>vehicle user!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="styling.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
<br/>
<br />
<div class="container-fluid">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="addtollgatetab" data-toggle="tab" href="#addtollgatecont" role="tab" aria-controls="home" aria-selected="true">add tollgate</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="removetollgatetab" data-toggle="tab" href="#removetollgatecont" role="tab" aria-controls="profile" aria-selected="false">remove tollgate</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="changechargetab" data-toggle="tab" href="#changechargecont" role="tab" aria-controls="contact" aria-selected="false">Change toll charges</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="addtollgatecont" role="tabpanel" aria-labelledby="home-tab">
    <form method="POST" action="addop.php">
                        <label for="tollgateno">tollnumber:</label>
                    <input type="text" name ="tollgateno" placeholder="enter tollgateno" id="tollgateno"><br/>
                <label for="loc">location:</label>
                    <input type="text" id="loc" name="location"><br/>
        <table class=table>     
            <tr><th>single way</th> <th>up and down</th> <th>monthly pass</th></tr>
        <tr><td> car/van/jeep</td> <td><input type=text name="cs" ></td><td><input type=text name="cu" ></td><td><input type=text name="cm" ></td></tr>
            <tr><td> LCV </td><td><input type=text name="ls" ></td><td><input type=text name="lu" ></td><td><input type=text name="lm" ></td></tr>
        <tr><td>truck/bus</td><td> <input type=text name="ts" ></td><td><input type=text name="tu" ></td><td><input type=text name="tm" ></td></tr>
        <tr><td>upto 6 axle</td><td><input type=text name="ss" ></td><td><input type=text name="su" ></td><td><input type=text name="sm" ></td></tr>
        <tr><td> 7 or more axle </td><td><input type=text name="sevs" ></td><td><input type=text name="sevu" ></td><td><input type=text name="sevm" ></td></tr>
        </table>
                        <button type="submit" class="btn btn-default"> submit</button>
      </form></div>
  <div class="tab-pane fade" id="removetollgatecont" role="tabpanel" aria-labelledby="profile-tab"><label for="remove">enter tollgate to be removed</label>
    <form method="GET" action=""><input type="text" name="rmtoll">
      <button type="submit" class="btn btn-default" name="rmsubmit">remove</button></form></div>

    <div class="tab-pane fade" id="changechargecont" role="tabpanel">...</div>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <script src="tollgate.js"></script>
    <?php
    oci_close($conn);
    ?>