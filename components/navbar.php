<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <style>
        .navbar {
            display: flex;
            align-items: center;
            padding: 0 20px;
            height: 80px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(143, 35, 35, 1);
            box-shadow: 0 2px 5px rgba(192, 19, 19, 1);
            z-index: 1000;
            justify-content: space-between;
        }

        .button {
            background-color: rgba(53, 196, 53, 1);
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
        }

        .nav-button{
            margin-right: 30px;
            
        }
            
            
        .button:active {
            background-color:rgba(62, 182, 78, 1);
            box-shadow: 0 5px rgba(62, 182, 78, 1);
            transform: translateY(4px);
        }

    </style>
</head>
<body>
    <nav class="navbar">
        <div>
        </div>
        
        <div>
            <a href=""><button class="nav-button button">Sign up</button></a>
            <a href=""><button class="nav-button button">Log in</button></a>
        </div>
        
    </nav>
</body>
</html>