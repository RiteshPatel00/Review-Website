<!DOCTYPE html>

<html lang="en" dir="ltr">

<?php require('navbar.php'); ?>

<body>
  <!--Creating a Bootstrap row that will be for the logo-->
  <div class="row justify-content-center mt-5">
    <!-- Div for the websites logo that contains a path to the image of the logo in our images folder -->
    <div class="text-center mt-5 mb-3 px-4 col-11 col-md-8 col-lg-6 "><img class="logo" src="images/logo.png" alt="FoodLibrarian"></div>
  </div>

  <!--Creating a Bootstrap row that will be for the search bar-->
  <div class="row justify-content-center mt-5">
    <div class="col-11 col-md-7 col-lg-4 text-center">
      <form action="results.php" class="d-block">
        <div class="input-group mb-3">
            <!--Bootstrap input type that takes in a restaurant name-->
            <input name="name" type="text" class="form-control p-3 bg-light" placeholder="Restaurant Name">
            <div class="input-group-append">
                <select class="form-select py-3" name="rating" aria-label="Rating">
                    <option value="0" selected>Rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <!-- Bootstrap button for searching the input -->
            <div class="input-group-append">
                <!-- Adding button-animation to make fading animation on button -->
                <button class="btn btn-warning p-3 button-animation" type="submit">Search</button>
            </div>
            <!-- Creating lat and long values class to get user location, keeping it hidden for now -->
            <!-- Hidding the lat and long values as we don't need to show them on our landing page -->
            <input type="hidden" id="latitude" name="latitude"/>
            <input type="hidden" id="longitude" name="longitude"/>
          </div>
      </form>
    </div>
  </div>

  <!-- Div for the footer of the website -->
  <div class="footer text-center">
    &copy; 2021 FoodLibrarian, Inc
  </div>

  <!--Accessory script tags in order to make sure that Bootstrap is working properly-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <!-- Importing the appropriate javascript for the page -->
  <script src="js/search.js"></script>

</body>

</html>
