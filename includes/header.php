<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My E-Commerce Website</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background: linear-gradient(90deg, #4CAF50, #8BC34A);
            color: white;
            padding: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        h1 a {
            text-decoration: none;
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
            transition: transform 0.3s ease;
        }

        h1 a:hover {
            transform: scale(1.05);
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            padding: 8px 16px;
            border-radius: 25px;
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        nav a:hover {
            background-color: #FFD700;
            color: #4CAF50;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .search-bar {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .search-bar input[type="text"] {
            padding: 10px 15px;
            border: none;
            border-radius: 20px 0 0 20px;
            outline: none;
            width: 200px;
            transition: width 0.4s ease-in-out, box-shadow 0.3s ease;
        }

        .search-bar input[type="text"]:focus {
            width: 300px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .search-bar button {
            padding: 10px 15px;
            border: none;
            background-color: #FFD700;
            color: #4CAF50;
            border-radius: 0 20px 20px 0;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #FFC107;
            transform: scale(1.05);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                text-align: center;
            }

            nav {
                flex-direction: column;
                gap: 10px;
                margin: 15px 0;
            }

            .search-bar {
                margin-top: 15px;
            }

            .search-bar input[type="text"] {
                width: 100%;
                border-radius: 20px;
                margin-bottom: 10px;
            }

            .search-bar button {
                width: 100%;
                border-radius: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="../pages/index.php">ARFII</a></h1>
            <nav>
                <a href="../pages/index.php">Home</a>
                <a href="../pages/product-list..php">Shop</a>
                <a href="../pages/cart.php">Cart</a>
                <a href="../pages/Login.php">Login</a>
                <a href="../pages/Login.php">Logout</a>
            </nav>
            <div class="search-bar">
                <input type="text" placeholder="Search products...">
                <button type="button">Search</button>
            </div>
        </div>
    </header>
</body>
</html>
