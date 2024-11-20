<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS_230030197</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
// Database connection details
$host = 'localhost'; // Replace with your MySQL host (e.g., '127.0.0.1' or 'your_server_ip')
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password
$database = 'db-shop'; // The database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Query to fetch all data from tb_barang
$sql = "SELECT * FROM tb_barang";
$result = $conn->query($sql);

// Initialize an associative array
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row; 
    }
} else {
    echo "No data found in tb_barang.";
}

$conn->close();
?>
    <nav class="navbar">
        <div class="navbar-left">
            <div class="logo">
                <img src="img/logo_baju.jpeg" alt="logo website" width="180px">
            </div>    
                <div class="judul;"> 
                   <h1> OUTFITKU</h1>
                   <h2>slogan toko</h2>
                </div>  
        </div>  
        <div class="navbar-right">
            <button>login</button>
        </div>
     </nav>
     <div class="navigation">
        <ul>
            <li>
                <button>Baju</button>
            </li>
            <li>
                celana
            </li>
            <li>
                spatu
            </li>
            <li>
                kaos kaki
            </li>
        </ul>
     </div>
     <div class="product">
        <h2>Penawaran terbaik today</h2>
    <div class="product-container">
        <?php
        foreach ($data as $product) {
            echo '
            <div class="product-card">
                <div class="product-img">
                    <img src="' . $product['gambar'] . '" alt="' . $product['nama_barang'] . '" style="width:200px">
                </div>
                <div class="product-content">
                    <div class="product-content-desc">
                        <h3>' . $product['nama_barang'] . '</h3>
                        <p>Rp. ' . number_format($product['harga'], 2, ',', '.') . '</p>
                        <p>' . $product['lokasi'] . '</p>
                    </div>
                    <div class="cart">
                        <button>Add to Cart</button>
                    </div>
                </div>
            </div>';            
        }
        ?>
    </div>
    </div>
</body>
</html>