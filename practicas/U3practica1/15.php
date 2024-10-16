<html>
<head>
<!-- Crea un array con los nombre Pedro, Ismael, Sonia, Clara, Susana, Alfonso y 
Teresa. Muestra el número de elementos que contiene y cada elemento en una 
lista no numerada de html -->
</head>
<body>
    <ul>
        <?php
            $nombres = array("Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa");

            echo "El array contiene ", count($nombres), " elementos";
            foreach ($nombres as $key => $value) {
                echo "<li> $value </li>";
            }
        ?>
    </ul>
</body>

</html>


