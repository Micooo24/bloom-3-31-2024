<!-- resources/views/layouts/styles.blade.php -->

<style>
    /* CSS styles */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f3f4f6; /* Default background color */
    }

    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .input-field {
        width: 100%;
        margin-top: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #edece3 !important; /* Adjusted background color */
        transition: border-color 0.3s ease;
        font-size: 16px;
    }

    .input-field:focus {
        outline: none;
        border-color: #dfd2c8;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 20px;
        border: none;
        border-radius: 4px;
        background-color: #004236;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-weight: 500;
    }

    .button:hover {
        background-color: #004236;
    }

    .link {
        display: inline-block;
        margin-top: 10px;
        text-align: right;
        color: #5a67d8;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
    }

    .link:hover {
        text-decoration: underline;
    }

    .logo {
        text-align: center;
        margin-bottom: 20px;
    }

    .flex-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* New class for customizable background color */
    .custom-background {
        background-color: #004236; /* Default background color */
    }
</style>


<body class="custom-background">
    <div class="logo">  
    </div>  

 

<div class="flex-container">
    </div>

@yield('content') 
</body>

