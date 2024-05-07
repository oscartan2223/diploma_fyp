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
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Month', 'PetPal Service', 'Medical Service'],
            <?php
            $petpalData = array();
            $medicalData = array();
            $sql = "SELECT COUNT(appointment.AppointmentID) as NumberOfAppointment, MONTH(appointment.AppointmentDateTime) as Month, service.ServiceType from appointment inner join service on appointment.ServiceID=service.ServiceID WHERE YEAR(AppointmentDateTime) = 2023 group by ServiceType,Month;";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    if($row['ServiceType'] == 'PetPal Service') {
                        $petpalData[] = $row;
                    } else {
                        $medicalData[] = $row;
                    }
                }
            } else {
                echo "No appointments found";
            }

            foreach(range(1, 12) as $month) {
                $petpalCount = 0;
                $medicalCount = 0;
                foreach($petpalData as $petpalRow) {
                    if($petpalRow['Month'] == $month) {
                        $petpalCount = $petpalRow['NumberOfAppointment'];
                        break;
                    }
                }
                foreach($medicalData as $medicalRow) {
                    if($medicalRow['Month'] == $month) {
                        $medicalCount = $medicalRow['NumberOfAppointment'];
                        break;
                    }
                }
                echo "['".date("M", mktime(0, 0, 0, $month, 1, 2023))."',".$petpalCount.",".$medicalCount."],";
            }
            ?>
            ]);

            var options = {
            title: 'Service Sales by Month in 2023',
            curveType: 'function',
            legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

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
            <option value="report2.php">Service Sales Report</option>
            <option value="report.php">Appointment Distribution Report</option>
            
        </select>
    </div>
    <script>
        function changePage(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var url = selectedOption.value;
        window.location.href = url;
        }
    </script>
    <div id="curve_chart" class="chart animated"></div>
</body>

