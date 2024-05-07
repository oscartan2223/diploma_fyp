<?php
include "src/session.php";
include "src/conn.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>PetPal - Report</title>
    <link rel="stylesheet" type="text/css" href="report.css">
    <script src="https://kit.fontawesome.com/680d8c5a2a.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

        var data = google.visualization.arrayToDataTable([
        ['Type of Service', 'Number of Appointments',],
        <?php
        $sql = "SELECT COUNT(appointment.AppointmentID) as NumberOfAppointment, service.ServiceName from appointment inner join service on appointment.ServiceID=service.ServiceID group by ServiceName;";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                echo "['".$row['ServiceName']."',".$row['NumberOfAppointment']."],";
            }
        }else{
            echo "No appointments found";
        }
        ?>
        ]);

        var options = {
        title: 'Appointment Distribution by Different Type of Service',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Number of Appointments',
          minValue: 0
        },
        vAxis: {
          title: 'Type of Service'
        }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
    </script>
</head>
<body>
    <div class="navbar">
    <nav>
                <img src="petpal.png">
                <ul>
                    <li><a href="AdminMain.php">Home</a></li>
                    <li><a href="viewstaff.php">Staff</a></li>
                    <li><a href="viewappointment.php">Appointment</a></li>
                    <li><a href="report.php">Report</a></li>
                </ul>
                <a href="adminprofile.php"><i class="fa-solid fa-user"></i></a>  
            </nav>
    </div> 
    <script>
        let subMenu = document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("openMenu");
        }
    </script>
    <div class="input_wrap">
        <label for="report_select">Select Report</label>
        <select name="Appointment_Time" id="appointment_time" onchange="changePage(this)">
            <option value="report.php">Appointment Distribution Report</option>
            <option value="report2.php">Service Sales Report</option>
        </select>
    </div>
    <script>
        function changePage(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var url = selectedOption.value;
        window.location.href = url;
        }
    </script>
    <div class="container">
        <div id="chart_div" class="chart animated"></div>
    </div>
</body>
</html>