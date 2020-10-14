<?php 
session_start();

// Make sure if user not signed in they cannot see this page.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consejeria - UPRA</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="cita.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.structure.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.theme.css">
</head>
<body>
        <header>
            <div class="logo-area">
                <h1 class="logo">Consejería UPRA</h1>
            </div>
            
            
        </header>
        <main>
            <div class="container">
                <div class="student">
                    <div class="student-info">
                        <div class="name">
                           <?php  echo $_SESSION['fullName'] ?>
                        </div>
                        <div class="email">
                            Correo: <?php echo $_SESSION['email']?>
                        </div>
                        <div class="academic-year">
                            Año académico: 2020-2021
                        </div>
                        <div class="student-number">
                            Num. estudiante: <?php echo $_SESSION['studentNumber']?>
                        </div>
                    </div>
                        <div class="logout">
                            <button><a href="private/logout.php">Log out</a></button>
                        </div>
                </div>
                

                <div class="actions">
                    <ul class="actions-list">
                        <li class="action"><a href="consejeria.php">Consejería</a></li>
                        <li class="action"><a href="cita.html">Sacar cita con Profesora</a></li>
                        <li class="action"><a href="sugerencias.html">Hacer sugerencias de clases</a></li>
                    </ul>
                </div>

                <section class="appointment">
                        <h2 class="appointment-form-title">Sacar cita</h2>
                        <form action="private/process-appointment.php" method="POST" class="appointment-form">
                       
                           <?php 
                               include 'private/appointment-status.php';
                                
                                if($isAppointmentValid){
                                    echo '<div class="success-message">La cita con el/la consejero(a) fue separada para el '.$fecha_cita.'.</div>';
                                } else {
                                    if((isset($_GET['is-date-empty']) AND boolval($_GET['is-date-empty'])) OR (isset($_GET['is-hour-chosen-empty']) AND boolval($_GET['is-hour-chosen-empty']))){
                                        echo '<div class="error-message">*Escoga el día y la hora de la cita.</div>';
                                        }
                                    echo ' <div class="form-group d-flex">
                                    <div class="form-label">
                                        <label>Name</label>
                                    </div>
                                        <div class="form-controls d-flex">
                                        <input type="text" name="first-name" value="'.$_SESSION['firstName'].'" placeholder="First Name" class="form-control" readonly>
                                        <input type="text" name="last-name" value="'.$_SESSION['lastNameU'].' '.$_SESSION['lastNameD'].'" placeholder="Last Name"  class="form-control" readonly>
                                        </div>
                                       </div>';
                                    echo '<div class="form-group d-flex">
                                          <div class="form-label">
                                         <label>E-mail</label>
                                         </div>
                                         <input type="email" name="email"  value="'. $_SESSION['email'].'" placeholder="E-mail" class="form-control" readonly> 
                                         </div>';
                                    echo ' <div class="form-group d-flex">
                                         <div class="calendar-box">';

                                                $dateField = '<input type="text" name="date" onchange="getAvailableDates(this.value)" id="datepicker"  type="text" class="form-control"/>';
                                                if(isset($_GET['is-date-empty']) AND boolval($_GET['is-date-empty'])){
                                                    $dateField = '<input type="text" name="date" onchange="getAvailableDates(this.value)" id="datepicker"  type="text" class="invalid"/>';
                                                } 
                                                echo $dateField;
                                            
                                        echo '<div class="hour-chosen-container"></div>
                                            </div>
                                            <div class="spots-available">
                                             </div>
                                             </div>';
                                        echo '<div class="submitBtn">
                                        <button type="submit">Submit</button>
                                    </div>';
                                }
                           ?>
                        </form>
                </section>
            </div>

          
            <!-- Tab links -->


        </main>
        <footer>

        </footer>

        <script src="index.js"></script> 
        <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
        <script src="jqueryui/jquery-ui.js"></script>
        <script>
            $("#datepicker").datepicker({
                changeMonth: true,
                minDate: new Date(2020, 09, 4),
                maxDate: new Date(2020, 10, 4)
            });
        </script>

        <script>
            function getAvailableDates(date){
                var xmlhttp = new XMLHttpRequest();
                 xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
               document.querySelector('.spots-available').innerHTML  =  this.responseText;
             
            }
      }
      let dateFormatted = date.split('/').reverse();
      const temp = dateFormatted[1];
      dateFormatted[1] = dateFormatted[2];
      dateFormatted[2] = temp;
      dateFormatted = dateFormatted.join('-');
      
      xmlhttp.open("GET", "private/get-available-dates.php?date=" + dateFormatted, true);
      xmlhttp.send();
    };
    
       function getHourOfMeeting(hour){
        let editHour = hour.split(' ');
        editHour = editHour[0];
        
        
        let input = document.createElement("INPUT");
        input.setAttribute("type", "text");
        input.className = 'hour-chosen';
        input.name = "hour-chosen";
        input.setAttribute('value', editHour);
        input.readOnly = true;
        document.querySelector('.hour-chosen-container').innerHTML = 'Hour: ';
        document.querySelector('.hour-chosen-container').appendChild(input);
       }
        </script>
</body>
</html>