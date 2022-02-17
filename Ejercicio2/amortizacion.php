<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de tabla de amortizacion</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/activo.js"></script>
</head>
<body>
    <header>
        <h1 name="titulo" id="titulo">Calculadora de tabla de amortizacion</h1>
    </header>

    <form action="resultado.php" method="POST" name="formulario" id="formulario">        
        <span>Sistema de amortizacion: </span>
        <select name="sistema" id="sistema">
            <option value="">Seleccione una opción</option>
            <option value="frances">Frances</option>
            <option value="aleman">Aleman</option>
            <option value="americano">Americano</option>
            <option value="simple">Simple</option>
            <option value="compuesto">Compuesto</option>
        </select><br><br>
        <span>Fecha del desembolso: </span>
        <?php
        // Obteniendo la fecha actual del sistema con PHP
         $fechaActual = date('Y-m-d');
        echo ("<input name=\"fecha\" id=\"fecha\" type=\"date\" min=\"$fechaActual\" required>");
        ?>
        <br><br>
        <span>Importe del prestamo: </span>
        <input name="prestamo" id="prestamo" type="number" min="1" step="0.01" required>
        <br><br>
        <span>Periodo: </span>
        <select name="periodo" id="periodo">
            <option value="">Seleccione una opción</option>
            <option value="diario">Diario</option>
            <option value="semanal">Semanal</option>
            <option value="quincenal">Quincenal</option>
            <option value="mensual">Mensual</option>
            <option value="anual">Anual</option>
        </select><br><br>
        <div id = "diario">
            <span>Interes diario: </span>
            <input name="interes1" id="interes1" type="number" min="0" step="0.0001">
            <span> %</span>
            <br><br>
            <span>Plazo: </span>
            <input name="plazo1" id="plazo1" type="number" min="1" step="1">
            <span> dias</span>
            <br><br>
        </div>
        <div id = "semanal">
            <span>Interes semanal: </span>
            <input name="interes2" id="interes2" type="number" min="0" step="0.0001">
            <span> %</span>
            <br><br>
            <span>Plazo: </span>
            <input name="plazo2" id="plazo2" type="number" min="1" step="1">
            <span> semanas</span>
            <br><br>
        </div>
        <div id = "quincenal">
            <span>Interes quincenal: </span>
            <input name="interes3" id="interes3" type="number" min="0" step="0.0001">
            <span> %</span>
            <br><br>
            <span>Plazo: </span>
            <input name="plazo3" id="plazo3" type="number" min="1" step="1">
            <span> quincenas</span>
            <br><br>
        </div>
        <div id = "mensual">
            <span>Interes mensual: </span>
            <input name="interes4" id="interes4" type="number" min="0" step="0.0001">
            <span> %</span>
            <br><br>
            <span>Plazo: </span>
            <input name="plazo4" id="plazo4" type="number" min="1" step="1">
            <span> meses</span>
            <br><br>
        </div>
        <div id = "anual">
            <span>Interes anual: </span>
            <input name="interes5" id="interes5" type="number" min="0" step="0.0001">
            <span> %</span>
            <br><br>
            <span>Plazo: </span>
            <input name="plazo5" id="plazo5" type="number" min="1" step="1">
            <span> años</span>
            <br><br>
        </div>
        <input type="submit" name="calcular" id="calcular" value="Calcular">
    </form>
    
</body>
</html>