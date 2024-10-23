<?php
    if(isset($_POST["num1"]) && $_POST["num2"]){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        switch($_POST["boton"]){
            case "Suma":
                echo $num1, " + ", $num2, " es ", $num1+$num2;
            break;
            case "Resta":
                echo $num1, " - ", $num2, " es ", $num1-$num2;
            break;
            case "Mult":
                echo $num1, " x ", $num2, " es ", $num1*$num2;
            break;
            case "Division":
                echo $num1, " / ", $num2, " es ", $num1/$num2;
            break;
        }
    }
?>
<html>
    <body> 
        <form method="post" action="#"> 
          <label for="int">A :</label>
          <input type="text" name="num1" value="<?php echo isset($_POST["num1"]) ? $_POST["num1"] : ''; ?>">
          <label for="int">B :</label>
          <input type="text" name="num2" value="<?php echo isset($_POST["num2"]) ? $_POST["num2"] : ''; ?>"><br><br>
          <input type="submit" name="boton" value="Suma">
          <input type="submit" name="boton" value="Resta">
          <input type="submit" name="boton" value="Mult">
          <input type="submit" name="boton" value="Division">
        </form> 
    </body> 
</html>