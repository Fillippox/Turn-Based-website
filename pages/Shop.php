<?php

//@include 'config.php';

session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

if(isset($_SESSION['uid'])) { // check if the 'uid' key is set in the $_SESSION array
}

if(isset($_SESSION['coinsCount'])) { // check if the 'coinsCount' key is set in the $_SESSION array
}

if($conn->connect_error)
{
    die("Connection Failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $userID = $_SESSION['uid'];
    $itemID = $_POST['itemID'];
    $itemPrice = 0;

    $query = "SELECT price FROM items WHERE ID='$itemID'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $itemPrice = $row['price'];
    }

    // Check if the user has enough coins
    if ($_SESSION['coinsCount'] >= $itemPrice) {
        // Insert the data into the database
        $query = "INSERT INTO user_items (userID, itemID) VALUES ('$userID', '$itemID')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            // The query was successful
            echo "New record created successfully <br>";

            $_SESSION['coinsCount'] -= $itemPrice;
            $query = "UPDATE user_form SET coins = coins - $itemPrice WHERE ID = '$userID'";
            $result = mysqli_query($conn, $query);

            if($result)
            {
                // The query was successful
                echo "Coins count updated successfully";
            } 
            else 
            {
                // The query failed
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } 
        else 
        {
            // The query failed
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } 
    else 
    {
        echo "You do not have enough coins to purchase this item.";
    }
}

// Close the connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <!-- custom css file link  -->
   <!--<link rel="stylesheet" href="css/style.css">-->

   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Momoa | User</title>

   <link href="https://fonts.googleapis.com/css?family=Heebo:400,500,700|Playfair+Display:700" rel="stylesheet">
   <link rel="stylesheet" href="../dist/css/style.css">
   <link rel="stylesheet" href="../MyCss/ShopCss.css">
   <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
	<link rel="icon" href="../images/monster.png">

</head>
<body class="is-boxed has-animations">



<div class="body-wrap boxed-container">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">

                        <div id="time" style="text-align: left;"> </div>

                        <script>
                        function updateTime() {
                            var currentTime = new Date();
                            document.getElementById("time").innerHTML = "Hello, today is " + currentTime.toLocaleDateString() + " " + currentTime.toTimeString().substr(0, 8);

                            // Call the updateTime function again after 1000 milliseconds (1 second)
                            setTimeout(updateTime, 1000);
                        }

                        // Call the updateTime function for the first time
                        updateTime();
                        </script>

                        <div>
                            <div style="position: relative; left:225px; top: 60px"><a class="button button-shadow" style="background-color: #b28228; width: 125px" href="../login_system/user_page.php">Home</a>
                            <a class="button button-shadow" style="background-color: #b28228; width: 125px" href="Adventure.php">Adventure</a>
                            <a class="button button-shadow" style="background-color: #b28228; width: 125px" href="Bag.php">Bag</a> 
                            <a class="button button-shadow" style="background-color: #b28228; width: 125px" href="Shop.php">Shop</a>
                            <a href="../login_system/logout.php" class="button button-primary button-shadow">logout</a>
                            </div>
                        </div>
                        <h1 class="m-0">
                            <a href="#">
                              <img width="64" height="64" src="../images/monster.png"/>
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
                            <div class="content">
                            <h2>Welcome to Shop</h2>
                            <h3>Your balance <span><?php echo $_SESSION['coinsCount'] ?></span></h3>
                            <br>
                            <br>
                            
                            <div class="image-container">
                                <div class="image-and-form">
                                    <img src="../Items_Icons/1.png" class="image">
                                    <div>Price: 500</div>
                                    <br>
                                    <form method="post">
                                    <input type="hidden" id="itemID" name="itemID" value="1">
                                    <input type="submit" name ="submit" value="Buy">
                                    </form>
                                </div>
                                <div class="image-and-form">
                                    <img src="../Items_Icons/2.png" class="image">
                                    <div>Price: 300</div>
                                    <br>
                                    <form method="post">
                                    <input type="hidden" id="itemID" name="itemID" value="2">
                                    <input type="submit" name ="submit" value="Buy">
                                    </form>
                                </div>
                                <div class="image-and-form">
                                    <img src="../Items_Icons/3.png" class="image">
                                    <div>Price: 20</div>
                                    <br>
                                    <form method="post">
                                    <input type="hidden" id="itemID" name="itemID" value="3">
                                    <input type="submit" name ="submit" value="Buy">
                                    </form>
                                </div>
                                <div class="image-and-form">
                                    <img src="../Items_Icons/4.png" class="image">
                                    <div>Price: 15</div>
                                    <br>
                                    <form method="post">
                                    <input type="hidden" id="itemID" name="itemID" value="4">
                                    <input type="submit" name ="submit" value="Buy">
                                    </form>
                                </div>
                                <div class="image-and-form">
                                    <img src="../Items_Icons/5.png" class="image">
                                    <div>Price: 1500</div>
                                    <br>
                                    <form method="post">
                                    <input type="hidden" id="itemID" name="itemID" value="5">
                                    <input type="submit" name ="submit" value="Buy">
                                    </form>
                                </div>
                                <div class="image-and-form">
                                    <img src="../Items_Icons/6.png" class="image">
                                    <div>Price: 800</div>
                                    <br>
                                    <form method="post">
                                    <input type="hidden" id="itemID" name="itemID" value="6">
                                    <input type="submit" name ="submit" value="Buy">
                                    </form>
                                </div>
                                
                                <!-- Add more images here -->
                                </div>


                            <!--<a href="login_form.php" class="btn">login</a>
                            <a href="register_form.php" class="btn">register</a>
                            <a href="logout.php" class="btn">logout</a>-->

                            </div>
                            <br>
                            <br>
                            <br>

	                        <!-- <div class="hero-cta"><a class="button button-shadow" href="#">Learn more</a>
                            <a class="button button-primary button-shadow" href="#">Early access</a></div> 

                            ctrl + k + c to comment mulltiple line at once
                            -->
                            
						</div>
						<div class="hero-app">
							<div class="hero-app-illustration">
								<svg width="999" height="931" xmlns="http://www.w3.org/2000/svg">
								    <defs>
								        <linearGradient x1="92.827%" y1="0%" x2="53.422%" y2="80.087%" id="hero-shape-a">
								            <stop stop-color="#F9425F" offset="0%"/>
								            <stop stop-color="#F97C58" stop-opacity="0" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="92.827%" y1="0%" x2="53.406%" y2="80.12%" id="hero-shape-b">
								            <stop stop-color="#47A1F9" offset="0%"/>
								            <stop stop-color="#F9425F" stop-opacity="0" offset="80.532%"/>
								            <stop stop-color="#FDFFDA" stop-opacity="0" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="8.685%" y1="23.733%" x2="85.808%" y2="82.837%" id="hero-shape-c">
								            <stop stop-color="#FFF" stop-opacity=".48" offset="0%"/>
								            <stop stop-color="#FFF" stop-opacity="0" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="79.483%" y1="15.903%" x2="38.42%" y2="70.124%" id="hero-shape-d">
								            <stop stop-color="#47A1F9" offset="0%"/>
								            <stop stop-color="#FDFFDA" stop-opacity="0" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="99.037%" y1="26.963%" x2="24.582%" y2="78.557%" id="hero-shape-e">
								            <stop stop-color="#FDFFDA" stop-opacity=".64" offset="0%"/>
								            <stop stop-color="#F97C58" stop-opacity=".24" offset="42.952%"/>
								            <stop stop-color="#F9425F" stop-opacity="0" offset="100%"/>
								        </linearGradient>
								    </defs>
								    <g fill="none" fill-rule="evenodd">
								        <g class="hero-shape-top">
											<g class="is-moving-object is-translating" data-translating-factor="280">
								            	<path d="M680.188 0c-23.36 69.79-58.473 98.3-105.34 85.531-70.301-19.152-189.723-21.734-252.399 91.442-62.676 113.175-144.097 167.832-215.195 118.57C59.855 262.702 24.104 287.85 0 370.988L306.184 566.41c207.164-4.242 305.67-51.612 295.52-142.11-10.152-90.497 34.533-163.55 134.054-219.16l4.512-119.609L680.188 0z" fill="url(#hero-shape-a)" transform="translate(1)"/>
											</g>
											<g class="is-moving-object is-translating" data-translating-factor="100">
												<path d="M817.188 222c-23.36 69.79-58.473 98.3-105.34 85.531-70.301-19.152-189.723-21.734-252.399 91.442-62.676 113.175-144.097 167.832-215.195 118.57-47.399-32.841-83.15-7.693-107.254 75.445L443.184 788.41c207.164-4.242 305.67-51.612 295.52-142.11-10.152-90.497 34.533-163.55 134.054-219.16l4.512-119.609L817.188 222z" fill="url(#hero-shape-b)" transform="rotate(-53 507.635 504.202)"/>
											</g>
								        </g>
								        <g transform="translate(191 416)">
											<g class="is-moving-object is-translating" data-translating-factor="50">
								            	<circle fill="url(#hero-shape-c)" cx="336" cy="190" r="190"/>
											</g>
											<g class="is-moving-object is-translating" data-translating-factor="80">
								            	<path d="M683.766 133.043c-112.048-90.805-184.688-76.302-217.92 43.508-33.23 119.81-125.471 124.8-276.722 14.972-3.156 120.356 53.893 200.09 171.149 239.203 175.882 58.67 346.695-130.398 423.777-239.203 51.388-72.536 17.96-92.03-100.284-58.48z" fill="url(#hero-shape-d)"/>
											</g>
											<g class="is-moving-object is-translating" data-translating-factor="100">
												<path d="M448.206 223.247c-97.52-122.943-154.274-117.426-170.26 16.55C261.958 373.775 169.717 378.766 1.222 254.77c-9.255 95.477 47.794 175.211 171.148 239.203 185.032 95.989 424.986-180.108 424.986-239.203 0-39.396-49.717-49.904-149.15-31.523z" fill="url(#hero-shape-e)" transform="matrix(-1 0 0 1 597.61 0)"/>
											</g>
										</g>
								    </g>
								</svg>
							</div>
                            <div class="hero-app-dots hero-app-dots-1">
								<svg width="124" height="75" xmlns="http://www.w3.org/2000/svg">
								    <g fill="none" fill-rule="evenodd">
								        <path fill="#FFF" d="M33.392 0l3.624 1.667.984 3.53-1.158 3.36L33.392 10l-3.249-1.639L28 5.196l1.62-3.674z"/>
								        <path fill="#7487A3" d="M74.696 3l1.812.833L77 5.598l-.579 1.68L74.696 8l-1.624-.82L72 5.599l.81-1.837z"/>
								        <path fill="#556B8B" d="M40.696 70l1.812.833.492 1.765-.579 1.68-1.725.722-1.624-.82L38 72.599l.81-1.837z"/>
								        <path fill="#7487A3" d="M4.314 37l2.899 1.334L8 41.157l-.926 2.688L4.314 45l-2.6-1.31L0 41.156l1.295-2.94zM49.314 32l2.899 1.334.787 2.823-.926 2.688L49.314 40l-2.6-1.31L45 36.156l1.295-2.94z"/>
								        <path fill="#556B8B" d="M99.696 56l1.812.833.492 1.765-.579 1.68-1.725.722-1.624-.82L97 58.599l.81-1.837zM112.696 37l1.812.833.492 1.765-.579 1.68-1.725.722-1.624-.82L110 39.599l.81-1.837zM82.696 37l1.812.833.492 1.765-.579 1.68-1.725.722-1.624-.82L80 39.599l.81-1.837zM122.618 57l1.087.5.295 1.059-.347 1.008-1.035.433-.975-.492-.643-.95.486-1.101z"/>
								    </g>
								</svg>
                            </div>
							<div class="hero-app-dots hero-app-dots-2">
								<svg width="124" height="75" xmlns="http://www.w3.org/2000/svg">
								    <g fill="none" fill-rule="evenodd">
								        <path fill="#556B8B" d="M33.392 0l3.624 1.667.984 3.53-1.158 3.36L33.392 10l-3.249-1.639L28 5.196l1.62-3.674zM74.696 3l1.812.833L77 5.598l-.579 1.68L74.696 8l-1.624-.82L72 5.599l.81-1.837zM40.696 70l1.812.833.492 1.765-.579 1.68-1.725.722-1.624-.82L38 72.599l.81-1.837zM4.314 37l2.899 1.334L8 41.157l-.926 2.688L4.314 45l-2.6-1.31L0 41.156l1.295-2.94zM49.314 32l2.899 1.334.787 2.823-.926 2.688L49.314 40l-2.6-1.31L45 36.156l1.295-2.94z"/>
								        <path fill="#FFF" d="M99.696 56l1.812.833.492 1.765-.579 1.68-1.725.722-1.624-.82L97 58.599l.81-1.837z"/>
								        <path fill="#556B8B" d="M112.696 37l1.812.833.492 1.765-.579 1.68-1.725.722-1.624-.82L110 39.599l.81-1.837z"/>
								        <path fill="#FFF" d="M82.696 37l1.812.833.492 1.765-.579 1.68-1.725.722-1.624-.82L80 39.599l.81-1.837z"/>
								        <path fill="#556B8B" d="M122.618 57l1.087.5.295 1.059-.347 1.008-1.035.433-.975-.492-.643-.95.486-1.101z"/>
								    </g>
								</svg>
							</div>
						</div>
                    </div>
                </div>
            </section>
        <main>

        <div class="container">

   
</div>

        <footer class="site-footer">
            <div class="container">
                <div class="site-footer-inner has-top-divider">
                    <div class="brand footer-brand">
                        <a href="#">
                           <img width="64" height="64" src="../images/monster.png"/>	
                    </div>
                    <ul class="footer-links list-reset">
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="#">About us</a>
                        </li>
                        <li>
                            <a href="#">FAQ's</a>
                        </li>
                        <li>
                            <a href="#">Support</a>
                        </li>
                    </ul>
                    <ul class="footer-social-links list-reset">
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Facebook</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z" fill="#FFF"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Twitter</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z" fill="#FFF"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Google</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z" fill="#FFF"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="footer">2022 Filip Rękas</div>
                </div>
            </div>
        </footer>
    </div>

    <script src="dist/js/main.min.js"></script>

</body>
</html>