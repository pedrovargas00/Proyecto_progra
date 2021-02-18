<?php

    class EvaluacionTarea{

        var $erroresResumen;
        var $erroresEnsayo;
        var $erroresReporte;
        var $erroresMapa;
        var $erroresResumenCorto;
        var $materia;
        var $tema;
        var $forma_ensenanza;
        var $tipo_tarea;
        var $acciones;
        var $numeroErrores;
        var $reprobados;
        var $server;
        var $usuario;
        var $pass;
        var $bd;
        var $conexion;

        public function __construct(){
            $this->erroresResumen = [40, 20, 30, 10];
            $this->erroresEnsayo = [30, 30, 40];
            $this->erroresReporte = [10, 10, 30, 20, 20, 10];
            $this->erroresMapa = [50, 50];
            $this->erroresResumenCorto = [20, 40, 20];
            $this->reprobados = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            $this->materia = 1;
            $this->tema = rand(1, 7);
            $this->forma_ensenanza = rand(1, 11);
            //$this->tipo_tarea = 'resumen';
            //$this->acciones = 'resumen';
            $this->tipo_tarea = $this->devolverElemento(['Resumen', 'Ensayo', 'Reporte', 'Mapa', 'Codigo', 'ResumenCorto'], array_rand(['Resumen', 'Ensayo', 'Reporte', 'Mapa', 'Codigo', 'ResumenCorto'], 1));
            $this->acciones = $this->devolverElemento(['Resumen', 'Ensayo', 'Reporte', 'Mapa', 'Codigo', 'ResumenCorto'], array_rand(['Resumen', 'Ensayo', 'Reporte', 'Mapa', 'Codigo', 'ResumenCorto'], 1));
            $this->numeroErrores = 0;
            $this->server = "localhost";
            $this->usuario = "root";
            $this->pass = "";
            $this->bd = "curso";
        }     

        function devolverElemento($arr, $i){

            return $arr[$i];
        }
        
        function rubricaResumen(&$numeroErrores, &$res){

            $calificacion = 0;
            $numeroErrores = rand(0,4);
            if($numeroErrores > 1){
                $res[0] = $this->devolverElemento([0, 10, 20, 30, 40], array_rand([0, 10, 20, 30, 40], 1));
                $res[1] = $this->devolverElemento([0, 7, 14, 20], array_rand([0, 7, 14, 20], 1));
                $res[2] = $this->devolverElemento([0, 10, 20, 30], array_rand([0, 10, 20, 30], 1));
                $res[3] = $this->devolverElemento([0, 3, 6, 10], array_rand([0, 3, 6, 10], 1));                
            }else{
                $res[0] = 40;
                $res[1] = 20;
                $res[2] = 30;
                $res[3] = 10;
            }

            for($i = 0; $i < 4; $i++){
                $calificacion += $res[$i];
            }

            return $calificacion / 10;
        }

        function rubricaEnsayo(&$numeroErrores, &$res){

            $calificacion = 0;
            $numeroErrores = rand(0,4);
            if($numeroErrores > 1){
                $res[0] = $this->devolverElemento([0, 10, 20, 30], array_rand([0, 10, 20, 30], 1));
                $res[1] = $this->devolverElemento([0, 20, 25, 30], array_rand([0, 20, 25, 30], 1));
                $res[2] = $this->devolverElemento([0, 10, 20, 30, 40], array_rand([0, 10, 20, 30, 40], 1));
            }else{
                $res[0] = 30;
                $res[1] = 30;
                $res[2] = 30;
            }
            
            for($i = 0; $i < 3; $i++){
                $calificacion += $res[$i];
            }

            return $calificacion / 10;
        }

        function rubricaReporte(&$numeroErrores, &$res){

            $calificacion = 0;
            $numeroErrores = rand(0,4);
            if($numeroErrores > 2){
                $res[0] = $this->devolverElemento([0, 5, 10], array_rand([0, 5, 10], 1));
                $res[1] = $this->devolverElemento([0, 5, 10], array_rand([0, 5, 10], 1));
                $res[2] = $this->devolverElemento([0, 10, 20, 30], array_rand([0, 10, 20, 30], 1));
                $res[3] = $this->devolverElemento([0, 10, 20], array_rand([0, 10, 20], 1));
                $res[4] = $this->devolverElemento([0, 10, 20], array_rand([0, 10, 20], 1));
                $res[5] = $this->devolverElemento([0, 10], array_rand([0, 10], 1));
            }else{
                $res[0] = 10;
                $res[1] = 10;
                $res[2] = 30;
                $res[3] = 20;
                $res[4] = 20;
                $res[5] = 10;
            }

            for($i = 0; $i < 6; $i++){
                $calificacion += $res[$i];
            }

            return $calificacion / 10;
        }

        function rubricaMapa(&$numeroErrores, &$res){

            $calificacion = 0;
            $numeroErrores = rand(0,4);
            if($numeroErrores > 0){
                $res[0] = $this->devolverElemento([0, 10, 30, 50], array_rand([0, 10, 30, 50], 1));
                $res[1] = $this->devolverElemento([0, 30, 50], array_rand([0, 30, 50], 1));
            }else{
                $res[0] = 50;
                $res[1] = 50;
            }

            for($i = 0; $i < 2; $i++){
                $calificacion += $res[$i];
            }

            return $calificacion / 10;
        }

        function rubricaCodigo(&$numeroErrores){
            $numeroErrores = rand(0,5);
            if($numeroErrores >= 2){
                return array_rand([5, 7, 8, 9, 10], 1);
            }else{
                return 10;
            }
        }

        function rubricaResumenCorto(&$numeroErrores ,&$res){

            $calificacion = 0;
            $numeroErrores = rand(0,4);
            if($numeroErrores > 1){
                $res[0] = $this->devolverElemento([0, 10, 20], array_rand([0, 10, 20], 1));
                $res[1] = $this->devolverElemento([0, 20, 40, 60], array_rand([0, 20, 40, 60], 1));
                $res[2] = $this->devolverElemento([0, 10, 20], array_rand([0, 10, 20], 1));
            }else{
                $res[0] = 20;
                $res[1] = 60;
                $res[2] = 20;
            }

            for($i = 0; $i < 3; $i++){
                $calificacion += $res[$i];
            }

            return $calificacion / 10;
        }

        function errores($tipo_tarea, &$numeroErrores, &$erroresResumen, &$erroresEnsayo, &$erroresReporte, &$erroresMapa, &$erroresResumenCorto){

            switch($tipo_tarea){
                //Resumen
                case "Resumen":
                    return $this->rubricaResumen($numeroErrores, $erroresResumen);
                //Ensayo
                case "Ensayo":
                    return $this->rubricaEnsayo($numeroErrores, $erroresEnsayo);
                //Reporte técnico
                case "Reporte":
                    return $this->rubricaReporte($numeroErrores, $erroresReporte);
                //Mapa conceptual
                case "Mapa":
                    return $this->rubricaMapa($numeroErrores, $erroresMapa);
                //Código de programa
                case "Codigo":
                    return $this->rubricaCodigo($numeroErrores);
                //Resumen corto - rúbrica = 3
                case "ResumenCorto":
                    return $this->rubricaResumenCorto($numeroErrores, $erroresResumenCorto);
            }
        }

        function enviarCorreo($to, $subject){

            $tamanio = sizeof($this->reprobados);
            $message = "Buen día. Este correo es para darle a conocer que han reprobado $tamanio de alumnos.";

            mail($to, $subject, $message);
        }

        function mostrar(){

            $k = 0;
            $aux = [0, 0, 0, 0, 0, 0];
            $this->conexion = mysqli_connect($this->server, $this->usuario, $this->pass, $this->bd) or die ("Error en la conexión");
            if ($this->conexion->connect_error) {
                die("Connection failed: " . $this->conexion->connect_error);
            }            
            echo "<table text-align:center; border=5;>";
            echo "<tr>";
            echo "<td> MATRICULA </td>";
            echo "<td> MATERIA </td>";
            echo "<td> TEMA </td>";
            echo "<td> FORMA DE ENSEÑAR </td>";
            echo "<td> TIPO DE TAREA </td>";
            echo "<td> NUMERO DE ERRORES </td>";    
            echo "<td colspan=6> PUNTAJE </td>";
            echo "<td> CALIFICACIÓN </td>";
            echo "<td> ACCCIÓN </td>";
            echo "</tr>";
            for($i = 0; $i < 20; $i++){
                echo "<tr>";
                //Matrícula
                $matricula = rand(201300000, 201700000);
                $calificacion = $this->errores($this->tipo_tarea, $this->numeroErrores, $this->erroresResumen, $this->erroresEnsayo, $this->erroresReporte, $this->erroresMapa, $this->erroresResumenCorto);
                //Mostrar en tabla los datos
                echo "<td> $matricula </td>";
                echo "<td> $this->materia </td>";
                echo "<td> $this->tema </td>";
                echo "<td> $this->forma_ensenanza </td>";
                echo "<td> $this->tipo_tarea </td>";
                echo "<td> $this->numeroErrores </td>";
                //errores
                switch($this->tipo_tarea){
                    //Resumen
                    case "Resumen":
                        foreach($this->erroresResumen as $ar){
                            echo "<td> $ar </td>";
                            $aux[$k] = $ar;
                            $k++;
                        }
                        $k = 0;
                        //$consultaCal_curso = "UPDATE calificacion_curso SET error1 = '$aux[0]', error2 = '$aux[1]', error3 = '$aux[2]', error4 = '$aux[3]', error5 = '0', error6 = '0'";
                        //$this->resultado = mysqli_query($this->conexion, $consultaCal_curso);
                        echo "<td>  </td>";
                        echo "<td>  </td>";
                        break;
                    //Ensayo
                    case "Ensayo":
                        foreach($this->erroresEnsayo as $ar){
                            echo "<td> $ar </td>";      
                            $aux[$k] = $ar;
                            $k++;
                        }
                        $k = 0;
                        //$consultaCal_curso = "UPDATE calificacion_curso SET error1 = '$aux[0]', error2 = '$aux[1]', error3 = '$aux[2]', error4 = '0', error5 = '0', error6 = '0'";
                        //$this->resultado = mysqli_query($this->conexion, $consultaCal_curso);
                        echo "<td>  </td>";
                        echo "<td>  </td>";
                        echo "<td>  </td>";
                    break;
                    //Reporte técnico
                    case "Reporte":
                        foreach($this->erroresReporte as $ar){
                            echo "<td> $ar </td>";
                            $aux[$k] = $ar;
                            $k++;
                        }
                        $k = 0;
                        //$consultaCal_curso = "UPDATE calificacion_curso SET error1 = '$aux[0]', error2 = '$aux[1]', error3 = '$aux[2]', error4 = '$aux[3]', error5 = '$aux[4]', error6 = '$aux[5]'";
                        //$this->resultado = mysqli_query($this->conexion, $consultaCal_curso);
                    break;
                    //Mapa conceptual
                    case "Mapa":
                        foreach($this->erroresMapa as $ar){
                            echo "<td> $ar </td>";
                            $aux[$k] = $ar;
                            $k++;
                        }
                        $k = 0;
                        //$consultaCal_curso = "UPDATE calificacion_curso SET error1 = '$aux[0]', error2 = '$aux[1]', error3 = '0', error4 = '0', error5 = '0', error6 = '0'";
                        //$this->resultado = mysqli_query($this->conexion, $consultaCal_curso);
                        echo "<td>  </td>";
                        echo "<td>  </td>";
                        echo "<td>  </td>";
                        echo "<td>  </td>";
                    break;
                    //Código de programa
                    case "Codigo":
                        for($i = 0; $i < 6; $i++)
                            echo "<td>  </td>";
                            //$consultaCal_curso = "error1 = '$this->erroresResumen[0]', error2 = '$this->erroresResumen[1]', error3 = '$this->erroresResumen[2]',
                            //                      error4 = '$this->erroresResumen[3]', error5 = '0', error6 = '0'";
                            //$this->resultado = mysqli_query($this->conexion, $consultaCal_curso);
                    //Resumen corto - rúbrica = 3
                    break;
                    case "ResumenCorto":
                        foreach($this->erroresResumenCorto as $ar){
                            echo "<td> $ar </td>";
                            $aux[$k] = $ar;
                            $k++;
                        }
                        $k = 0;
                        //$consultaCal_curso = "UPDATE calificacion_curso SET error1 = '$aux[0]', error2 = '$aux[1]', error3 = '$aux[2]', error4 = '0', error5 = '0', error6 = '0'";
                        //$this->resultado = mysqli_query($this->conexion, $consultaCal_curso);
                        echo "<td>  </td>";
                        echo "<td>  </td>";
                        echo "<td>  </td>";
                    break;
                }
                echo "<td> $calificacion </td>";
                if($calificacion < 10){
                    echo "<td> $this->acciones </td>";
                }else{
                    echo "<td> - </td>";
                }
                if($calificacion < 6 && $k < 10){
                    $this->reprobados[$k] = $calificacion;
                }
                echo "</tr>";
                $consultaCal_curso = "INSERT INTO calificacion_curso (materia, matricula, tema, forma_enseniar, tipo_tarea, num_errores, error1, error2, error3, error4, error5, error6, calificacion, accion)
                                     VALUES ('$this->materia', '$matricula', '$this->tema', '$this->forma_ensenanza', '$this->tipo_tarea', '$this->numeroErrores',
                                     '$aux[0]', '$aux[1]', '$aux[2]', '$aux[3]', '$aux[4]', '$aux[5]','$calificacion', '$this->acciones');";
                $consultaCurso = "UPDATE curso SET ";
                $consultaEvaluacion = "UPDATE evaluacion SET ";
                $this->resultado = mysqli_query($this->conexion, $consultaCal_curso);
            }
            //$this->enviarCorreo("beth9812lizz@gmail.com", "calificaciones");
        }
    }
?>