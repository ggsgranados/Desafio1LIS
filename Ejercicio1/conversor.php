<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilodivisa.css">
    <title>Conversor de divisas</title>    
</head>
<body>
    <form method="post" name="formulario" id="formulario">
        <span id="titulo" name="titulo">MiConversor</span>
        <img name="imgcalc" id="imgcalc" src="img/calculator.png" alt="calculadora de divisas"><br>
        <input type="number" name="numero" id="numero" min="0.00" step="0.01" placeholder="0.00">
        <br>
        <select name="cbinicial" id="cbinicial">
            <option value="dolar" select>🇺🇸 Dolar Estadounidense</option>
            <option value="euro" >🇪🇺 Euro</option>
            <option value="yen">🇯🇵 Yen Japones</option>
            <option value="libra">🇬🇧 Libra Esterlina</option>
        </select><br>
        <input type="submit" name="convertir" id="convertir" value="Convertir a"><br>
        <select name="cbfinal" id="cbfinal">
            <option value="dolar" select>🇺🇸 Dolar Estadounidense</option>
            <option value="euro">🇪🇺 Euro</option>
            <option value="yen">🇯🇵 Yen Japones</option>
            <option value="libra">🇬🇧 Libra Esterlina</option>
        </select><br>
        
        <?php
            if (isset($_POST['convertir'])) {
                if ($_POST['numero']>0 ):
                    switch($_POST['cbinicial']):
                        case 'dolar':
                            if ($_POST['cbfinal']=='dolar') {
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Dolar estadounidense<br>=<br>' .$_POST['numero']. ' Dolar estadounidense</p>';
                            }
                            elseif($_POST['cbfinal']=='euro'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Dolar estadounidense<br>=<br>' .round($_POST['numero']*0.88,2). ' Euros</p>';
                            }
                            elseif($_POST['cbfinal']=='yen'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Dolar estadounidense<br>=<br>' .round($_POST['numero']*115.71,2). ' Yenes</p>';
                            }
                            elseif($_POST['cbfinal']=='libra'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Dolar estadounidense<br>=<br>' .round($_POST['numero']*0.74,2). ' Libras</p>';
                            }
                        break;
                        case 'euro':
                            if ($_POST['cbfinal']=='euro') {
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Euros<br>=<br>' .$_POST['numero']. ' Euros</p>';
                            }
                            elseif($_POST['cbfinal']=='dolar'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Euros<br>=<br>' .round($_POST['numero']*1.14,2). ' Dolar estadounidense</p>';
                            }
                            elseif($_POST['cbfinal']=='yen'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Euro<br>=<br>' .round($_POST['numero']*131.42,2). ' Yenes</p>';
                            }
                            elseif($_POST['cbfinal']=='libra'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Euro<br>=<br>' .round($_POST['numero']*0.84,2). ' Libras</p>';
                            }
                        break;
                        case 'yen':
                            if ($_POST['cbfinal']=='yen') {
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Yenes<br>=<br>' .$_POST['numero']. ' Yenes</p>';
                            }
                            elseif($_POST['cbfinal']=='euro'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Yenes<br>=<br>' .round($_POST['numero']*0.0076,2). ' Euro</p>';
                            }
                            elseif($_POST['cbfinal']=='dolar'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Yenes<br>=<br>' .round($_POST['numero']*0.0086,2). ' Dolar estadounidense</p>';
                            }
                            elseif($_POST['cbfinal']=='libra'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Yenes<br>=<br>' .round($_POST['numero']*0.0064,2). ' Libras</p>';
                            }
                        break;
                        case 'libra':
                            if ($_POST['cbfinal']=='libra') {
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Libras<br>=<br>' .$_POST['numero']. 'Libras</p>';
                            }
                            elseif($_POST['cbfinal']=='euro'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Libras<br>=<br>' .round($_POST['numero']*1.19,2). ' Euro</p>';
                            }
                            elseif($_POST['cbfinal']=='yen'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Libras<br>=<br>' .round($_POST['numero']*156.60,2). ' Yenes</p>';
                            }
                            elseif($_POST['cbfinal']=='dolar'){
                                echo '<p name="texto" id="texto">' .$_POST['numero']. ' Libras<br>=<br>' .round($_POST['numero']*1.35,2). ' Dolar estadounidense</p>';
                            }
                        break;
                    endswitch;
                
                else:
                    echo '<p name="texto" id="texto">Ingrese la cantidad a convertir</p>';
                endif;
            }            
        ?>
    </form>
</body>
</html>