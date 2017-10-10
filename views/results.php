<?php include 'partials/header.php'; ?>
<pre>
  <?php print_r($forecast); ?>
</pre>
<main>
      <div class="jumbotron jumbotron-fluid" style="background: url('images/01-winter.jpg') center center no-repeat !important; background-size: cover !important;">
        <!-- <img class="card-img" src="images/01-winter.jpg" alt="Card image"> -->
        
            <div class="d-flex justify-content-between">

              <div class="card p-4" style="max-width: 240px; opacity: 0.75;">
                <p class="lead text-bold m-0"><?php echo $place; ?></p>
                <h2 class="display-1 mb-0">
                  <?php echo round($forecast['currently']['temperature']); ?>&deg;
                </h2>
                <p class="lead">
                  <?php echo $forecast['currently']['summary']; ?>
                </p>
                <p class="lead">
                  Wind Speed: <?php echo round($forecast['currently']['windSpeed']); ?> MPH
                </p>
              </div>

              <form action="forecast.php" method="post">
                <div class="form-row" style="opacity: 0.5">
                  <label class="sr-only" for="location">Location</label>
                  <input type="text" class="form-control" id="location" aria-describedby="location-help" placeholder="Location" name="location">
                  <button type="submit" name="submit" class="btn">Submit</button>
                </div>
              </form>

            </div>


              <div class="container">
                <div class="row">
                  <?php foreach($forecast['daily']['data'] as $day): ?>
                    <div class="col-12 col-md-4">
                      <div class="card p-4 my-5">
                        <p class="lead m-0">
                          <?php echo gmdate("l", $day['time']); ?>
                        </p>
                        <h2 class="m-0">
                          <?php echo round($day['temperatureHigh']); ?>&deg;
                        </h2>
                        <p class="lead text-left">
                          <?php echo $day['summary']; ?>
                        </p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
    
      </div>


</main>

<?php include 'partials/footer.php'; ?>