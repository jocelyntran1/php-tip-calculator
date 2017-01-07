<!DOCTYPE html>
<html>

  <head>

    <title> Jocelyn Tran's Tip Calculator </title>
    <link rel="stylesheet" type="text/css" href="index.css">
	  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

  </head>

  <body>
    <h1> Tip Calculator </h1>


    <form action="index.php" method="post">
    <p>Bill subtotal: 

      <?php
        if( isset( $_POST["subtotal"] )) {
          $bill = $_POST['subtotal'];
          echo "<input type=\"number\" step=\"any\" name=\"subtotal\"value=\"$bill\" required>";
        } else {
          echo "<input type=\"number\" step=\"any\" name=\"subtotal\" required>";
        }
      ?>

    </p>

    <p> Tip Percentage:

    <?php

      $tips = array( 10, 15, 20 );
      foreach( $tips as $i ) {
        if( isset( $_POST["tip_percent"] ) && $_POST["tip_percent"] == $i ) {
          echo "<input type=\"radio\" name=\"tip_percent\" required checked value=\"$i\"/> $i%";
        } else {
          echo "<input type=\"radio\" name=\"tip_percent\" required value=\"$i\"/> $i%";
        }
      } 
     
    ?>

    </p>

    <p> Split:

      <?php
        if( isset( $_POST["num_people"] )) {
          $people = $_POST['num_people'];
          echo "<input type=\"number\" min=\"1\"
            name=\"num_people\" value=\"$people\" required>person(s)";
        } else {
          echo "<input type=\"number\" min=\"1\" name=\"num_people\" value=\"1\"
            required>person(s)";
        }
      ?>

    </p>

    <input type=submit>
    </form>

    <br>

    <?php
    if( isset( $_POST["subtotal"]) && isset( $_POST["tip_percent"])) {
      if( $_POST["subtotal"] > 0 ) {
        
        echo "<table>";
        $tip = $_POST["tip_percent"]/100 * $_POST["subtotal"];
        echo "<tr><td>Tip: $" . number_format( $tip, 2) . "</td></tr>";
        $total = $tip + $_POST["subtotal"];
        echo "<tr><td>Total: $". number_format( $total, 2) . "</td><tr>";

        if( $_POST["num_people"] > 1 ) {
          $tip_each = $tip / $_POST["num_people"];
          echo "<tr><td>Tip Each: $" . number_format( $tip_each, 2) . "</td></tr>";
          $total_each = $total / $_POST["num_people"];
          echo "<tr><td>Total Each: $". number_format( $total_each, 2) . "</td><tr>";
        }
        
        echo "</table>";

      } else {
        echo "Please enter a bill amount above $0";
      }

    }
    ?>  
  </form>

</body>
</html>
