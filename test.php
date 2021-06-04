<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2018.css">

    <style>

        .box1{
            width: fit-content;
            border: 1px solid #1C6EA4;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
        }
        .title-div{
            align: center
        }
        table.blueTable {
            border: 1px solid #1C6EA4;
            background-color: #EEEEEE;
            width: 30%;
            text-align: left;
            border-collapse: collapse;
        }
        table.blueTable td, table.blueTable th {
            border: 1px solid #AAAAAA;
            padding: 3px 16px;
        }
        table.blueTable tbody td {
            font-size: 13px;  
        }
        table.blueTable tr:nth-child(even) {
            background: #f3a9b8;
        }
        table.blueTable thead {
            background: #FFFFFF;
        }
        table.blueTable thead th {
            font-size: 15px;
            font-weight: bold;
            color: #000000;
            text-align: center;
            border-left: 2px solid #D0E4F5;
        }
        table.blueTable thead th:first-child {
            border-left: none;
        }

        table.blueTable tfoot td {
            font-size: 14px;
        }
        table.blueTable tfoot .links {
            text-align: right;
        }
        table.blueTable tfoot .links a{
            display: inline-block;
            background: #1C6EA4;
            color: #FFFFFF;
            padding: 2px 8px;
            border-radius: 5px;
        }
        .myButton {	
            background-color:#fe1a00;
            border-radius:4px;
            border:2px solid #d83526;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:16px;
            font-weight:bold;
            padding:6px 12px;
            text-decoration:none;
            text-shadow:0px 1px 0px #b23e35;
        }
        .myButton:hover {
            background-color:#ce0100;
        }
        .myButton:active {
            position:relative;
            top:1px;
        }
    </style>
    <title>Shuttle Booking</title>
</head>
<body>
    <div class="availab">
        <br><br>
        <h1><center>AVAILABLE SHUTTLES </center></h1><br>
        
        <div class ="box1" position: center>
          <table class="blueTable">
            <thead>
                <tr>
                    <th>SHUTTLE ID</th>
                    <th>SOURCE</th>
                    <th>DESTINATION</th>
                    <th>ARRIVAL</th>
                    <th>DEPARTURE</th>
                    <th>AVAILABLE SEATS</th>
                    <th>BOOK</th>
                </tr>
            </thead> 
            <tbody>
                <tr>
                    <td>SH1003</td>
                    <td>SJT</td>
                    <td>TT</td>
                    <td>3:00 PM</td>
                    <td>3:05 PM</td>
                    <td>60</td>
                    <td><a class="myButton"> BOOK </a></td>
                </tr>
                <tr>
                    <td>SH1003</td>
                    <td>SJT</td>
                    <td>TT</td>
                    <td>3:00 PM</td>
                    <td>3:05 PM</td>
                    <td>60</td>
                    <td><a class="myButton"> BOOK </a></td>
                </tr>
                <tr>
                    <td>SH1003</td>
                    <td>SJT</td>
                    <td>TT</td>
                    <td>3:00 PM</td>
                    <td>3:05 PM</td>
                    <td>60</td>
                    <td><a class="myButton"> BOOK </a></td>
                </tr>
            </tbody>    
          </table>
         
        </div>
    </div>
</body>
</html>