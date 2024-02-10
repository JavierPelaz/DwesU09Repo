<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DWES: Tarea 9</title>
        <style>
        p {
            font-style: italic;
            color: #666;
            margin-bottom: 10px; 
        }
        ul {
            list-style-type: none; 
            padding: 0; 
        }
        li {
            margin-bottom: 5px; 
        }
        li::before {
            content: "•"; 
            color: #333; 
            display: inline-block;
            width: 1em; 
            margin-left: -1em; 
        }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    </head>
    <body>
    <h1> ESTOS SON LOS DATOS </h1>
    <?php
        /**
         * Función para mostrar los nombres de los Pokémon.
         *
         * Esta función realiza una solicitud a la API para obtener datos de especies de Pokémon y muestra una lista de nombres de Pokémon.
         *
         * @return void
         */
        function mostrarNombresPokemon() {
            // Se realiza la petición a la API que nos devuelve el JSON con la información de los Pokémon
            $datos_json = file_get_contents('https://pokeapi.co/api/v2/pokemon-species/');
            // Se decodifica el archivo JSON y se convierte en un objeto
            $datos = json_decode($datos_json);  

            if ($datos && isset($datos->results)) {
                // Muestra la lista de nombres de Pokémon
                echo "<p><strong>Lista de Nombres de Pokémon:</strong></p>";
                echo "<ul>";
                foreach ($datos->results as $pokemon) {
                    echo "<li>{$pokemon->name}</li>";
                }
                echo "</ul>";
            } else {
                // Muestra un mensaje de error si falla la obtención de datos
                echo "<p>Error: No se pudieron obtener los datos de los Pokémon.</p>";
            }
        }

        // Llama a la función para mostrar los nombres de los Pokémon
        mostrarNombresPokemon();
    ?>    
    </body>
</html>
