<?php
    session_start();
?>
<html>
    <style>
        body {
              margin:0;
              font-family:sans;
            }
            
            table {
              width:100%
            } th {
              background:#666;
              color:#fff;
              text-align: center;
            } td {
              padding:5px;
            }
            
            h1 {
              font-weight: normal;
            }
            .receiptContainer{
                border: 2px dashed black;
                width: 50%;
                margin: 0;
                display:inline-block;
            }
    </style>
</html>

<?php
    $db = "wingmat_WoK";
        $local = "localhost";
        $dbuser = "wingmat_Matt";
        $dbpass = "Matthewwing98";
        $link = new mysqli($local, $dbuser, $dbpass, $db);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        $sql = $link->prepare("SELECT Date, startShift, endShift, EMPLOYEE.Hourly_Pay, EMPLOYEE.EmpID, EMPLOYEE.Name FROM EmployeeSchedule INNER JOIN EMPLOYEE ON ? = EMPLOYEE.SSN ORDER BY EmployeeSchedule.Date DESC" );
        $sql->bind_param('s', $_SESSION['SSN']);
        $sql->execute();
        $result = $sql->get_result();
        if(mysqli_num_rows($result) == 0){
            echo "<h3>It seems that you are not scheduled for work this day</h3>";
        }else{
            while($arrayOfSchedules=mysqli_fetch_assoc($result)){
                    echo 
                    "<div class = 'receiptContainer'><table width = 100%>
                    <tr>
                        <th>Employee ID</th>
                        <td>" . $arrayOfSchedules['EmpID'] . "</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>" . $arrayOfSchedules['Name'] . "</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>" . date('m-d-Y', strtotime($arrayOfSchedules['Date'])) . "</td>
                    </tr>
                    <tr>
                        <th>Start Shift</th>
                        <td>" . date('h:i:s a', strtotime($arrayOfSchedules['startShift'])) . "</td>
                    </tr>
                    <tr>
                        <th>End Shift</th>
                        <td>" . date('h:i:s a', strtotime($arrayOfSchedules['endShift'])) ."</td>
                    </tr>
                    <tr>
                        <th>HourlyPay</th>
                        <td>" . $arrayOfSchedules['Hourly_Pay'] ."</td>
                    </tr>
                    </table></div>";
                }
            }
?>
