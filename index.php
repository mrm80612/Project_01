<?php include 'partials/header.php'; ?>
    <main class="bg-home d-flex align-items-center text-center text-light">
        <div class="container">
            <!-- ToDo: Add a logo or title here. -->
            <h1 class="display-1">Weather App</h1>
            <form class="form-inline home-search" action="forecast.php" method="post">
                 <div class="form-row">
                    <label class="sr-only" for="location">Location</label>
                    <input type="text" class="form-control form-control-lg mr-2" id="location" aria-describedby="location-help" placeholder="Location" name="location" value="<?php echo (isset($_POST['location']) ? $_POST['location'] : '') ?>">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </main>
<?php include 'partials/footer.php'; ?>