<?php
include_once "cliente.php";

//CREATE
// $cliente = new cliente();
// $cliente->correo = "estebandiaczun@gmail.com";
// $cliente->nombre = "Esteban";
// $cliente->edad = 21;
// $cliente->create();

//UPDATE
// $cliente = cliente::getByEmail("elbrayan@hotmail.com");
// $cliente->nombre = "Estebanelmascapode todos los programadores";
// $cliente->update();

//DELETE
// $cliente = cliente::getByEmail("elbrayan@hotmail.com");
// $cliente->delete();

//READ
$clientes = Cliente::ReadAll();
?>
<table>
    <thead>
        <tr>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Edad</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($clientes as $cliente) { ?>
            <tr>
                <td><?php echo $cliente->correo;?></td>
                <td><?php echo $cliente->nombre;?></td>
                <td><?php echo $cliente->edad;?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>