<?php

$data=json_decode(file_get_contents("http://localhost:8080/vidaequina/transporte"), true);
print_r($data);

echo "<br>";
echo "<br>";

for ($i=0; $i < count($data); $i++) { 
    
    echo "Id Transporte: ", $data[$i]["id_Transporte"],(", ");
    echo "Peso aprox: ", $data[$i]["peso_Aprox_Transporte"],(", ");
    echo "Numero de animales: ", $data[$i]["num_Animales_Transporte"],(", ");
    echo "Origen de Transporte: ", $data[$i]["origen_Transporte"],(", ");
    echo "Destino de Transporte: ", $data[$i]["destino_Transporte"],(", ");
    echo "Valor del Servicio: ", $data[$i]["valor_Transporte"]."<br>";
}

?>