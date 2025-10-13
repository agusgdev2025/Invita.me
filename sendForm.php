<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['address'] ?? '';
    $people = $_POST['pais'] ?? '';

    // Validar si se enviaron los valores
    if (!empty($nombre) && !empty($email) && !empty($telefono) && !empty($people)) {
        // Ruta y nombre del archivo
        $ruta_archivo = "./baseDatos.txt";

        // Verificar si el archivo existe
        $archivo_existe = file_exists($ruta_archivo);

        // Obtener el n�mero de registros actuales o inicializar en 0 si el archivo no existe
        $num_registros = 0;
        if ($archivo_existe) {
            $lineas = file($ruta_archivo, FILE_SKIP_EMPTY_LINES);
            foreach ($lineas as $linea) {
                if (preg_match('/^\d+\./', $linea)) {
                    $num_registros++;
                }
            }
        }

        // Incrementar el n�mero de registros para el nuevo registro
        $num_registros++;

        // Abrir el archivo en modo de escritura
        $file = fopen($ruta_archivo, "a");
        if ($file) {
            // Escribir la cabecera si el archivo no existe
            if (!$archivo_existe) {
                fwrite($file, "Id \tNombre   \t\tEmail   \t\t\Telefono \t\tAsistentes" . PHP_EOL);
                fwrite($file, "=========================================================================" . PHP_EOL);
            }

            // Escribir el nuevo registro en el archivo con el formato requerido
            fwrite($file, "$num_registros.\t$nombre\t\t\t$email\t\t\t$telefono\t\t$people" . PHP_EOL);
            fwrite($file, " -------------------------------------------------------------------------" . PHP_EOL);

            // Cerrar el archivo
            fclose($file);

            // Redirigir a una p�gina espec�fica
         //   header('Location: index.html');
            exit();
        } else {
            echo "Error al abrir el archivo.";
        }
    } else {
        echo "Por favor, completa todos los campos del formulario.";
    }
} else {
    echo "Acceso inv�lido.";
}