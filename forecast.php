<?php
    include 'partials/header.php';
    require_once 'app/key.php';
    require_once 'app/forecast.php';

    if( isset($_POST['submit']) && !empty($_POST['location'])){
        require_once 'views/results.php';
    } else {
        require_once 'index.html';
    }

    require 'vendor/autoload.php';

    $session = new SpotifyWebAPI\Session(
        '8564fc48ea6c4e97b7f0bdabc5f90a02',
        'c821215db5b047229db585a09f414bd9'
    );

    $api = new SpotifyWebAPI\SpotifyWebAPI();

    $session->requestCredentialsToken();
    $accessToken = $session->getAccessToken();

    // Set the code on the API wrapper
    $api->setAccessToken($accessToken);

    // Get playlist type using a switch statement
    $conditions = $forecast['currently']['icon'];

    switch ($conditions) {
        case "clear-day":
            $playlist_term = "Sunny vibes";
            break;
        case "clear-night":
            $playlist_term = "Evening chill";
            break;
        case "rain":
            $playlist_term = "Peaceful piano";
            break;
        default:
            $playlist_term = "Top 40s";
    }


    // $playlist_term = array(
    //   'hot weather',
    //   'cold weather',
    //   'snowy day',
    //   'rainy day'
    // );

    $results = $api->search($playlist_term, 'playlist');

    // echo '<pre>';
    // var_dump($results);
    // echo '</pre>';
    // $results = json_decode(json_encode($results));
?>

<div class="bg-dark container-fluid py-4 text-center text-white">
    <h1 class="display-4 m-0">
        TODAY&rsquo;S PLAYLISTS
    </h1>
</div>
<div class="py-5 bg-music">
    <div class="container">
        <section class="row">
            <?php foreach ($results->playlists->items as $playlist): ?>
                <div class="col-12 col-md-4 mb-4">
                    <img class="img-fluid" src="<?php echo $playlist->images[0]->url;?>" width="320" height="320">
                    <h2 class="h4 m-0">
                        <a href="<?php echo $playlist->uri; ?>">
                            <?php echo $playlist->name; ?></h2>
                        </a>
                    </h2>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
</div>
<?php include 'partials/footer.php'; ?>