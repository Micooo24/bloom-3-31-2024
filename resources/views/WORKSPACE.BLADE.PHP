<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Cart</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
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
  <div class="container">
    <h1>Your Cart</h1>
    <div class="cart-header">
      <div></div>
      <div class="label">Price:</div>
      <div class="label">Quantity:</div>
      <div class="label">Total:</div>
    </div>
    <div class="cart-row">
      <div class="cart-item">
      <img src="/image/ashe.jpg" alt="image" class="image">
        <h3>Item 1</h3>
      </div>
      <div class="cart-details">
        <div>$10.00</div>
        <input type="number" class="quantity" value="1" min="1">
        <div>$10.00</div>
        <div class="cart-actions">
          <button class="btn">Remove</button>
        </div>
      </div>
    </div>
    <div class="cart-row">
      <div class="cart-item">
      <img src="/image/yasuo.jpg" alt="image" class="image">
        <h3>Item 2</h3>
      </div>
      <div class="cart-details">
        <div>$15.00</div>
        <input type="number" class="quantity" value="1" min="1">
        <div>$15.00</div>
        <div class="cart-actions">
          <button class="btn">Remove</button>
        </div>
      </div>
    </div>
    <div class="cart-row">
      <div class="cart-item"></div>
      <div class="cart-details">
        <div class="label">Total Price:</div>
        <div class="label">$25.00</div>
        <div class="cart-actions">
          <button class="btn">Update Cart</button>
        </div>
      </div>
      
    </div>
    <div class="cart-actions">
          <button class="btn">Checkout</button>
        </div>
  </div>
</body>

</html>
