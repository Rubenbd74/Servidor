<html>
    <head>
    <!-- Crea un array multidimensional para poder guardar los componentes de dos 
    familias: “Los Simpson” y “Los Griffin” dentro de cada familia ha de constar el 
    padre, la madres y los hijos, donde padre, madre e hijos serán los índices 
    y los nombres serán los valores. Esta estructura se ha de crear en un solo 
    array asociativo de tres dimensiones.

    Familia "Los Simpson": padre: "Homer", madre: "Marge", hijos: "Bart", "Lisa", "Maggie"
    Familia "Los Griffin": padre: "Peter", madre: "Lois", hijos: "Chris", "Meg", "Stewie"

    Muestra los valores de las dos familias en una lista no numerada -->
    </head>
    <body>
        <ul>
            <?php
                $familias = [
                    "Los Simpson" => [
                        "padre" => "Homer",
                        "madre" => "Marge",
                        "hijos" => [
                            1 => "Bart", 
                            2 => "Lisa", 
                            3 => "Maggie"
                        ]
                    ],

                    "Los Griffin" => [
                        "padre" => "Peter",
                        "madre" => "Lois",
                        "hijos" => [
                            1 => "Chris", 
                            2 => "Meg", 
                            3 => "Stewie"
                        ]
                    ]
                ];
                foreach ($familias as $key => $value) {
                    echo "<li> $key </li>";
                    echo "<ul>";
                    echo "<li>Padre: ", $value["padre"] . "</li>";
                    echo "<li>Madre: ", $value["madre"] . "</li>";
                    echo "<li>Hijos: ";
                    echo "<ul>";
                    foreach ($value["hijos"] as $value) {
                        echo "<li> $value </li>";
                    }
                    echo "</ul>";
                    echo "</li>";
                    echo "</ul>", "</br>";
                }
                echo "</ul>";
            ?>
        </ul>
    </body>
</html