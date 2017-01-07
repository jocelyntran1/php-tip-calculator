<!DOCTYPE html>
<html>
  <head>
  </head>
  <title> Jocelyn Tran's Tip Calculator </title>
  <body>
    <h1> Tip Calculator </h1>


    <form action="index.php" method="post">
    <p>Bill subtotal: 

      <?php
        if( isset( $_POST["subtotal"] )) {
          $bill = $_POST['subtotal'];
          echo "<input type=\"number\" name=\"subtotal\"value=\"$bill\" required>";
        } else {
          echo "<input type=\"number\" name=\"subtotal\" required>";
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
    <input type=submit>
    </form>

    <br>

    <?php
    if( isset( $_POST["subtotal"]) && isset( $_POST["tip_percent"])) {
      if( $_POST["subtotal"] > 0 ) {

        $tip = $_POST["tip_percent"]/100 * $_POST["subtotal"];
        echo "Tip: $" . number_format( $tip, 2);
        $total = $tip + $_POST["subtotal"];
        echo "Total: $". number_format( $total, 2);
      } else {
        echo "Please enter a bill amount above $0";
      }

    }
    ?>  
  </form>

</body>
</html>
