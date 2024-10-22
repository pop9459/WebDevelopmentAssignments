<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>

    <link rel="stylesheet" href="./spotify.css" type="text/css">
</head>
<body>
    <div id="header">
        <div class=spotifyLogo></div>
        <div class=inLine>
            <input class="button home" type="button" >
            <div class="searchBar"></div>
        </div>
        <div class="inLine account">
            <div class="button signup">Sign up</div>
            <div class="button login">Log in</div>
        </div>
    </div>
    <main>
        <div id="sidebar">
            <h2>Your Library</h1>
        </div>
        <div id="content">
            <div class="showcase">
                <div class="inLine">
                    <h2>Popular artists</h2>
                    <a href="">Show all</a>
                </div>
                <div class="items">
                    <?php for($i = 0; $i < 6; $i++) {
                        echo '<div class="contentTile artist">';
                        echo '<div class=img></div>';
                        echo '<h5>Coldplay</h5>';
                        echo '<p>artist</p>';
                        echo ' </div>';
                    } ?>
                </div>
            </div>

            <div class="showcase">
                <div class="inLine">
                    <h2>Popular albums</h2>
                    <a href="">Show all</a>
                </div>
                <div class="items">
                    <?php for($i = 0; $i < 6; $i++) {
                        echo '<div class="contentTile">';
                        echo '<div class=img></div>';
                        echo '<h5>Album name</h5>';
                        echo '<p>artist</p>';
                        echo ' </div>';
                    } ?>
                </div>
            </div>
        </div>
    </main>
    <div id=adBanner></div>
</body>
</html>