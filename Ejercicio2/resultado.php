<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de amortizacion</title>
    <link rel="stylesheet" href="css/tables.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nobile&display=swap" rel="stylesheet">
</head>

<body>
    <section>
        <article>
            <div id="info">
                <table id="hor-zebra" summary="Tabla de multiplicar">
                    <caption>Calculadora de prestamos</caption>
                    <?php
                    if (isset($_POST['calcular'])) :
                        extract($_POST);
                        //Conversion a tipo fecha
                        $fechap=strtotime($fecha);
                        echo "<span>Fecha del prestamo: ".date("d-m-Y", $fechap)."</span><br>";
                        echo "<span>Tipo de interes: ".ucfirst($sistema)."</span><br>";
                        switch ($periodo) {
                            case 'diario':
                                $interes = $interes1;
                                $plazo = $plazo1;
                                $bandera = "day";
                                break;
                            
                            case 'semanal':
                                $interes = $interes2;
                                $plazo = $plazo2;
                                $bandera = "week";
                                break;
                            
                            case 'quincenal':
                                $interes = $interes3;
                                $plazo = $plazo3;
                                $bandera = "day";
                                break;
                            
                            case 'mensual':
                                $interes = $interes4;
                                $plazo = $plazo4;
                                $bandera = "month";
                                break;

                            case 'anual':
                                $interes = $interes5;
                                $plazo = $plazo5;
                                $bandera = "year";
                                break;

                            default:
                                # code...
                                break;
                        }
                        
                        //Variable general para el saldo
                        $saldo=$prestamo;
                        //Cuota constante francesa
                        $cuotafr = $prestamo*(($interes/100)/(1-pow(1+($interes/100),-$plazo)));

                        //Capital constante aleman
                        $capitalal = ($prestamo/$plazo);

                        //Interes constante americano
                        $interesam = ($prestamo*($interes/100));

                        //Interes simple
                        $interesim = ($prestamo*($interes/100));
                        $capitalsim = ($prestamo/$plazo);

                        //Interes compuesto
                        $interescom = ($prestamo*($interes/100));
                        $capitalcom = ($prestamo/$plazo);
                        
                        echo "<span>Monto: $".$prestamo." |||| Interes: ".$interes."%</span><br>";
                        echo "<span>Periodo: ".ucfirst($periodo)." |||| Plazo: ".$plazo."</span><br>";
                    
                echo "<thead>";
                    echo "<tr class=\"thead\">";
                    echo "<th scope=\"col\">Fecha</th>";
                    echo "<th scope=\"col\">Cuota</th>";
                    echo "<th scope=\"col\">Capital</th>";
                    echo "<th scope=\"col\">Interes</th>";
                    echo "<th scope=\"col\">Saldo</th>";
                    echo" </tr>";
                echo "</thead>";
                echo "<tbody> ";

                        for ($i=0; $i <=$plazo ; $i++) { 

                            switch ($sistema) {
                                case 'frances':
                                    # Formulas
                                    if ($i==0) {
                                        # No se calcula nada, solo se muestra el saldo
                                        echo "\t<tr class=\"odd\">\n";
                                        echo "\t\t<td>\n". date("d-m-Y", $fechap)."\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$" .$prestamo."\n</td>\n";
                                        echo "\t</tr>\n";
                                    }
                                    else {
                                        # Se hacen los respectivos calculos
                                        $intereses = $saldo * ($interes/100);
                                        $capital = $cuotafr - $intereses;
                                        $saldo = $saldo - $capital;

                                        echo "\t<tr class=\"odd\">\n";
                                        if ($periodo=='quincenal') {
                                            # Contando quincenas
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.($i*15).' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        else{
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.$i.' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        echo "\t\t<td>\n$" .round($cuotafr,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($capital,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($intereses,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($saldo,2)."\n</td>\n";
                                        echo "\t</tr>\n";
                                    }
                                    
                                    break;

                                case 'aleman':
                                    # Formulas
                                    if ($i==0) {
                                        //Mostrando fecha de adquisicion y total
                                        echo "\t<tr class=\"odd\">\n";
                                        echo "\t\t<td>\n". date("d-m-Y", $fechap)."\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$" .$prestamo."\n</td>\n";
                                        echo "\t</tr>\n";
                                        $intereses = $saldo * ($interes/100);
                                    }
                                    else {
                                        # Se hacen los respectivos calculos                                        
                                        $cuotaal = $capitalal + $intereses;
                                        $saldo = $saldo - $capitalal;                                        

                                        echo "\t<tr class=\"odd\">\n";
                                        if ($periodo=='quincenal') {
                                            # Contando quincenas
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.($i*15).' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        else{
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.$i.' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        echo "\t\t<td>\n$" .round($cuotaal,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($capitalal,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($intereses,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($saldo,2)."\n</td>\n";
                                        echo "\t</tr>\n";
                                        $intereses = $saldo * ($interes/100);
                                    }
                                    break;

                                case 'americano':
                                    if ($i==0) {
                                        //Mostrando fecha de adquisicion y total
                                        echo "\t<tr class=\"odd\">\n";
                                        echo "\t\t<td>\n". date("d-m-Y", $fechap)."\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$" .$prestamo."\n</td>\n";
                                        echo "\t</tr>\n";
                                    }
                                    elseif ($i==$plazo) {
                                        //En el ultimo mes, se paga por completo el prestamo junto con el interes
                                        echo "\t<tr class=\"odd\">\n";
                                        if ($periodo=='quincenal') {
                                            # Contando quincenas
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.($i*15).' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        else{
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.$i.' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        echo "\t\t<td>\n$" .($prestamo+round($interesam,2))."\n</td>\n";
                                        echo "\t\t<td>\n$" .$prestamo."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($interesam,2)."\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t</tr>\n";
                                    }
                                    else {
                                        //Se van pagando solo los intereses por periodo
                                        echo "\t<tr class=\"odd\">\n";
                                        if ($periodo=='quincenal') {
                                            # Contando quincenas
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.($i*15).' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        else{
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.$i.' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        echo "\t\t<td>\n$" .round($interesam,2)."\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$" .round($interesam,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .$prestamo."\n</td>\n";
                                        echo "\t</tr>\n";
                                    }
                                    break;

                                case 'simple':
                                    if ($i==0) {
                                        //Mostrando fecha de adquisicion y total
                                        echo "\t<tr class=\"odd\">\n";
                                        echo "\t\t<td>\n". date("d-m-Y", $fechap)."\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$" .$prestamo."\n</td>\n";
                                        echo "\t</tr>\n";
                                    }
                                    else {
                                        $cuotasim = $capitalsim + $interesim;
                                        $saldo = $saldo - $capitalsim;

                                        echo "\t<tr class=\"odd\">\n";
                                        if ($periodo=='quincenal') {
                                            # Contando quincenas
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.($i*15).' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        else{
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.$i.' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        echo "\t\t<td>\n$" .round($cuotasim,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($capitalsim,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($interesim,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($saldo,2)."\n</td>\n";
                                        echo "\t</tr>\n";
                                    }

                                    break;
                                    
                                case 'compuesto':
                                    if ($i==0) {
                                        //Mostrando fecha de adquisicion y total
                                        echo "\t<tr class=\"odd\">\n";
                                        echo "\t\t<td>\n". date("d-m-Y", $fechap)."\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$0\n</td>\n";
                                        echo "\t\t<td>\n$" .$prestamo."\n</td>\n";
                                        echo "\t</tr>\n";
                                    }
                                    else {
                                        $cuotacom = $capitalcom + $interescom;
                                        $saldo = $saldo - $capitalcom;

                                        echo "\t<tr class=\"odd\">\n";
                                        if ($periodo=='quincenal') {
                                            # Contando quincenas
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.($i*15).' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        else{
                                            echo "\t\t<td>\n". date("d-m-Y",strtotime ( '+'.$i.' '.$bandera.'' , strtotime ( $fecha ) ) )."\n</td>\n";
                                        }
                                        echo "\t\t<td>\n$" .round($cuotacom,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($capitalcom,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($interescom,2)."\n</td>\n";
                                        echo "\t\t<td>\n$" .round($saldo,2)."\n</td>\n";
                                        echo "\t</tr>\n";

                                        $interescom = $interescom*(1+($interes/100));
                                    }
                                    break;

                                default:
                                    # code...
                                    break;
                            }
                        }
                                             
                    else:
                        echo "\t<tr class\"odd\">\n";
                        echo "\t\t<td>No se han ingresado desde el formulario.</td>";
                        echo "\t</tr>\n";
                    endif;
                        
                    ?>
                    </tbody>
                </table>
                <div id="link">
                    <a href="amortizacion.php" class="button-link">Nueva amortizacion</a>
                </div>
            </div>
        </article>
    </section>
</body>

</html>