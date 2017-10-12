<?php include 'partials/header.php'; ?>
<!-- <pre>
  <?php //print_r($forecast); ?>
</pre> -->
<main>
      <div class="jumbotron jumbotron-fluid" style="background: url('images/03-summer.jpg') center center no-repeat !important; background-size: cover !important;">
        <div class="d-flex justify-content-between">
          <div class="card p-4" style="max-width: 240px; opacity: 0.75;">
            <p class="lead text-bold m-0"><?php echo $place; ?></p>
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
              <input type="text" class="form-control" id="location" aria-describedby="location-help" placeholder="Location" name="location">
            </div>
            <div class="col">
             <button type="submit" name="submit" class="btn btn-light">Submit</button>
            </div>
           </div>
          </form>
        </div>

      <div class="d-flex justify-content-between">
        <div class="flex-column">
          <div class="container">
            <div class="card p-4 my-5" style="opacity: 0.5">
              <div class="d-flex">
                <?php $counter = 0; ?>
                <?php foreach($forecast['hourly']['data'] as $hours): ?>
                  <?php 
                    $counter = $counter+1;
                    if($counter > 8) break;
                  ?>
                  
                    <p class="lead m-0 mx-3">
                      <?php echo gmdate("g A", $hours['time']); ?> <?php echo round($hours['temperature']); ?>&deg;
                    </p>

                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="justify-content-start" style="opacity: 0.5">
              <div class="d-flex">
                <?php $counter_day = 0; ?>
                <?php foreach($forecast['daily']['data'] as $day): ?>
                  <?php 
                      $counter_day = $counter_day+1;
                      if($counter_day > 5) break;
                    ?>
                  <div class="card p-4 my-5">
                    <p class="lead m-0">
                      <?php echo gmdate("D", $day['time']); ?> 
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

        <div class="container">
          <div class="card p-4 my-5" style="opacity: 0.5">
              <p class="lead text-bold m-0">Details</p>
              <p class="lead">
                Temperature: <?php echo round($forecast['currently']['temperature']); ?>&deg;
              </p>
              <p class="lead">
                Humidity: <?php echo round($forecast['currently']['humidity']); ?> %
              </p>
              <p class="lead">
                Visibility: <?php echo round($forecast['currently']['visibility']); ?> Miles
              </p>
              <p class="lead">
                UV Index: <?php echo round($forecast['currently']['uvIndex']); ?>
              </p>
          </div>
         </div>
        </div>
      </div>
</main>

<?php include 'partials/footer.php'; ?>