<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Country State City Dropdown @haripadajena</title>
    <style>
     
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="https://avatars.githubusercontent.com/u/54484560?s=400&u=3280a9c2c9558b3489a38d35201e9d8571fb14d9&v=4" width="100px" height="100px">Haripada Jena</a></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="https://www.youtube.com/@haripada_jena?sub_confirmation=1" target="_blank">Subscribe my channel..❤</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://t.me/+xmSUrvshxbw5MGNl" target="_blank">Join in Telegram</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  
  
    <div class="container" >
 
    <div class="text-center">                            
        <img src="https://avatars.githubusercontent.com/u/54484560?s=400&u=3280a9c2c9558b3489a38d35201e9d8571fb14d9&v=4" width="100px" height="100px"><br>
                    <h1>Haripada Jena's Tech Blog</h1>
                    <h3>Country, State and City dropdown box using jquery in PHP.</h3>
                    <br>
        </div> 
        <?php
        //Include database configuration file
        include('config.php');

        //Get all country data
        $query = "SELECT * FROM countries  ORDER BY country_name ASC";
        $run_query = mysqli_query($con, $query);
        //Count total number of rows
        $count = mysqli_num_rows($run_query);

        ?>
       <div class="card mx-auto" style="width: 60%;">
            <div class="card-body">
            <select name="country" id="country" class="form-control">
            <option value="">Select Country</option>
            <?php
            if($count > 0){
                while($row = mysqli_fetch_array($run_query)){
                    $country_id=$row['country_id'];
                    $country_name=$row['country_name'];
                    echo "<option value='$country_id'>$country_name</option>";
                }
            }else{
                echo '<option value="">Country not available</option>';
            }
            ?>
        </select><br><br>

        <select name="state" id="state" class="form-control">
            <option value="">Select country first</option>
        </select>
        <br><br>

        <select name="city" id="city" class="form-control">
            <option value="">Select state first</option>
        </select>
            </div>
        </div>
       
       
    </div>
<footer class="footer mt-auto py-3 bg-dark">
  <div class="container">
    <div class="row">
        <div class="col col-sm-6"><a href="https://www.youtube.com/@haripada_jena?sub_confirmation=1" target="_blank">Subscribe my channel..❤</a></div>
        <div class="col col-sm-6 text-right"><a href="https://t.me/+xmSUrvshxbw5MGNl" target="_blank">Join in Telegram</a></div>
    </div>
    </div>
  </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
    <script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxFile.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxFile.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
  </body>
</html>
