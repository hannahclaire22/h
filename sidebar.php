<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Main Page</title>
	<link rel="icon" href="logo.PNG" type="image/icon">
	<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function showContent(id) {
            var contents = document.getElementsByClassName("content")[0].children;
            for (var i = 0; i < contents.length; i++) {
                if (contents[i].id === id) {
                contents[i].style.display = "block";
                window.location.hash = "#" + id; // add fragment identifier to URL
                } else {
                contents[i].style.display = "none";
                }
            }
        }
		function onlyAlphaKey(event) {
			var keyCode = ('which' in event) ? event.which : event.keyCode;

			if ((keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122)||keyCode == 32) {
				return true; 
			} else {
				return false;
			}
		}
		function onlyNumberKey(event) {
			var keyCode = ('which' in event) ? event.which : event.keyCode;

			if (keyCode >= 48 && keyCode <= 57) {
				return true;
			} else {
				return false;
			}
		}
        function showDefaultContent() {
            // Get the anchor tag from the URL
            var hash = window.location.hash;

            // Remove the '#' character from the hash
            var sectionId = hash.substr(1);

            // Show the default section based on the anchor tag
            showContent(sectionId);
        }
    </script>
	<style>
		#home,#about{
			background-color:#38343f7a;
		}
		h1{
			font-size:50px;
			text-align:center;
			background-color:pink;
		}
		h2,h3,h4{
			font-size:30px;
			margin-left:50px;
		}
		p{
			font-size:30px;
			margin-left:50px;
			padding-bottom:30px;
		}
		body {
			background: 
			linear-gradient(to right,#09141B,#1E3847)  ;
			background-attachment:fixed;
			font-family:sans-serif ;
            margin-right:5px;
		}

		.content {
			margin-left:150px ;
			padding:15px;
            flex-grow:1;
		}

  
		.sidebar a {
		  display: block;
		  color: black;
		  padding: 16px;
		  text-decoration: none;
		  border-style: none;
          font-size:12px;
		}


		.sidebar a:hover:not(.active) {
		  background-color: #4caf50;
		  color: white;
		}
		.logoutbtn{
			color: black;
			padding: 17.5px ;
			text-decoration: none;
			border-style: none;
			background-color: #e8e8e8;
			width: 100%;
			display: inline-flex;
            font-size:12px;         
		}
        .logoutbtn:hover:not(.active){
            background-color: #4caf50;
            color:white;
        }
        #logouti{
            font-size: 25px;
            color: #000;
            margin-right:10px;
            vertical-align:center;
        }
        label{
            font-size:13px;
        }
		.form1 {
			background: #e8e8e8;
			border-radius: 10px;
			box-shadow: 0px 0px 5px 5px rgba(0, 0, 0, 0.18);
			height: auto;
			margin: auto;
			width:250px;
			text-align: center;
			padding: 30px;
		}
		input[type=text],[type=password],[type=email],[type=number],[type=file],select{
			width: 100%;
			display: inline-block;
			padding: 10px 16px;
			margin: 4px 0;
			border: none;
			border-bottom: 1px solid #4caf50;
			border-radius: 4px;
			box-sizing: border-box;
		}
        textarea{
            width: 100%;
			display: inline-block;
			padding: 10px 16px;
			margin: 4px 0;
			border: none;
			border-bottom: 1px solid #4caf50;
			border-radius: 4px;
			box-sizing: border-box;
            height:120px;
            resize:none;
        }
		#submit {
			width: 100%;
			padding: 12px 16px;
			margin: 4px 0;
			border: none;
			background-color: #4caf50;
			border-radius: 4px;
			box-sizing: border-box;
			cursor: pointer;
			color:white;
		}
        #submit2{
			width: 100%;
			padding: 12px 16px;
			margin: 4px 0;
			border: none;
			background-color: #a50000;
			border-radius: 4px;
			box-sizing: border-box;
			cursor: pointer;
			color:white;

		}
        .sidebar a i {
            font-size: 25px;
            color: #000;
            margin-right:10px;
        }
        .btn-text{
            vertical-align:middle;
            margin-top:10px;
        }
        .staticform{
            text-align:center;
            margin:auto;
            padding-top:50px;
        }
        .staticsend{
            color: black;
            padding:50px ;
            text-decoration: none;
            border-style: none;
            background-color: #e8e8e8;
            display: inline-flex;
            font-size:12px;      
        }
        .staticsend:hover:not(.active){
            color:white;
            background-color:#4caf50;
        }
        .form2 {
            display: inline-block;
            width: 250px;
            background: #e8e8e8;
			border-radius: 10px;
            padding:30px;
            margin:5px;
            color:black;
            display:inline-block;
            vertical-align: top;
        }
        #update label{
            color:black;
        }
        .layout{
            display:flex;
        }
         .green-button {
            background-color: green;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding:50px ;
            margin:10px;
            text-decoration: none;
            border-style: none;
            display: inline-flex;
            width:180px;
            height:140px;
            text-align:center;
            
            }

        .red-button {
            text-align:center;
            height:140px;
            width:180px;
            background-color: #a50000;;
            color: white;
            padding:50px ;
            text-decoration: none;
            border-style: none;
            font-size: 16px;
            border: none;
            margin:10px;
            border-radius: 4px;
            cursor: pointer;
            display: inline-flex;
            }
        #current-value, #value-display{
            color:white;
            margin:10px;
            padding:0;
        }
        
	</style>
</head>
<body onload="showDefaultContent()">
    <div class="layout">
        <div class="sidebar">
            <a href="#registered" onclick="showContent('registered')"><i class="fa fa-user"></i> Registered</a>
            <a href="#static" onclick="showContent('static')"><i class="fa fa-envelope"></i> StaticMail</a>
            <a href="#dynamic" onclick="showContent('dynamic')"><i class="fa fa-envelope-o"></i> DynamicMail</a>
            <a href="#hashlist" onclick="showContent('hashlist')"><i class="fa fa-lock"></i> HashAlgorythms</a>
            <a href="#logic" onclick="showContent('logic')"><i class="fa fa-grav"></i> Logic</a>
            <a href="#biodata" onclick="showContent('biodata')"><i class="fa fa-address-card"></i> Biodata</a>
            <a href="#iot" onclick="showContent('iot')"><i class="fa fa-grav"></i> IOT</a>
            <form class="logout" method="POST" action="">
                <button type="submit" name="logout" value="Logout" class="logoutbtn"><i id="logouti"class="fa fa-sign-out"></i><span class="btn-text"> Logout</span></button>
            </form>
        </div>
        <div class="content" style="flex-grow: 1;">
            <div class="cont" id="registered" style="display:none; color:white;">
            <?php require'rtable.php'; ?>
                <div style="display:inline;">
                        <form class="form2" method="POST" action="delete.php" style="float:top;">
                            <input type="text" name="id" placeholder="ID"required>
                            <input id="submit" type="submit" name="delete" value="DELETE" >
                        </form>
                        <form class="form2" method="post">
                            <label for="column">Search Column:</label>
                            <select name="column" id="column">
                                <option value="id">ID</option>
                                <option value="Fname">First Name</option>
                                <option value="Lname">Last Name</option>
                                <option value="Age">Age</option>
                                <option value="Gender">Gender</option>
                                <option value="Address">Address</option>
                                <option value="EmailAddress">Email Address</option>
                            </select>
                            <label for="search">Search Value:</label>
                            <input type="text" name="searchname" id="search">
                            <input type="submit" value="Search" name="search" id="submit">
                            <input type="submit" name="showAll" value="Show All Data" id="submit">
                        </form>
                        <form class="form2" method="post" action="update.php">
                            <label for="id">ID</label>
                            <input type="text" name="id" id="id" onkeypress="return onlyNumberKe(event)" required>
                            <button type="button" id="submit" onclick="fetchUserData()">Fetch User Data</button>
                            <label for="firstname">FirstName</label>
                            <input type="text" name="Fname" id="firstname" onkeypress="return onlyAlphaKey(event)" required>
                            <label for="lastname">LastName</label>
                            <input type="text" name="Lname" id="lastname" onkeypress="return onlyAlphaKey(event)" required>
                            <label for="age">Age</label>
                            <input type="text" name="Age" id="age" onkeypress="return onlyNumberKey(event)" maxlength="3" required>
                            <label for="gender">Gender</label>
                            <select name="Gender" id="gender" required>
                                <option value="" disabled selected>select gender</option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                            <label for="address">Address</label>
                            <input type="text" id="address" name="Address" required>
                            <label for="emailaddress">EmailAddress</label>
                            <input type="text" id="emailaddress" name="EmailAddress" required>
                            <input id="submit" type="submit" value="UPDATE">
                        </form>


                        <script>
                        function fetchUserData() {
                            var id = document.getElementById('id').value;

                            // Make an AJAX request to fetch user data
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', 'fetch_user_data.php?id=' + id, true);

                            xhr.onload = function () {
                            if (xhr.status === 200) {
                                var userData = JSON.parse(xhr.responseText);
                                populateForm(userData);
                            }
                            };

                            xhr.send();
                        }

                        function populateForm(userData) {
                            document.getElementById('firstname').value = userData.Fname;
                            document.getElementById('lastname').value = userData.Lname;
                            document.getElementById('age').value = userData.Age;
                            
                            var genderSelect = document.getElementById('gender');
                            for (var i = 0; i < genderSelect.options.length; i++) {
                                if (genderSelect.options[i].value === userData.Gender) {
                                genderSelect.selectedIndex = i;
                                break;
                                }
                            }
                            
                            document.getElementById('address').value = userData.Address;
                            document.getElementById('emailaddress').value = userData.EmailAddress;
                            }
                        </script>

                </div>
            </div>
            <div class="cont" id="static" style="display:none; color:white;">
                <?php if (isset($error)): ?>
                <script> alert('<?php echo $error; ?>'); window.location.href = 'sidebar.php';</script>
                <?php endif; ?>
                <?php if (isset($success)): ?>
                    <script>alert('<?php echo $success; ?>'); window.location.href = 'sidebar.php'; </script>
                <?php endif; ?>
                <form class="staticform"method="POST" action="static.php" >
                    <button  class="staticsend" type="submit"> Send</button>
                </form>
            </div>

            <div class="cont" id="dynamic" style="display:none; color:black;">
                <form class="form1" method="post" action="dynamic.php" style="margin-top:50px;" enctype="multipart/form-data">
                    <label>To: </label>
                    <input type="email" name="to" required>
                    <label>Subject:</label>
                    <input type="text" name="subject" >
                    <label>Message:</label>
                    <textarea name="message" required></textarea>
                    <label>Attachment:</label>
                    <input type="file" name="attachment">
                    <input id="submit"type="submit" name="submit" value="Send Email" >
                </form>
            </div>
            <div class="cont" id="hashlist" style="display:none; color:white;">
            <table>
                <tr>
                    <th>Hash Algorithm</th>
                </tr>
                    <?php
                        $algorithms = hash_algos();
                        foreach ($algorithms as $algorithm) {
                        echo "<tr><td>" . $algorithm . "</td></tr>";
                        }
                    ?>
            </table>
            </div>
                <?php
                require 'config.php';
                    // Check if form to add products has been submitted
                if (isset($_POST['addproduct']) && $_POST['addproduct'] == 'Add') {
                    $name = $_POST['name'];
                    $quantity = $_POST['quantity'];
                    $price = $_POST['price'];

                    // Check if product already exists in the database
                    $sql = "SELECT * FROM products WHERE name = '$name'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<script>alert('Product already exists in the database.')</script>";
                    } else {
                        // Insert new product into the database
                        $sql = "INSERT INTO products (name, quantity,price) VALUES ('$name', $quantity,$price)";

                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('Product added successfully.');</script>";
                        } else {
                            echo "Error adding product: " . mysqli_error($conn);
                        }
                    }
                }
                ?>
            <div class="cont" id="logic" style="display:none;color:white;">
                <iframe src="ptable.php" width="100%" height="300px" style="padding:0px; border-radius:10px;margin-left:5px; margin-right:10px;"></iframe>

                <div style="height:auto;">
                    <!-- Form to add products -->
                    <form method="post" action="" class="form2">
                        <h3>Add Product</h3>
                        <label for="name">Product Name:</label>
                        <input type="text" name="name" id="name" required><br><br>

                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" required>
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" required>
                        <input id="submit" type="submit" name="addproduct" value="Add">
                    </form>
                    

                    <!-- Form to order products -->
                   <form method="post" action="" class="form2">
                    <h3>Buy Product</h3>
                    <div class="product-field">
                        <label for="product">Product Name:</label>
                        <select name="product" required>
                            <option value="">Select a product</option>
                            <?php
                                // Fetch available products from the database
                                $sql = "SELECT name FROM products";
                                $result = $conn->query($sql);

                                // Display options for each product
                                while ($row = $result->fetch_assoc()) {
                                    $productName = $row["name"];
                                    echo "<option value='".$productName."'>".$productName."</option>";
                                }
                            ?>
                        </select>

                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" required>

                        <input id="submit" type="submit" name="addToCart" value="Add to Cart">
                    </div>
                </form>

                    <?php
                    session_start();
                    require 'config.php';

                    // Check if "Add to Cart" button has been clicked
                    if (isset($_POST['addToCart'])) {
                        $productName = $_POST['product'];
                        $quantity = $_POST['quantity'];

                        // Retrieve price from the database
                        $sql = "SELECT price FROM products WHERE name = '$productName'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $price = $row['price'];

                            $productPrice = $price * $quantity;

                            // Retrieve current quantity from the database
                            $sql = "SELECT quantity FROM products WHERE name = '$productName'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $current_quantity = $row['quantity'];

                                if ($current_quantity < $quantity) {
                                    echo "<script>alert('Not enough stock to add $quantity units of $productName to the cart.');</script>";
                                } else {
                                    // Store the product, quantity, and price in session variables
                                    $_SESSION['cart'][] = array(
                                        'product' => $productName,
                                        'quantity' => $quantity,
                                        'price' => $price,
                                        'productPrice' => $productPrice
                                    );
                                }
                            } else {
                                echo "<script>alert('Product not found in the database: $productName.');</script>";
                            }
                        } else {
                            echo "<script>alert('Product not found in the database: $productName.');</script>";
                        }

                        echo "<script>window.history.replaceState(null, null, window.location.href);</script>";
                    }

                    // Check if "Clear Cart" button has been clicked
                    if (isset($_POST['clearCart'])) {
                        // Clear the cart by removing the cart session variable
                        unset($_SESSION['cart']);
                    }

                    // Check if "Buy Now" button has been clicked
                    if (isset($_POST['buyNow'])) {
                        if (!empty($_SESSION['cart'])) {
                            $totalPrice = 0;

                            foreach ($_SESSION['cart'] as $item) {
                                $productName = $item['product'];
                                $quantity = $item['quantity'];
                                $productPrice = $item['productPrice'];
                                $totalPrice += $productPrice;

                                // Retrieve current quantity from the database
                                $sql = "SELECT quantity FROM products WHERE name = '$productName'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $current_quantity = $row['quantity'];

                                    if ($current_quantity < $quantity) {
                                        echo "<script>alert('Not enough stock to fulfill the order for $productName.');</script>";
                                    } else {
                                        // Calculate new quantity
                                        $new_quantity = $current_quantity - $quantity;

                                        // Update the database
                                        $sql = "UPDATE products SET quantity = $new_quantity WHERE name = '$productName'";
                                        if (mysqli_query($conn, $sql)) {
                                            // Check if the new quantity is 0
                                            if ($new_quantity == 0) {
                                                // Delete the product from the database
                                                $delete_sql = "DELETE FROM products WHERE name = '$productName'";
                                                mysqli_query($conn, $delete_sql);
                                            }
                                        } else {
                                            echo "Error placing order for $productName: " . mysqli_error($conn);
                                        }
                                    }
                                } else {
                                    echo "Product not found in the database: $productName.";
                                }
                            }

                            // Clear the cart by removing the cart session variable
                            unset($_SESSION['cart']);
                            echo "<script>alert('Please pay a total of $totalPrice to the cashier.');</script>";
                        } else {
                            echo "<script>alert('The cart is empty.');</script>";
                        }

                        echo "<script>window.history.replaceState(null, null, window.location.href);</script>";
                    }

                    // Display the cart
                    echo "<h3>Cart</h3>";

                    if (!empty($_SESSION['cart'])) {
                        echo "<table>";
                        echo "<tr><th>Product Name</th><th>Quantity</th><th>Price</th></tr>";

                        $totalPrice = 0;

                        foreach ($_SESSION['cart'] as $item) {
                            $productName = $item['product'];
                            $quantity = $item['quantity'];
                            $productPrice = $item['productPrice'];
                            $totalPrice += $productPrice;

                            echo "<tr><td>$productName</td><td>$quantity</td><td>$productPrice</td></tr>";
                        }

                        echo "</table>";
                        echo "<p>Total Price: $totalPrice</p>";

                        // Add the "Clear Cart" button
                        echo '<form method="post" action="">';
                        echo '<input id="submit2" type="submit" name="clearCart" value="Clear Cart">';
                        echo '</form>';

                        // Add the "Buy Now" button
                        echo '<form method="post" action="">';
                        echo '<input id="submit" type="submit" name="buyNow" value="Buy Now">';
                        echo '</form>';
                    } else {
                        echo "<p>The cart is empty.</p>";
                    }
                    ?>


                </div>
            </div>

            <div class="cont" id="biodata" style="display:none; position:relative; padding-top:50px;">
                <form  class="form1" method="post" action="FORM.php">
                    <label for="firstname" >FirstName</label>
                    <input type="text"  name="Fname" id="firstname" onkeypress="return onlyAlphaKey(event)" required>
                    <label for="lastname" >LastName</label>
                    <input type="text" name="Lname" id="lastname" onkeypress="return onlyAlphaKey(event)" required>
                    <label for="age" >Age</label>
                    <input type="text" name="Age" id="age" onkeypress="return onlyNumberKey(event)" maxlength="3" required>
                    <label for="gender" >Gender</label>
                    <select name="Gender" required>
                        <option value="" disabled selected>select gender</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                    <label for="address" >Address</label>
                    <input type="text" id="address" name="Address" required>
                    <label for="emailaddress" >EmailAddress</label>
                    <input type="text" id="emaladdress" name="EmailAddress" required>
                    <input id="submit"type="submit" value="submit">
                </form>
            </div>
            <div class="cont" id="iot" style="display:none;">
                <div class="staticform">
                <p id="value-display" style="font-size: 15px;">Current value:</p>
                <p id="current-value" style="font-size: 50px;">0</p>
                <button class="green-button" onclick="increment()">Green Button</button>
                <button class="red-button" onclick="decrement()">Red Button</button>
                </div>

                <script>
                var currentValue = 0;
                var maxValue = 9;
                var minValue = 0;

                function updateURL() {
                    var xhr = new XMLHttpRequest();
                    var url = 'https://sgp1.blynk.cloud/external/api/update?token=wlV5yoBRgJd0HQXm8G2EgZut-7sFEaNg&v0=' + currentValue;
                    xhr.open('GET', url, true);
                    xhr.send();
                }

                function updateDisplay() {
                    document.getElementById('current-value').textContent = currentValue;
                }

                function increment() {
                    if (currentValue < maxValue) {
                    currentValue++;
                    updateURL();
                    updateDisplay();
                    }
                }

                function decrement() {
                    if (currentValue > minValue) {
                    currentValue--;
                    updateURL();
                    updateDisplay();
                    }
                }

                // Initialize the display with the current value
                updateDisplay();
                </script>

            </div>
        </div>
    </div>
</body>
    <script>
        
    </script>
</html>
