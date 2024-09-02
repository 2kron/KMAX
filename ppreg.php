<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KMAX-PRISONER</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
        }
        .form-column {
            flex: 1;
            margin: 10px;
        }
        .form-column:first-child {
            border-right: 1px solid #ccc;
            padding-right: 20px;
        }
        .form-column:last-child {
            padding-left: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group .readonly {
            background-color: #e9e9e9;
        }
        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #555;
        }
		.link-button {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .link-button:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>KAMITI PRISONER REGISTRATION FORM</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
			$username = "ronald";
			$password = "4321";
			$dbname = "kamiti";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $inmateCode = mysqli_real_escape_string($conn, $_POST['inmateCode']);
            $pname = mysqli_real_escape_string($conn, $_POST['pname']);
            $dob = mysqli_real_escape_string($conn, $_POST['dob']);
            $age = mysqli_real_escape_string($conn, $_POST['age']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $maritalStatus = mysqli_real_escape_string($conn, $_POST['maritalStatus']);
            $complexion = mysqli_real_escape_string($conn, $_POST['complexion']);
            $eyeColor = mysqli_real_escape_string($conn, $_POST['eyeColor']);
            $crimes = mysqli_real_escape_string($conn, $_POST['crimes']);
            $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
            $endDate = mysqli_real_escape_string($conn, $_POST['endDate']);
            $period = mysqli_real_escape_string($conn, $_POST['period']);
            $nextOfKin = mysqli_real_escape_string($conn, $_POST['nextOfKin']);
            $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $comments = mysqli_real_escape_string($conn, $_POST['comments']);

            $sql = "INSERT INTO prisoners (inmateCode, pname, dob, age, address, gender, maritalStatus, complexion, eyeColor, crimes, startDate, endDate, period, nextOfKin, relationship, contact, comments)
                    VALUES ('$inmateCode', '$pname', '$dob', '$age', '$address', '$gender', '$maritalStatus', '$complexion', '$eyeColor', '$crimes', '$startDate', '$endDate', '$period', '$nextOfKin', '$relationship', '$contact', '$comments')";

            if (mysqli_query($conn, $sql)) {
                echo "<p style='color: black;'>New Inmate Created Successfully</p>";
            } else {
                echo "<p style='color: black;'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
            }

            mysqli_close($conn);
        }
        ?>
        <form action="" method="post">
            <div class="form-row">
                <div class="form-column">
                    <div class="form-group">
                        <label for="inmateCode">Inmate Code</label>
                        <input type="text" id="inmateCode" name="inmateCode" maxlength="4" pattern="\d{4}" required>
                    </div>
                    <div class="form-group">
                        <label for="pname">Name</label>
                        <input type="text" id="pname" name="pname" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob" required onchange="calculateAge()">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" id="age" name="age" class="readonly" readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="maritalStatus">Marital Status</label>
                        <select id="maritalStatus" name="maritalStatus" required>
                            <option value="single">Single</option>
                            <option value="engaged">Engaged</option>
                            <option value="married">Married</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="complexion">Complexion</label>
                        <select id="complexion" name="complexion" required>
                            <option value="dark">Dark</option>
                            <option value="light">Light</option>
                            <option value="fair">Fair</option>
                        </select>
                    </div>
                </div>
                <div class="form-column">
                    <div class="form-group">
                        <label for="eyeColor">Eye Color</label>
                        <select id="eyeColor" name="eyeColor" required>
                            <option value="brown">Brown</option>
                            <option value="black">Black</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="crimes">Crimes Committed</label>
                        <textarea id="crimes" name="crimes" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date of Sentence</label>
                        <input type="date" id="startDate" name="startDate" required onchange="calculateSentencePeriod()">
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date of Sentence</label>
                        <input type="date" id="endDate" name="endDate" required onchange="calculateSentencePeriod()">
                    </div>
                    <div class="form-group">
                        <label for="period">Period of Sentence</label>
                        <input type="text" id="period" name="period" class="readonly" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nextOfKin">Next of Kin Name</label>
                        <input type="text" id="nextOfKin" name="nextOfKin" required>
                    </div>
                    <div class="form-group">
                        <label for="relationship">Relationship</label>
                        <input type="text" id="relationship" name="relationship" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" id="contact" name="contact" required>
                    </div>
                    <div class="form-group">
                        <label for="comments">Comments</label>
                        <textarea id="comments" name="comments" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit">Register Prisoner</button>
			<br>
			<button class="link-button" onclick="location.href='warden.php';">
        Home
    </button>
        </form>
    </div>

    <script>
        function calculateAge() {
            const dob = new Date(document.getElementById('dob').value);
            const now = new Date();
            const diff = now - dob;
            const ageDate = new Date(diff);

            const years = ageDate.getUTCFullYear() - 1970;
            const months = ageDate.getUTCMonth();
            const days = ageDate.getUTCDate() - 1;

            document.getElementById('age').value = `${years} years, ${months} months, ${days} days`;
        }

        function calculateSentencePeriod() {
            const startDate = new Date(document.getElementById('startDate').value);
            const endDate = new Date(document.getElementById('endDate').value);
            const diff = endDate - startDate;

            if (isNaN(diff)) return;

            const periodDate = new Date(diff);

            const years = periodDate.getUTCFullYear() - 1970;
            const months = periodDate.getUTCMonth();
            const days = periodDate.getUTCDate() - 1;

            document.getElementById('period').value = `${years} years, ${months} months, ${days} days`;
        }
		document.getElementById('ppreg').addEventListener('submit', function(event) {
            var inmateCode = document.getElementById('inmateCode').value;
            if (!/^\d{4}$/.test(inmateCode)) {
                alert('Inmate Code must be exactly 4 digits.');
                event.preventDefault();
            }
        });
    </script>
</body>
</html>