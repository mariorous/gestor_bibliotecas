<?php

include_once '../db/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/books.css">
    <title>Libros</title>
</head>
<body>
        <?php
        $search_term = mysqli_real_escape_string($conn, $_POST['search']);
        $query = "SELECT title, author, isbn, language, id_library, COUNT(*) as stock 
                FROM book 
                WHERE title LIKE '%$search_term%' 
                    OR author LIKE '%$search_term%' 
                    OR isbn LIKE '%$search_term%' 
                GROUP BY isbn, id_library 
                ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        ?>
        <div class="container">
            <div class="divTable">
                <table>
                    <tr>
                        <th class="tableHeaderLeft">TÍTULO</th>
                        <th>AUTOR</th>
                        <th>ISBN</th>
                        <th>LENGUAJE</th>
                        <th>UBICACIÓN</th>
                        <th>STOCK</th>
                        <th class="tableHeaderRight">ACCIONES</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td class="textLeft"><?php echo $row['title']; ?></td>
                            <td class="textLeft"><?php echo $row['author']; ?></td>
                            <td><?php echo $row['isbn']; ?></td>
                            <td><?php echo $row['language']; ?></td>
                            <td><?php echo $row['id_library']; ?></td>
                            <td><?php echo $row['stock']; ?></td>
                            <td class="rowButtons">
                                <form action="books/showBook.php" method="POST">
                                    <button type="submit" class="searchButton"><i class="fas fa-search"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
</body>
</html>