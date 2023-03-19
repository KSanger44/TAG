<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="nb">
        <button onclick="window.location.href='home.html'">Home</button>
        <button onclick="window.location.href='view.html'">View</button>
        <button onclick="window.location.href='add.html'">Add</button>
        <button onclick="window.location.href='modify.html'">Modify</button>
    </div>
    <button id="trb" onclick="window.location.href='logout.html'">Log out</button>
    <h1>Modify Capstone</h1>
    <div id="modify">
          <form action="" method="post">
            <label for="projects">Select Capstone:</label>
            <select id="projects" name="projlst">

            <?php
                //connect to the db schema
                session_start();
                ob_start();
                $conn = new mysqli("localhost", "kmkelmo1", load_db_pass(), "kmkelmo1_student_showcase"); 
                function load_db_pass() {
                    $filename = "/home/kmkelmo1/kmkelm.org/kmkelmoftp/kmk.txt";
                    $handle = fopen($filename, "r");
                    $contents = fread($handle, filesize($filename));
                    fclose($handle);

                    return $contents;
                }
            
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }  
              

              $sql = "SELECT * FROM project";
              $result = mysqli_query($conn,$lsql);
              $row = mysqli_fetch_array($lresult,MYSQLI_ASSOC);

              //display the sql result set in an html table
              $table = $conn->query($sql);
              if ($table->num_rows > 0) {
                //output each result row
                while($row = $result->fetch_assoc()){
                  echo "<option value ='" . $row['pID'] . "'>" . $row['title'] . "  </option>";
                }
              }     
            ?>
            </select><br>

            
            Client <input type="text" id="client" name="client"><br>
            Year<input type="number" id="year" name="year"><br>
            Title<input type="text" id="title" name="title"><br>
            Description<input type="text" id="desc" name="desc"><br>
            Key Words<br><br>
            Key Words<br><br>
            <ul class="checkboxes">
                <label><input type="checkbox" name="Algorithms">Algorithms</label><br>
                <label><input type="checkbox" name="CMS">CMS</label><br>
                <label><input type="checkbox" name="Communication">Communication</label><br>
                <label><input type="checkbox" name="Contest">Contest</label><br>
                <label><input type="checkbox" name="Database">Database</label><br>
                <label><input type="checkbox" name="e-Commerce">e-Commerce</label><br>
                <label><input type="checkbox" name="Education">Education</label><br>
                <label><input type="checkbox" name="Events">Events</label><br>
                <label><input type="checkbox" name="External">External</label><br>
                <label><input type="checkbox" name="ForProfit">External - for Profit</label><br>
                <label><input type="checkbox" name="File Storage">File Storage</label><br>
                <label><input type="checkbox" name="Internal">Internal</label><br>
                <label><input type="checkbox" name="KMS">KMS</label><br>
                <label><input type="checkbox" name="Marketing">Marketing</label><br>
                <label><input type="checkbox" name="Networks">Networks</label><br>
                <label><input type="checkbox" name="Open Source">Open Source</label><br>
                <label><input type="checkbox" name="Procedures">Procedures</label><br>
                <label><input type="checkbox" name="Programming">Programming</label><br>
                <label><input type="checkbox" name="Queries">Queries</label><br>
                <label><input type="checkbox" name="Resources">Resources</label><br>
                <label><input type="checkbox" name="Security">Security</label><br>
                <label><input type="checkbox" name="Social">Social</label><br>
                <label><input type="checkbox" name="Web">Web</label><br>
                <label><input type="checkbox" name="Website">Website</label><br>
                <label><input type="checkbox" name="Workshop">Workshop</label><br>
            </ul>
            <input type="submit" id="deleteproj" name="deleteproj" value="Delete" style="width: 50%; float: left;">
            <input type="submit" id="modproj" name="modproj" value="Modify" style="width: 50%; float: left">
          </form>         
          </div>
</body>
</html>
