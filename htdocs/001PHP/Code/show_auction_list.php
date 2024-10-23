<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auctions List</title>
    <link rel="stylesheet" href="css/styles.css"> 
    <style>
        .auction-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            box-shadow: 0 4px 8px rgba(1, 1, 1, 1);
            width: 300px;
            text-align: center;
        }
        .auction-item img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 12px;
        }
        .auction-item h3 {
            font-size: 1.5em;
            margin-bottom: 8px;
        }
        .auction-item p {
            margin: 6px 0;
            font-size: 1em;
        }
    </style>
</head>
<body>

<header>
    <h1>Auctions Watchlist</h1>
</header>

<section>
    <h2>Available Auctions</h2>

    <ul>
        <?php
            // link db
            $con = mysqli_connect('localhost', 'root', '', 'auction');
            if (!$con) 
            {
                die("Database connection failed: " . mysqli_connect_error());
            }

            // get every auction
            $sql = "SELECT * FROM auction";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) 
            {
                // iterate every auction
                while($row = mysqli_fetch_assoc($result)) 
                {
                    echo "<li>";
                    echo "<h3>" . $row['Title'] . "</h3>"; 
                    echo "<p>Description: " . $row['Discription'] . "</p>"; 
                    echo "<p>Starting Price: $" . $row['StartPrice'] . "</p>"; 
                    echo "<p>Start Time: " . $row['StartTime'] . "</p>"; 
                    echo "<p>End Time: " . $row['EndTime'] . "</p>"; 
                    //echo "<img src='" . $row['image_path'] . "' alt='Item Image' width='150'>"; 
                    echo "</li>";
                }
            } 
            else 
            {
                echo "<p>No auctions available.</p>";
            }

            mysqli_close($con);
        ?>
    </ul>
</section>

<footer>
    <p>Copyright © 2024</p>
</footer>

</body>
</html>