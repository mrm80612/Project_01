<pre>
  <?php //print_r($forecast); ?>
</pre>
<main>
      <div class="jumbotron jumbotron-fluid">
        <img class="card-img" src="images/01-winter.jpg" alt="Card image">
          <div class="card-img-overlay">
            <div class="card p-4 my-5 mx-auto" style="max-width: 320px;">
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
              <div class="form-row">
                <div class="col">
                  <label class="sr-only" for="location">Location</label>
                    <input type="text" class="form-control" id="location" aria-describedby="location-help" placeholder="Location" name="location">
                      <div class="col">
                      <button type="submit" name="submit" class="btn">Submit</button>
                  </div>
                </div>
              </div>
            </form>

              <div class="container">
              <?php foreach($forecast['daily']['data'] as $day): ?>
                <div class="col-12 col-md-4">
                  <div class="card p-4 my-5 mx-auto"">
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
                </div>
              <?php endforeach; ?>
<!--             </div> -->
          </div>
      </div>


</main>

<?php include 'partials/footer.php'; ?>