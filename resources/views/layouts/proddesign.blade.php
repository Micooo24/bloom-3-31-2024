<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BLOOM</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* General styles */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f7fafc;
        }
        
        .menu-container {
            padding-top: 120px; /* Adjust padding-top to account for fixed buttons */
            max-height: calc(100vh - 120px);
            overflow-y: auto;
            scroll-padding-top: 100px; /* Offset to account for fixed buttons */
            background-color: #fff;
            margin-left: 14px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .menu-section {
            padding: 20px;
            margin-top: 20px;
            border-top: 1px solid #ccc;
        }

        /* Container styles */
        .container {
        display: flex;
        margin-top: 20px;
        gap: 10px; /* Increase the gap between cards */
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .product-card {
            width: 250px; /* Set a fixed width for each product card */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            text-align: center;
            display: flex;
            flex-direction: column; /* Ensure content stacks vertically */
            justify-content: space-between; /
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .image-container {
         flex: 1; /* Fill the remaining space */
        width: 100%;
        overflow: hidden;
        position: relative;
        border-radius: 8px;
        }

        /* Quantity selector container */
        .product-quantity {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px; /* Add space below the quantity selector */
        }

        .product-description {
            padding: 10px; /* Add padding to create space around the description */
            background-color: #ffff; /* Optional: add a background color to visually separate the description */
            border-radius: 8px; /* Optional: add border radius for a nicer look */
            margin-top: 10px; /* Add space between title and description */
            margin-bottom: 10px
        }

        * Minus and Plus buttons */
        .product-quantity-btn {
            display: inline-block;
            padding: 15px;
            cursor: pointer;
            background-color: #f7f7f7;
            border: none;
            outline: none;
            margin-top: 15px; 
            margin-bottom: 10px;
        }

        /* Quantity input */
        .qty {
            width: 30px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: 0 5px;
            padding: 8px 10px;
        }

        /* Add to Cart button */
        .add-to-cart-btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #004236;
            color: #fff;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            text-decoration: none;
        }

        .add-to-cart-btn:hover {
            background-color: #267c6c;
        }

        /* Responsive styles */
       @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .service {
            height: 100%; /* Fill the available height */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Space between title and description */
            margin-top: 10px;
            }
        }

        .cart-container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    h1 {
      text-align: center;
    }

    .cart-row {
      display: flex;
      margin-bottom: 20px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 10px;
    }

    .cart-item {
      display: flex; /* Use flexbox for layout */
      align-items: center; /* Align items vertically */
      flex: 1; /* Take up remaining space */
      padding: 10px;
    }

    .cart-item img {
      max-width: 100px;
      height: auto;
      margin-right: 20px; /* Add space between image and text */
    }

    .cart-details {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex: 1; /* Take up remaining space */
    }

    .cart-actions {
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }

    .quantity {
      height: 30px;
      width: 50px;
      text-align: center;
    }

    .btn {
      background-color: #004236;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 3px;
      margin-left: 10px;
    }

    .btn:hover {
      background-color: #267c6c;
    }

    .cart-header {
      display: grid;
      grid-template-columns: 2fr 0fr 0fr 1fr;
      grid-gap: 42px;
      margin-bottom: 10px;
      margin-right: 10px;
      border-bottom: 4px solid #ccc;
      padding-top: 20px;
      padding-bottom: 10px;
    }

    .label {
      font-weight: bold;
      width: 55%;
      
    }

    </style>

</head>



<body>
<div class="menu-container">
        @yield('content')
    </div>