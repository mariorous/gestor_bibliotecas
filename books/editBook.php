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
        <div class="divUpdateForm">
            <form action="" method="POST">
                <h2>Edición de "<?php echo $book_array['title']; ?>"</h2>
                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" value="<?php echo $book_array['title']; ?>" required>
                <label for="author">Autor:</label>
                <input type="text" id="author" name="author" value="<?php echo $book_array['author']; ?>" required>
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" value="<?php echo $book_array['isbn']; ?>" required>
                <label for="language">Lenguaje:</label>
                <input type="text" id="language" name="language" value="<?php echo $book_array['language']; ?>" required>
                <label for="id_library">Biblioteca:</label>
                <select name="id_library" id="id_library">
                    <option value="">Seleccione una biblioteca</option>
                    <?php
                    $query = 'SELECT * FROM library';
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) : ?>
                        <option value="<?php echo $row['id']; ?>" 
                            <?php echo ($row['id'] == $book_array['id_library']) ? 'selected' : ''; ?> >
                            <?php echo $row['name']; ?>
                        </option>
                    <?php endwhile; ?>
                    ?>
                    <a href="index.php">Volver</a>
                <input type="submit" value="Actualizar" name="updateBook">
                <a class="backButton"href="index.php">Volver</a>
            </form>
        </div>
        <?php if (isset($_POST['updateBook'])) : ?>
            <?php if (empty($_POST['title']) || empty($_POST['author']) || empty($_POST['isbn']) || empty($_POST['language']) || empty($_POST['id_library'])) : ?>
                <script>alert("Todos los campos son obligatorios")</script>;
            <?php else : ?>
                <?php
                    $update_query = "UPDATE book SET title = '" . $_POST['title'] . "', author = '" . $_POST['author'] . "', isbn = '" . $_POST['isbn'] . "', language = '" . $_POST['language'] . "', id_library = '" . $_POST['id_library'] . "' WHERE id = '" . $_POST['id'] . "'";
                    $update_result = mysqli_query($conn, $update_query);
                    header('Location: index.php');
                ?>
            <?php endif; ?>
        <?php endif; ?>
        </div>
    </body>
</html>