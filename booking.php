<?php
      require_once("DBconnect.php");
      $sql = "SELECT * FROM  cars ";
      $result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html>
  <head>
    <title>Booking | Car Showroom</title>
  </head>
  <style type="text/css">
    #header{
      background-color: #000000;
      height: 60px;
      font-family: fantasy;
      padding: 10px;
    }

    #menu_bar{
      padding: 8px;
      float: right;
    }

    #menu_buttons{
      width: 100px;
      height: 20px;
      text-align: center;
      border-radius: 4px;
        display: inline-block;
        margin: 2px;
        background-color: #facb52;
        font-family: tahoma;
        font-weight: bold;
    }

    #form_box{
      height: 170px;
      width: 330px;
      background-color:white;
      padding: 30px;
      border-radius: 5px;
      border: solid 1px black;
      font-family: tahoma;
      font-weight: bold;
    }

    #car_list{
    }

  </style>
  <body style="background-color: #ffcd36">
    <!== menu bar ==>
    <section id = "header">
        <div class = "row">
            <div class ="col-md-2" style="font-size: 30px;color:#f2ae00;">Car Showroom</div>
            <div id="menu_bar" class ="col-md-10" style="text-align: right">
                <div id="menu_buttons"><a href="home.php">HOME</a></div>
                <div id="menu_buttons"><a href="show_cars.php">CARS</a></div>
                <div id="menu_buttons"><a href="search.php">SEARCH</a></div>
                <div id="menu_buttons"><a href="booking.php">BOOKING</a></div>
                <div id="menu_buttons"><a href="inquiries.php">INQUIRIES</a></div>
            </div>
        </div>
    </section>

    <section id = "section1">
        <br><br>
        <div style="font-weight: bold; font-family: tahoma;" class="title"> <p>BOOK A Car: </p></div>
        <div style="width: 50%; position: absolute;">
            <form id="form_box" action="carBooking.php" class="form_design" method="post">
              Name: <input type="text" name="name"><br>
              Phone Number: <input type="number" name="phoneno"><br>
              Email: <input type="text" name="email"><br>
              Date: <input type="date" name="date"><br>
              Car Model: <input type="text" name="cModel"><br>
              Credit Card Info: <input type="text" name="cci"><br><br>
              <input style="background-color:#ffcd36;font-family: tahoma;border-radius: 4px;border: solid 1.5px black;" type="submit" value="Add Request">
            </form>

        </div>
        <div id = "car_list">
          <div id="car_table">
                <table align="center" border="lpx" style="width:600px; line-height:40px;">
                  <tr>
                    <th colspan="5"><h2>Car Catalogue</h2></th>
                  </tr>
                  <t>
                    <th>Model</th>
                    <th>Avaibility</th>
                    <th>Manufacturer</th>
                    <th>Price</th>
                    <th>Feature</th>
                  </t>
                    <?php

                    while($row = mysqli_fetch_array($result)){
                        //some html code, close php
                    ?>
                    <tr>
                      <td><?php echo $row[0];?></td>
                      <td><?php echo $row[1];?></td>
                      <td><?php echo $row[2];?></td>
                      <td><?php echo $row[3];?></td>
                      <td><?php echo $row[4];?></td>
                    </tr>

                    <?php
                      }


                    ?>
                </table>
          </div>
        </div>
    </section>


  </body>
</html>
