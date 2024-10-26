<?php

include_once '../db/db.php';

$book_data = "SELECT * FROM book WHERE id = '" . $_POST['id'] . "'";
$book_result = mysqli_query($conn, $book_data);
$book_array = mysqli_fetch_assoc($book_result);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Libros</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="../css/books.css">
    </head>
    <body>
        <h2>¿Estás seguro que quieres eliminar el libro "<?php echo $book_array['title']; ?>"?</h2>
        <div class="confirmDeleteContainer">
            <a href="index.php">Volver</a>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                <button type="submit" name="confirmDeleteBook" class="confirmDelete">Eliminar</button>
            </form>
        </div>
        <?php
        if (isset($_POST['confirmDeleteBook'])) {
            $delete_query = "DELETE FROM book WHERE id = '" . $_POST['id'] . "'";
            $delete_result = mysqli_query($conn, $delete_query);
            header('Location: index.php');
        }
        ?>
        </div>
    </body>
</html>