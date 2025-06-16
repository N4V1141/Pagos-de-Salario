<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empleado = $_POST["empleado"];
    $horas = $_POST["horas"];
    $categoria = $_POST["categoria"];

    // Selecciona pago por hora y nombre de categoría
    if ($categoria == "A") {
        $pagoHora = 450;
        $nombreCategoria = "Jefe";
    } elseif ($categoria == "B") {
        $pagoHora = 350;
        $nombreCategoria = "Administrativo";
    } elseif ($categoria == "C") {
        $pagoHora = 350;
        $nombreCategoria = "Operador";
    } elseif ($categoria == "D") {
        $pagoHora = 150;
        $nombreCategoria = "Practicante";
    } else {
        $pagoHora = 0;
        $nombreCategoria = "Desconocida";
    }

    $salarioBruto = $horas * $pagoHora;
    $descuento = $salarioBruto * 0.10;
    $salarioNeto = $salarioBruto - $descuento;
    ?>
    <h2>Resultados</h2>
    <hr>
    Nombre del empleado: <?php echo htmlspecialchars($empleado); ?>
    <hr>
    Horas trabajadas: <?php echo $horas; ?>
    <hr>
    Categoría: <?php echo $nombreCategoria; ?>
    <hr>
    Salario Bruto: $<?php echo number_format($salarioBruto, 2); ?>
    <hr>
    Descuento (10%): $<?php echo number_format($descuento, 2); ?>
    <hr>
    <strong>Salario Neto: $<?php echo number_format($salarioNeto, 2); ?></strong>
    <hr>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Calcular otro salario</a>
    <?php
} else {
    ?>
    <h2>Calcular Salario de Empleado</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Nombre del empleado:</label>
        <input type="text" name="empleado" required><br><br>
        <label>Horas trabajadas:</label>
        <input type="number" name="horas" min="1" required><br><br>
        <label>Categoría:</label>
        <select name="categoria" required>
            <option value="">Seleccione...</option>
            <option value="A">Jefe ($450)</option>
            <option value="B">Administrativo ($350)</option>
            <option value="C">Operador ($350)</option>
            <option value="D">Practicante ($150)</option>
        </select><br><br>
        <input type="submit" value="Calcular">
    </form>
    <?php
}
?>