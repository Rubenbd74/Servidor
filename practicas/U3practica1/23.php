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
                        "hijos" => ["Bart", "Lisa", "Maggie"]
                    ],
                    "Los Griffin" => [
                        "padre" => "Peter",
                        "madre" => "Lois",
                        "hijos" => ["Chris", "Meg", "Stewie"]
                    ]
                ];

                implode("<br>", $familias);
                implode("<br>", $familias['Los Simpson']['hijos']);
                implode("<br>", $familias['Los Griffin']['hijos']);
                foreach ($familias as $key => $value) {
                    echo "<li> $key </li>";
                    foreach ($value as $key => $value) {
                        echo "<li> $value </li>";
                    }
                }
            ?>
        </ul>
    </body>
</html