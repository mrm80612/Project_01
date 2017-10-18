<?php 
  include 'partials/header.php';
  include 'app/forecast.php';
  date_default_timezone_set($forecast['timezone']);
?>
<pre>
  <?php //print_r($forecast); ?>
</pre>
<main>
      <div class="jumbotron jumbotron-fluid" style="background: url('images/sunny-day.jpg') center center no-repeat !important; background-size: cover !important;">
        <div class="d-flex justify-content-between">
          <div class="card p-4 mx-3" style="max-width: 240px; opacity: 0.5;">
            <p class="lead text-bold m-0"><?php echo $place; ?></p>
            <!-- <p class="lead"> -->
             <?php// echo round($forecast['currently']['windSpeed']); ?> MPH
            <!-- </p> -->
            <h2 class="display-1 mb-0">
              <?php echo round($forecast['currently']['temperature']); ?>&deg;
            </h2>
            <p class="lead">
              <?php echo $forecast['currently']['summary']; ?>
            </p>
          </div>

          <form action="forecast.php" method="post">
           <div class="form-row" style="opacity: 0.5">
            <div class="col">
              <label class="sr-only" for="location">Location</label>
              <input type="text" class="form-control" id="location" aria-describedby="location-help" placeholder="Location" name="location" value="<?php echo (isset($_POST['location']) ? $_POST['location'] : '') ?>">
            </div>
            <div class="col">
             <button type="submit" name="submit" class="btn btn-light">Submit</button>
            </div>
           </div>
          </form>
        </div>

      <div class="d-flex justify-content-between align-items-stretch">
        <div class="flex-sm-column">
          <div class="container my-5">
            <p class="lead text-bold m-0 mx-4">Forecast</p>
              <div class="card p-4" style="opacity: 0.5">
                <div class="d-flex">
                  <?php $counter = 0; ?>
                  <?php foreach($forecast['hourly']['data'] as $hours): ?>
                    <?php 
                      $counter = $counter+1;
                      if($counter > 8) break;
                    ?>
                    
                      <p class="lead m-0">
                        <?php echo date("g A", $hours['time']); ?><br><?php echo round($hours['temperature']); ?>&deg;
                      </p>

                  <?php endforeach; ?>
                </div>
              </div>
          </div>
          <div class=" my-3">
            <div class="justify-content-start" style="opacity: 0.5">
              <div class="d-flex">
                <?php $counter_day = 0; ?>
                <?php foreach($forecast['daily']['data'] as $day): ?>
                  <?php 
                      $counter_day = $counter_day+1;
                      if($counter_day > 5) break;
                    ?>
                  <div class="card p-3 mx-3">
                    <p class="lead m-0">
                      <?php echo date("D", $day['time']); ?> 
                    </p>
                    <h2 class="lead m-0">
                      <?php echo round($day['temperatureHigh']); ?>&deg;
                    </h2>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>

        <div class="container my-5">
          <p class="lead text-bold m-0 mx-4">Details</p>
            <div class="card p-4" style="opacity: 0.5">
              <div class="row">
                <div class="col">
                  <p class="lead">
                    Temperature: <?php echo round($forecast['currently']['temperature']); ?>&deg;
                  </p>
                  <p class="lead">
                    Humidity: <?php echo ($forecast['currently']['humidity']); ?> %
                  </p>
                  <p class="lead">
                    Visibility: <?php echo ($forecast['currently']['visibility']); ?> Miles
                  </p>
                  <p class="lead">
                    UV Index: <?php echo ($forecast['currently']['uvIndex']); ?>
                  </p>
                </div>
                <div class="col">
                  <p class="lead">
                    Precipitation: <?php echo ($forecast['currently']['precipProbability']); ?> %
                  </p>
                  <p class="lead">
                    Wind Speed: <?php echo round($forecast['currently']['windSpeed']); ?> MPH
                  </p>
                  <p class="lead">
                    Sunrise: <?php echo date("g:i A T", $forecast['daily']['data']['0']['sunriseTime']); ?>
                  </p>
                  <p class="lead">
                    Sunset: <?php echo date("g:i A T", $forecast['daily']['data']['0']['sunsetTime']); ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</main>

<?php include 'partials/footer.php'; ?>