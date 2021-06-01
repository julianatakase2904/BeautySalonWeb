<?php

class Page  {
    //function displays the top nav bar
    static function navBar() {
        ?>
            <!DOCTYPE html>
            <html>
                <title>Beauty at Home - Project</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="css\first.css">
                <link href="https://fonts.googleapis.com/css2?family=Kristi&family=Quicksand:wght@300&display=swap" rel="stylesheet">

                <body>
                    <!-- Navbar (sit on top) -->
                    <div class="w3-top">
                        <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
                            <a href="home.php" class="w3-bar-item w3-button" style="font-family: 'Kristi', cursive; font-size: 30px;">Beauty at Home</a>
                            <!-- Right-sided navbar links. Hide them on small screens -->
                            <div class="w3-right w3-hide-small">
                            <a href="service.php" class="w3-bar-item w3-button">Services</a>
                            <a href="register.php" class="w3-bar-item w3-button">Register</a>
                            <a href="booking.php" class="w3-bar-item w3-button">Book Now</a>
                            <a href="contact.php" class="w3-bar-item w3-button">Contact</a>
                            </div>
                        </div>
                    </div>

        <?php
    }
    //function displays the home picture
    static function headerPic() {
        ?>
            <!-- Header -->
            <header class="w3-display-container w3-content w3-wide w3-opacity-min" style="max-width:1600px;min-width:500px" id="home">
                <img class="home-image" src="img\home.jpg" alt="Home Pic" >
            </header>

        <?php
    }
    //function displays the home content
    static function home() {
        ?>
            <!-- Page content -->
            <div class="w3-content" style="max-width:1100px">
                <!-- About Section -->
                <div class="w3-row w3-padding-64" id="about">
                    <div class="w3-col m6 w3-padding-large w3-hide-small">
                    <img src="img\intro.jpg" class="w3-round w3-image w3-opacity-min" alt="Intro Pic" width="350" height="500">
                    </div>

                    <div class="w3-col m6 w3-padding-large">
                        <h1 class="w3-center" style="font-family: 'Kristi', cursive; font-size: 40px;">Beauty at Home</h1>
                        <h4 class="w3-center">Indulge yourself</h4>
                        <p class="w3-large">24 hours a day are not enough for all a woman's personal and professional chores. 
                            Are you out of time to go to the beauty salon? Beauty at Home provides beauty salon services for you 
                            to enjoy in the comfort of your home. With a range of various services, Beauty at 
                            Home is available to assist you who live in the Vancouver, North Vancouver, Richmond, Delta, New 
                            Westmister, Langley, Surrey and Burnaby area. Check out our services and coverage area. </p>
                        <p class="w3-large w3-text-grey w3-hide-medium">In COVID-19 times, avoiding places with an excessive number 
                            of people is of paramount importance. Beauty at Home professionals are trained to provide our services 
                            with all hygienic care.</p>
                    </div>
                </div>

        <?php
    }
    //function displays service page
    static function service(Array $services) {
        ?>
            <!-- Page content -->
            <div class="w3-content" style="max-width:1100px">
                <!-- Our Services Section -->
                <div class="w3-row w3-padding-64" id="menu">
                    <div class="w3-col l6 w3-padding-large">
                        <h1 class="w3-center" style="font-family: 'Kristi', cursive; font-size: 40px;">Our Services</h1>
                        <table class="services-table">
                            <th>Hair</th>
                            <?php 
                                foreach($services as $service) {
                                    if($service->getDescription() == "Hair") {
                                        echo '<tr>';
                                        echo '<td>'.$service->getServiceName().'</td>';
                                        echo '<td>'."$ ".$service->getServicePrice().'</td>';
                                        echo '</tr>';
                                    }  
                                }
                            ?>
                            <th>Hands</th>
                            <?php 
                                foreach($services as $service) {
                                    if($service->getDescription() == "Nails") {
                                        echo '<tr>';
                                        echo '<td>'.$service->getServiceName().'</td>';
                                        echo '<td>'."$ ".$service->getServicePrice().'</td>';
                                        echo '</tr>';
                                    }  
                                }
                            ?>
                            <th>Face & Body</th>
                            <?php 
                                foreach($services as $service) {
                                    if($service->getDescription() == "Face & Body") {
                                        echo '<tr>';
                                        echo '<td>'.$service->getServiceName().'</td>';
                                        echo '<td>'."$ ".$service->getServicePrice().'</td>';
                                        echo '</tr>';
                                    }  
                                }
                            ?>

                        </table>
                    </div>
                    <div class="w3-col l6 w3-padding-large">
                        <img src="img\services.jpg" class="w3-round w3-image w3-opacity-min" alt="Service Pic"  style="float:right" width="350" height="500">
                    </div>
                </div>
        <?php
    }
    //function displays the register page
    static function register() {
        ?>
            <!-- Page content -->
            <div class="w3-content" style="max-width:1100px">
                <!-- Register Section -->
                <div class="w3-container w3-padding-64" id="register">
                    <h1  style="font-family: 'Kristi', cursive; font-size: 40px;">Please, Register Now</h1>
                    <p>To book our services, please register now and start to enjoy your beauty day!</p>
                    <form ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>" method = "POST">
                        <p><input class="w3-input w3-padding-16" type="text" name = "firstName" placeholder="First Name" pattern="[A-Za-z]{1,32}" title = "Please, only letter allowed until 32 characters"required ></p>
                        <p><input class="w3-input w3-padding-16" type="text" name = "lastName" placeholder="Last Name" pattern="[A-Za-z]{1,32}" title = "Please, only letter allowed until 32 characters"required></p>
                        <p><input class="w3-input w3-padding-16" type="text" name = "username" placeholder="Create a Username" required></p>
                        <p><input class="w3-input w3-padding-16" type="text" name = "email" placeholder="Enter your e-mail address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title = "Please follow this format: example@example.com" required></p>
                        <p><input class="w3-input w3-padding-16" type="text" name = "address" placeholder="Inform your Full Address" required></p>
                        <p><input class="w3-input w3-padding-16" type="password" name = "password"  id="myInput" pattern=".{6,}" placeholder="Six or more characters" title = "Please place six or more characters"></p>
                        <p><button class = "w3-button w3-light-grey w3-section" name = "action" value = "send">SUBMIT</button></p>     
                    </form>
                </div>
        <?php
    }
    //function displays the booking page
    static function booking(User $user, Array $services) {
        ?>
            <!-- Page content -->
            <div class="w3-content" style="max-width:1100px">
                <!-- Book Section -->
                <div class="w3-col m6 w3-padding-large w3-hide-small">
                    <img src="img\book.jpg" class="book-image w3-opacity-min" alt="Booking Pic" >
                </div>
                <div class="w3-container w3-padding-85mod" id="book">
                    <h1 style="font-family: 'Kristi', cursive; font-size: 40px;">Welcome <?php echo $user->getFirstName() ?>, Book your Service</h1>
                    <p>Choose the service(s), the date, for how many people, and any special request.</p>
                    <form method = "POST">
                        <p><select class="w3-input w3-padding-16" name= "bookingDetails">
                        <option selected>Select your Service</option>
                        <?php
                            foreach($services as $service) {
                                ?>
                                <option value="<?= $service->getServiceID() ?>|<?= $service->getServiceName() ?>|<?= $service->getServicePrice() ?>" >
                                <?= $service->getServiceName() ?> </option>
                                <?php
                            }
                        ?>
                        </select>
                        </p>
                        <p><input class="w3-input w3-padding-16" type="number" placeholder="How many people" required name="quantity"></p>
                        <p><input class="w3-input w3-padding-16" type="date" placeholder="Date" required name="bookingDate" ></p>
                        <p><input class="w3-input w3-padding-16" type="time" placeholder="time" required name="bookingTime" ></p>
                        <p><button class="w3-button w3-light-grey w3-section" type="submit" name="action" value= "addBooking">ADD A SERVICE</button></p>    
                    </form>
                </div>
        <?php
    }
    //function to display a edit form for booking
    static function bookingEdit(User $user, Array $services, Booking $bookingToEdit) {
        ?>
            <!-- Page content -->
            <div class="w3-content" style="max-width:1100px">
                <!-- Book Section -->
                <div class="w3-col m6 w3-padding-large w3-hide-small">
                    <img src="img\book.jpg" class="book-image w3-opacity-min" alt="Booking Pic" >
                </div>
                <div class="w3-container w3-padding-85mod" id="book">
                    <h1 style="font-family: 'Kristi', cursive; font-size: 40px;"><?php echo $user->getFirstName() ?>, Edit your Booking Information</h1>
                    <p>Choose the service(s), the date, for how many people, and any special request.</p>
                    <form method = "POST">
                        <p><select class="w3-input w3-padding-16" name= "bookingDetails">
                        <option selected>Select your Service</option>
                        <?php
                            foreach($services as $service) {
                                if($service->getServiceID() == $bookingToEdit->getServiceID()) {
                                    ?>
                                    <option value="<?= $service->getServiceID() ?>|<?= $service->getServiceName() ?>|<?= $service->getServicePrice() ?>" selected>
                                    <?= $service->getServiceName() ?> </option>
                                    <?php   
                                } else {
                                    ?>
                                    <option value="<?= $service->getServiceID() ?>|<?= $service->getServiceName() ?>|<?= $service->getServicePrice() ?>">
                                    <?= $service->getServiceName() ?> </option>
                                    <?php  

                                }
                                
                            }
                        ?>
                        </select>
                        </p>
                        <p><input class="w3-input w3-padding-16" type="number" placeholder="How many people" required name="quantity" value="<?php echo $bookingToEdit->getQuantity(); ?>"></p>
                        <p><input class="w3-input w3-padding-16" type="date" placeholder="Date" required name="bookingDate" value="<?php echo $bookingToEdit->getBookingDate(); ?>"></p>
                        <p><input class="w3-input w3-padding-16" type="time" placeholder="time" required name="bookingTime"value="<?php echo $bookingToEdit->getBookingTime(); ?>" ></p>
                        <p><input type="hidden" required name="serviceID" value="<?php echo $bookingToEdit->getServiceID(); ?>" ></p>
                        <p><input type="hidden" required name="bookingToEdit" value="<?php echo $bookingToEdit->getBookingID(); ?>" ></p>
                        <p><button class="w3-button w3-light-grey w3-section" type="submit" value="editBooking">EDIT BOOKING INFORMATION</button></p>    
                    </form>
                </div>
        <?php
    }
    //function to show the booking details
    static function showBookingDetails(Array $bookings) {
        ?>
        <!-- Page content -->
            <div class="w3-container w3-padding-85mod2" id="book">
                <hr>
                <h1 style="font-family: 'Kristi', cursive; font-size: 40px; ">Booking Details</h1><br>
                <form method= "POST">
                    <div class="grid-container-booking">
                    <th>
                        <div class="item1">SERVICE</div>
                        <div class="item2">DATE</div>
                        <div class="item3">TIME</div>
                        <div class="item4">QUANT.</div>
                        <div class="item5">PRICE</div>
                        <div class="item6">TOTAL</div>
                        <div class="item7">EDIT</div>
                        <div class="item8">REMOVE</div>
                    </th>
                    <?php
                        foreach($bookings as $booking) {
                            echo '<tr>';
                            echo '<td><div class="item1">'.$booking->getServiceName().'</div></td>';
                            echo '<td><div class="item2">'.$booking->getBookingDate().'</div></td>';
                            echo '<td><div class="item3">'.$booking->getBookingTime().'</div></td>';
                            echo '<td><div class="item4">'.$booking->getQuantity().'</div></td>';
                            echo '<td><div class="item5">'."$ ".$booking->getServicePrice().'</div></td>';
                            echo '<td><div class="item6">'."$ ".$booking->getTotal().'</div></td>';
                            echo '<td><div class="item7"><a href="?action=edit&id='.$booking->getBookingID().'">Edit</div></a></td>';
                            echo '<td><div class="item8"><a href="?action=delete&id='.$booking->getBookingID().'">Remove</div></a></td>';
                            echo '</tr>';
                        }
                    ?>
                        <p><button class="w3-button w3-light-grey w3-section" type="submit" name="action" value="checkout" onclick="myFunction()">CHECKOUT</button></p>   
                    </div>
                </form>
            </div>
        <?php
    }


    //function to login
    static function login() {
        ?>
            <!-- Page content -->
            <div class="w3-content" style="max-width:1100px">
                <!-- Login Section -->
                <div class="w3-container w3-padding-85" id="login">
                    <h1 style="font-family: 'Kristi', cursive; font-size: 40px;">Please, Login</h1>
                    <p>Please Login to book any service you prefer.</p>
                    <p>You can also contact us by phone 555-555-1234 or send us a <a href="#contact">Message</a></p>
                    <form method="POST">
                    <p><input class="w3-input w3-padding-16" type="text" name= "username" placeholder="User Name" required></p>
                    <p><input class="w3-input w3-padding-16" type="password" name= "password" placeholder= "Password" required></p>
                    <p><button class="w3-button w3-light-grey w3-section" type="submit">LOGIN</button></p>
                    </form>
                </div>
        <?php
    }
    //function to thank the user for register
    static function thankForRegister() {
        ?>
        <!-- Page content -->
            <div class="w3-content" style="max-width:1100px">
                <!-- Payment Section -->
                <div class="w3-container w3-padding-96" id="thankForRegister">
                    <h1 style="font-family: 'Kristi', cursive; font-size: 40px; ">Thank your for register at Beauty at Home!</h1>
                    <p>Please, book your service now!</p>
                    <form method="POST">
                        <p><button class="w3-button w3-light-grey w3-section" name="action" value="send">BOOK NOW</button></p>
                    </form>
                </div>
            
        <?php
    }
    //function to display the payment thank you message
    static function thankForPayment($user) {
        ?>
        <!-- Page content -->
            <div class="w3-content" style="max-width:1100px">
                <!-- Payment Section -->
                <div class="w3-container w3-padding-96" id="thankForPayment">
                    <h1 style="font-family: 'Kristi', cursive; font-size: 40px; ">Thank your for your payment, <?php echo $user->getFirstName() ?></h1>
                    <p>To go back to the the home page, click bellow.</p>
                    <form method="POST">
                        <p><button class="w3-button w3-light-grey w3-section" name="action" value="send">BACK</button></p>
                    </form>
                </div>
            
        <?php
    }
    //function to display the contact thank you message
    static function thankForContact($user) {
        ?>
        <!-- Page content -->
            <div class="w3-content" style="max-width:1100px">
                <!-- Payment Section -->
                <div class="w3-container w3-padding-96" id="thankForPayment">
                    <h1 style="font-family: 'Kristi', cursive; font-size: 40px; ">Thank your for contact us, <?php echo $user->getFirstName() ?></h1>
                    <p>To go back to the the home page, click bellow.</p>
                    <form method="POST">
                        <p><button class="w3-button w3-light-grey w3-section" name="action" value="send">BACK</button></p>
                    </form>
                </div>
            
        <?php
    }
    //function displays the payment form
    static function paymentForm(User $user, array $bookings) {
        ?>  
            <!-- Page content -->
            <div class="w3-content" style="max-width:1100px">
                <!-- Payment Section -->
                <div class="w3-container w3-padding-115" id="payment">
                    <h1 style="font-family: 'Kristi', cursive; font-size: 40px; ">Hi <?php echo $user->getFirstName() ?>, Make your payment</h1>
                    <p style="font-size: 20px; ">Your total amount for payment is 
                        <?php 
                        $total = 0;
                        foreach($bookings as $booking) {
                            $total += $booking->getTotal();
                        } 
                        echo "$".$total;                       
                        ?> </p>
                    <form class="form-inline" method = "POST">
                        <input  type="text"  name="cardName" placeholder="Name on card" required pattern="[A-Za-z- ]{1,30}" title="Please insert only letters"></p>
                        <input  type="text" name="tdcNumber" placeholder="Card Number" required pattern="[0-9]{16}" title="Please insert only numbers and a minimum of 16 digit"></p>
                        <input  type="text" name="expirationDate" placeholder="Expiration date (example: mm-yy)" required pattern="[0-9]{2}-[0-9]{2}" title="Please follow this format 08-20, where 08 is a month and 20 is the year">
                        <p><button class="w3-button w3-light-grey w3-section" name="action" type="submit">ADD PAYMENT</button></p>  
                    </form>
                </div>
        <?php
    }
    //function displays contact page
    static function contact() {
        ?>
            <!-- Page content -->
            <div class="w3-content" style="max-width:1100px">
                <!-- Contact Section -->
                <div class="w3-container w3-padding-64" id="contact">
                    <h1 style="font-family: 'Kristi', cursive; font-size: 40px; ">Contact</h1>
                    <p>Stay in touch.</p>
                    <form method="POST">
                    <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
                    <p><input class="w3-input w3-padding-16" type="text" name = "email" placeholder="Enter your e-mail address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title = "Please follow this format: example@example.com" required></p>
                    <p><textarea class="w3-input w3-padding-16" type="text" placeholder="Message" rows="3" required name="Message"></textarea></p>
                    <p><button class="w3-button w3-light-grey w3-section" name="action" type="submit">SEND MESSAGE</button></p>
                    </form>
                </div>
        <?php
    }
    //function display the footer
    static function footer() {
        ?>
                    <!-- End page content -->
                    </div>
                    <!-- Footer -->
                    <footer class="w3-center w3-light-grey w3-padding-32">
                    <p><a href="https://www.beautyathome.ca" title="BeautyAtHome" target="_blank" class="w3-hover-text-green">www.BeautyAtHome.ca</a></p>
                    </footer>
                </body>
            </html>
        <?php
    }




    

}
?>