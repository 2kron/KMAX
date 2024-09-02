<?php
$servername = "localhost";
$username = "ronald";
$password = "4321";
$dbname = "kamiti";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get visitors from the database
function getVisitors($conn) {
    $query = "SELECT * FROM visit";
    return $conn->query($query);
}

// Function to display visitors in an HTML table
function displayVisitors($visitors) {
    while ($row = $visitors->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row['sname']) . "</td>
            <td>" . htmlspecialchars($row['pname']) . "</td>
            <td>" . htmlspecialchars($row['crimes']) . "</td>
            <td>" . htmlspecialchars($row['info']) . "</td>
            <td>" . htmlspecialchars($row['reason']) . "</td>
            <td>" . htmlspecialchars($row['time']) . "</td>
            <td>" . htmlspecialchars($row['date']) . "</td>
        </tr>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>KMAX-VISITORS</title>
    <style>
         body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

nav {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

nav ul li a:hover {
    text-decoration: underline;
}

main {
    padding: 20px;
}

h1 {
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

button {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

form {
    display: inline;
}

label {
    font-weight: bold;
}

select, button {
    margin-top: 10px;
}
    </style>
</head>
<body>
    <header>
        
        <h2><center>VISITORS</h2>
<nav>
        <ul>
            <li><a href="visitors.php">List of Visitors</a></li>
			<li><a href="admin.php">Home</a></li>
        </ul>
    </nav>
    <table>
        <thead>
            <tr>
                <th>Staff Recording Visit</th>
                <th>Inmate Being Visited</th>
                <th>Jailed For</th>
                <th>Visitor Info.(Name,Rel.,No.)</th>
                <th>Reason for Visit</th>
                <th>Visit Time</th>
				<th>Visit Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $visitors = getVisitors($conn);
            displayVisitors($visitors);
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>