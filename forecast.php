<?php


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

  $playlist_term = 'hot weather';

  $results = $api->search($playlist_term, 'playlist');

  // echo '<pre>';
  // var_dump($results);
  // echo '</pre>';
  // $results = json_decode(json_encode($results));

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Weather App</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <header class="bg-dark container-fluid py-4 text-center text-white">
      <h1 class="display-4 m-0">
        TODAY'S PLAYLISTS
      </h1>
    </header>
    <main class="container my-5">
<!--       <h2 class="display-3 py-4"><?php echo ucfirst($playlist_term); ?></h2>
 -->
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

    </main>
  </body>
</html>
