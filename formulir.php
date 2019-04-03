<html>
 <head>
 <Title>Formulir Kota</Title>
 <style type="text/css">
 	body { background-color: #fff; border-top: solid 10px #000;
 	    color: #333; font-size: .85em; margin: 20; padding: 20;
 	    font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
 	}
 	h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
 	h1 { font-size: 2em; }
 	h2 { font-size: 1.75em; }
 	h3 { font-size: 1.2em; }
 	table { margin-top: 0.75em; }
 	th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
 	td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
 </style>
 </head>
 <body>
 <h1>Daftar Kota!</h1>
 <p>Isi Nama Kota dan Kode Kota, Kemudian Klik <strong>Submit</strong> to register.</p>
 <form method="post" action="?action=add" enctype="multipart/form-data" >
       Nama_Kota <input type="text" name="name" id="name"/></br></br>
       Kode_Kota <input type="text" name="email" id="email"/></br></br>
       
       <input type="submit" name="submit" value="Submit" />
       <input type="load_data" name="load_data" value="Load Data" />
       
 </form>
 <?php
    
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:dicodingkotabpn.database.windows.net,1433; Database = dicodingbpn", "dicodingbpn", "B4l!kp4p4n");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "dicodingbpn@dicodingkotabpn", "pwd" => "B4l!kp4p4n", "Database" => "dicodingbpn", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:dicodingkotabpn.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);


    if (isset($_POST['submit'])) {
        try {
            $Nama_Kota = $_POST['Nama_Kota'];
            $Kode_Kota = $_POST['Kode_Kota'];
            
            // Insert data
            $sql_insert = "INSERT INTO KOTA (Nama_Kota, Kode_Kota) 
                        VALUES (?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $Nama_Kota);
            $stmt->bindValue(2, $Kode_Kota);
            $stmt->execute();
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
        echo "<h3>KOTA ANDA SUDAH TEREGISTER!</h3>";
    } else if (isset($_POST['load_data'])) {
        try {
            $sql_select = "SELECT * FROM KOTA";
            $stmt = $conn->query($sql_select);
            $registrants = $stmt->fetchAll(); 
            if(count($registrants) > 0) {
                echo "<h2>KOTA MANA YANG TERDAFTAR:</h2>";
                echo "<table>";
                echo "<tr><th>Nama_Kota</th>";
                echo "<th>Kode_Kota</th>";
                foreach($registrants as $registrant) {
                    echo "<tr><td>".$registrant['Nama_Kota']."</td>";
                    echo "<td>".$registrant['Kode_Kota']."</td>";
                }
                echo "</table>";
            } else {
                echo "<h3>TIDAK ADA KOTA YANG TERDAFTAR.</h3>";
            }
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
    }
 ?>
 </body>
 </html>
 
