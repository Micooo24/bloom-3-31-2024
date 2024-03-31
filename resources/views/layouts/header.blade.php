<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #sidebar {
            position: fixed;
            top: 0;
            left: -250px; /* Hide sidebar by default */
            width: 250px;
            height: 100%;
            background-color: #004236;
            color: #fff;
            padding-top: 70px;
            transition: all 0.3s;
            z-index: 1000;
        }
        #content {
            margin-left: 0;
            padding: 20px;
            transition: margin-left 0.3s;
        }
        .sidebar-item {
            padding: 10px 20px;
            color: #fff;
            cursor: pointer;
        }
        .sidebar-item:hover {
            background-color: #495057;
        }
        .active {
            background-color: #E5E5E5;
        }

        .hamburger {
            display: block;
            cursor: pointer;
            color: #fff;
            font-size: 20px;
        }
        
        #header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #004236;
        padding: 24px 50px;
        border-bottom: 1px solid #ccc;
        z-index: 1001;
        height: 120px; /* Fixed height for the header */
        position: relative;
        }

        #logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 90px;
        width: 90px;
        margin: auto;
        position: center; /* Position the logo relative to the header */
        left: 50%;
        top: 50%;
        transform: translateY(-10%); /* Center the icons vertically */  
        }

        #logo-container img {
        max-width: 100%;
        max-height: 100%;
        height: auto;
        }

        #search, #user, #cart {
        color: #fff;
        font-size: 20px;
        margin-right: 20px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        }

        #search {
            right: 400px; /* Adjust the right property for the search icon */
        }

        #user {
            right: 350px; /* Adjust the right property for the user icon */
        }

        #cart {
            right: 300px; /* Adjust the right property for the cart icon */
        }

        /* Hide sidebar on smaller screens */
        @media (max-width: 768px) {
            #sidebar {
                width: 0;
                overflow: hidden;
            }          
            #content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<div id="header">
    
    <div id="logo-container">
        <img src="logo/bloom.png" alt="Logo">
    </div>
    <div id="search"><i class="fa-solid fa-magnifying-glass"></i></div>
    <div id="user">&#128100;</div>
    <div id="cart">&#128722;</div>
    
@yield('content')
</div>

<!-- Sidebar -->
<div id="sidebar">
    <!-- Sidebar content -->
</div>

<!-- Main content -->
<div id="content">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $product->product_image }}" class="card-img-top" alt="{{ $product->product_name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->product_description }}</p>
                        <p class="card-text">Price: ${{ $product->product_price }}</p>
                        <a href="#" class="btn btn-primary" onclick="addToCart('{{ $product->id }}')" style="background-color: #004236; color: #fff;">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function toggleSidebar() {
        $('#sidebar').toggleClass('active');
        if ($('#sidebar').hasClass('active')) {
            $('#sidebar').css('left', '0');
            $('#content').css('margin-left', '250px');
        } else {
            $('#sidebar').css('left', '-250px');
            $('#content').css('margin-left', '0');
        }
    }

    function addToCart(productId) {
        // Check if the user is logged in
        var isLoggedIn = false; // Replace this with your actual check for user login
        if (!isLoggedIn) {
            // Prompt the user to log in
            alert('Please log in to add items to your cart.');
            // You can redirect the user to the login page or show a modal for login here
        } else {
            // Perform the add to cart operation
            // Here you can send an AJAX request to add the product to the cart
            // Example:
            // $.post('/add-to-cart', { productId: productId }, function(response) {
            //     // Handle the response, e.g., show a success message
            // });
        }
    }
</script>

</body>
</html>
