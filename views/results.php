<?php include 'partials/header.php'; ?>
<pre>
  <?php //print_r($forecast); ?>
</pre>
<main>

      <div class="jumbotron jumbotron-fluid" style="background: url('images/01-winter.jpg') center center no-repeat !important; background-size: cover !important;">
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
            <div class="col-6">
              <label class="sr-only" for="location">Location</label>
              <input type="text" class="form-control" id="location" aria-describedby="location-help" placeholder="Location" name="location">
            </div>
            <div class="col">
             <button type="submit" name="submit" class="btn">Submit</button>
            </div>
           </div>
          </form>
        </div>

        <div class="container">
          <div class="row">
            <div class="card p-4 my-5">
              <p class="lead m-0">
                <?php echo $day['hourly']; ?>
              </p>
              <h2 class="m-0">
                <?php echo round($day['temperatureHigh']); ?>&deg;
              </h2>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row justify-content-start" style="opacity: 0.5">
            <?php foreach($forecast['daily']['data'] as $day): ?>
              <div class="card p-4 my-5">
                <p class="lead m-0">
                  <?php echo gmdate("D", $day['time']); ?>
                </p>
                <h2 class="m-0">
                  <?php echo round($day['temperatureHigh']); ?>&deg;
                </h2>
              </div>
            <?php endforeach; ?> 
          </div>
        </div>
      </div>

</main>

<?php include 'partials/footer.php'; ?>