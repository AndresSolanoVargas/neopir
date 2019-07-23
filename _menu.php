<?php 

    function barraUsuario(){
        if(isset($_SESSION['usuario'])){
            $sql = "Call NombreCorreo(". $_SESSION['usuario'] .");";
            $con = conectar();
            $respuesta = $con->query($sql);
            if($respuesta->num_rows >0){
                $fila = $respuesta->fetch_assoc();
                ?>
                <li>
                    <a>Bienvenido: <?php echo $fila['Nombre']." ".$fila['Apellido1']." ".$fila['Apellido2']; ?></a>
                </li>
                <li>
                    <a href="cerrar.php">Cerrar Sessión</a>
                </li>
            <?php
            } else { ?> 
            <li>
                <a href="login.html">registro</a>
            </li>
            <li>
                <a href="login.html">iniciar sesión</a>
            </li>
            <?php
            } 
            $con->close();
        } else { ?> 
            <li>
                <a href="login.html">registro</a>
            </li>
            <li>
                <a href="login.html">iniciar sesión</a>
            </li>
        <?php
        }
    }
    
    function menu(){
        ?>
            <li>
              <a href="index.php">inicio</a>
            </li>
        <?php    
        if(isset($_SESSION['usuario'])){
            $sql = "SELECT Rol FROM usuarios where Cedula = ".$_SESSION['usuario'].";";
            $con = conectar();
            $respuesta = $con->query($sql);
            $fila = $respuesta->fetch_assoc();
            switch($fila['Rol']){
                case 1://evaluación, fechas, preguntas, variables
                    ?>
                        <li>
                            <a href="examenesxfecha.php">evaluación</a>
                        </li>
                        <li>
                            <a href="fechaprueba.html">fechas</a>
                        </li>
                        <li>
                            <a href="preguntas.html">preguntas</a>
                        </li>
                        <li>
                            <a href="#">variables</a>
                        </li>
                    <?php
                    break;
                case 2://evaluación, fechas, preguntas, 
                    ?>
                        <li>
                            <a href="examenesxfecha.php">evaluación</a>
                        </li>
                        <li>
                            <a href="fechaprueba.html">fechas</a>
                        </li>
                        <li>
                            <a href="preguntas.html">preguntas</a>
                        </li>
                    <?php
                    break;
                case 3:// inicio, matricula, ingresoprueba;
                    ?>
                        <li>
                            <a href="#">matrícula</a>
                        </li>
                        <li>
                            <a href="ingresarprueba.php">prueba</a>
                        </li>
                    <?php
                    break;
            }
        }
    }

?>