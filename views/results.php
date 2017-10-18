<?php 
    date_default_timezone_set($forecast['timezone']);
    // echo '<pre>';
    // print_r($forecast);
    // echo '</pre>';
?>
<main class="<?php echo $forecast['currently']['icon']; ?> pb-5">
    <div class="container">
        <div class="d-md-flex align-items-start justify-content-between my-5">
            <div class="card card-forecast bg-forecast p-4">
                <p class="lead text-bold m-0"><?php echo $place; ?></p>
                <h2 class="display-1 mb-0">
                    <?php echo round($forecast['currently']['temperature']); ?>&deg;
                </h2>
                <p class="lead">
                    <?php echo $forecast['currently']['summary']; ?>
                </p>
            </div>

            <!-- Logo or something here -->

            <form class="form-inline" action="forecast.php" method="post">
                 <div class="form-row">
                    <label class="sr-only" for="location">Location</label>
                    <input type="text" class="form-control form-control-lg mr-2" id="location" aria-describedby="location-help" placeholder="Location" name="location" value="<?php echo (isset($_POST['location']) ? $_POST['location'] : '') ?>">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-between">
                <div class="card bg-forecast p-4 mb-4">
                    <h2 class="h4 text-bold mb-2">Forecast</h2>
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

                <div class="d-flex justify-content-between">
                    <?php $counter_day = 0; ?>
                    <?php foreach($forecast['daily']['data'] as $day): ?>
                        <?php 
                                $counter_day = $counter_day+1;
                                if($counter_day > 5) break;
                            ?>
                        <div class="card bg-forecast p-3">
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

            <div class="col-12 col-md-6">
                <div class="card bg-forecast p-4">
                    <h2 class="h4 text-bold mb-2">Forecast</h2>
                    <div class="row">
                        <div class="col-12 col-md-6">
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
                        <div class="col-12 col-md-6">
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