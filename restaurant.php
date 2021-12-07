<!DOCTYPE html>

<!-- Micro data type included in the beginning to access library -->
<html lang="en" dir="ltr" itemscope itemtype="http://schema.org/WebPage">

<?php 
require('connect.php');
if (!isset($_GET['id'])) {
    die("Restaurant ID not given");
}
$sql = "SELECT * FROM restaurants WHERE id=?";
    try {
      $restaurants = $db->prepare($sql);
      $restaurants->execute([$_GET['id']]);
      $restaurants = $restaurants->fetchAll();
      if (sizeof($restaurants) == 0) {
        die("Invalid restaurant ID");
      } else {
        $restaurant = $restaurants[0];
      }
    } catch (Exception $e) {
        die("Invalid restaurant ID");
    }

require('navbar.php'); 
?>

<body>

  <!-- Bootstrap container to contain the restaurant, map and user reviews -->
  <div class="container justify-content-center mt-5">
    <div class="card col-12 col-md-10 col-lg-7 bg-light mx-auto">

      <!-- Card for the specific object, with microdata about the geographical location -->
      <div class="card-body" itemscope itemtype="https://schema.org/Place">

        <!-- Picture of the specific restaurant -->
        <img src="<?php echo $restaurant['image'] ?>" class="w-100 rounded mb-4" alt="Papa John's Hamilton" />
        <h2 class="card-title">
        <?php echo $restaurant['name'] ?><span class="px-1"></span>
          <!-- Link from FontAwesome that is included in the head of our HTML doc that generates an image of a star and/or half a star to indicate a rating on the restaurant -->
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half"></i>
        </h2>
        <hr>
        <!-- Added microdata on the longitude and latitude of the restaurant specifically -->
        <p itemprop="geo" itemscope itemtype="https://schema.org/GeoCoordinates">
          <?php echo $restaurant['address'] ?><br />
          <?php echo $restaurant['phone_number'] ?>
          <!-- Meta tags for the latitude and longitude -->
          <meta itemprop="latitude" content="<?php echo $restaurant['latitude'] ?>" />
          <meta itemprop="longitude" content="<?php echo $restaurant['longitude'] ?>" />
        </p>
      </div>
    </div>

    <!-- Container for map using it's id from the api, also setting a default height of 50 -->
    <div class="card col-12 col-md-10 col-lg-7 mx-auto mt-4" style="height: 50vh"> 
        <div id="map"></div>
      </div>
    </div>

    <!-- ================================================================================================================================================ -->
    <!--This section contains Bootstrap cards for user reviews and the cards have been repeated 4 times to make the layout of this page, each card is identical in structure, not content, to the rest-->
    <!-- ================================================================================================================================================ -->

    <!-- Constructing the specific column and rows using Bootstraps grid system so that it can contain the user reviews -->
    <div class="col-12 col-md-10 col-lg-9 mx-auto mt-4">
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <!-- Microdata added in this div to grab information about the review -->
          <div class="card" itemprop="review" itemscope itemtype="https://schema.org/Review">
            <div class="card-body">
              <h5 class="card-title">
                "Very Good"<span class="px-1"></span>
                <!-- Link from FontAwesome that is included in the head of our HTML doc that generates an image of a star and/or half a star to indicate a rating on the restaurant -->
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </h5>
              <!-- Microdata from the review's name and the review body is grabbed as well as the date published -->
              <p class="card-text text-muted"> <span itemprop="name">John Appleseed</span>-<span itemprop="datePublished" content="2021-01-08">January 8, 2021</span></p>
              <p class="card-text" itemprop="reviewBody">Pizza was cooked perfectly. Toppings are high quality and fresh. Delivery was fast. I recommend the fiery buffalo chicken pizza and the philly cheese steak. My favorite pizza in town!</p>
            </div>
          </div>
        </div>

        <div class="col">
          <!-- Microdata added in this div to grab information about the review -->
          <div class="card" itemprop="review" itemscope itemtype="https://schema.org/Review">
            <div class="card-body">
              <h5 class="card-title">
                "Best pizza ever!"<span class="px-1"></span>
                <!-- Link from FontAwesome that is included in the head of our HTML doc that generates an image of a star and/or half a star to indicate a rating on the restaurant -->
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </h5>
              <!-- Microdata from the review's name and the review body is grabbed as well as the date published -->
              <p class="card-text text-muted"><span itemprop="name">Jack Hellewell</span>-<span itemprop="datePublished" content="2021-01-01">January 1, 2021</span></p>
              <p class="card-text" itemprop="reviewBody">I am impressed! The delivery guy placed my food in front of my door on the floor above an extra empty pizza box and plastic bag. No other food delivery place does this</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card" itemprop="review" itemscope itemtype="https://schema.org/Review">
            <div class="card-body">
              <h5 class="card-title">
                "Needs improvement"<span class="px-1"></span>
                <!-- Link from FontAwesome that is included in the head of our HTML doc that generates an image of a star and/or half a star to indicate a rating on the restaurant -->
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </h5>
              <!-- Microdata from the review's name and the review body is grabbed as well as the date published -->
              <p class="card-text text-muted"><span itemprop="name">Jimmy Appleseed</span>-<span itemprop="datePublished" content="2021-01-10">January 10, 2021</span></p>
              <p class="card-text" itemprop="reviewBody">The pizza is rarely consistent quality. Don’t bother to pay for extra or double cheese they will just put the same amount. If you can see tomato sauce through the cheese, it isn’t extra cheese.
              </p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card" itemprop="review" itemscope itemtype="https://schema.org/Review">
            <div class="card-body">
              <h5 class="card-title">
                "Disgusting"<span class="px-1"></span>
                <!-- Link from FontAwesome that is included in the head of our HTML doc that generates an image of a star and/or half a star to indicate a rating on the restaurant -->
                <i class="fas fa-star"></i>
              </h5>
              <!-- Microdata from the review's name and the review body is grabbed as well as the date published -->
              <p class="card-text text-muted"><span itemprop="name">John Doe</span>-<span itemprop="datePublished" content="2021-01-22">January 22, 2021</span></p>
              <p class="card-text" itemprop="reviewBody">Ordered the bbq chicken bacon pizza with green peppers. The whole pizza maybe had one strip of bacon on it. Barely any chicken and only 2 slices had green peppers.</p>
            </div>
          </div>
        </div>
        <!-- ================================================================================================================================================ -->
        <!--End of review cards section-->
        <!-- ================================================================================================================================================ -->
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
  <script src="js/individual_sample.js"></script>
  
  <!-- Google Maps API import using script tag -->
  <script async
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5BiEcEFYz2ot5qg678RWkIhtE6etgMs8&callback=initMap">
  </script>
</body>

</html>