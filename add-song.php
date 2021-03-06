<?php
    require_once __DIR__ . '/ArtistQuery.php';
    require_once __DIR__ . '/GenreQuery.php';
    require_once __DIR__ . '/Song.php';

    $artist_query = new ArtistQuery();
    $genre_query = new GenreQuery();

    if (isset($_POST['title']) && isset($_POST['artist']) &&
        isset($_POST['genre']) && isset($_POST['price'])) {
        $title = $_POST['title'];
        $artist_id = $_POST['artist'];
        $genre_id = $_POST['genre'];
        $price = $_POST['price'];

        $song = new Song($title, $artist_id, $genre_id, $price);
        $song->save();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Song</title>
</head>

<body>
    <div></div>
    <form method="post">
        <div>
            Title: <input type="text" name="title">
        </div>
        <div>
            Artists:
            <select name="artist">
                <?php foreach($artist_query->getAll() as $artist) : ?>
                    <option value="<?php echo $artist->artist_id ?>">
                        <?php echo $artist->artist_name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            Genre:
            <select name="genre">
                <?php foreach($genre_query->getAll() as $genre) : ?>
                    <option value="<?php echo $genre->genre_id ?>">
                        <?php echo $genre->genre ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            Price: <input type="text" name="price">
        </div>
        <input type="submit" value="Add Song">
    </form>
    <br>
    <?php if (isset($_POST['title']) && isset($_POST['artist']) && isset($_POST['genre']) && isset($_POST['price'])) : ?>
        <p>
            The song <?php echo $song->getTitle() ?>
            with an ID of <?php echo $song->getId() ?>
            was inserted successfully!
        </p>
    <?php endif; ?>
</body>
</html>