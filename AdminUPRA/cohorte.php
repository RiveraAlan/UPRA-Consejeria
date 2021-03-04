<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    h2 {
      text-align: center;
    }

    * {
      box-sizing: border-box;
    }

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #282828;
}


    /* Create two equal columns that floats next to each other */
    .column {
      float: left;
      width: 50%;
      padding: 10px;
      height: 840px;
      /*Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    body, h1, h3, input { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      }
      h1, h3 {
      padding: 12px 0;
      font-weight: 400;
      }
      h1 {
      font-size: 28px;
      }
      .main-block, .info {
      display: flex;
      flex-direction: column;
      }
      .main-block {
      justify-content: center;
      align-items: center;
      width: 100%;
      min-height: 100%;
      background: url("/uploads/media/default/0001/01/49bff73f282c2c21f3341f1fe457fe35337b1792.jpeg") no-repeat center;
      background-size: cover;
      }
      form {
      width: 86%; 
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: #ebebeb; 
      }
      .info-item {
      width: 100%;
      }
      input {
      width: calc(100% - 57px);
      height: 36px;
      padding-left: 10px; 
      margin: 0 0 12px -5px;
      border-radius: 0 5px 5px 0;
      border: solid 1px #cbc9c9;
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #fff; 
      }
      .icon {
      padding: 9px 15px;
      margin-top: -1px;
      border-radius: 5px 0 0 5px;
      border: solid 0px #cbc9c9;
      background: #666;
      color: #fff;
      }
      input[type=radio] {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      text-indent: 32px;
      cursor: pointer;
      margin-bottom: 10px;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      border: 0.5px solid #e0c200;
      background: #fff;
      }
      label.radio:after {
      content: "";
      position: absolute;
      width: 8px;
      height: 4px;
      top: 5px;
      left: 4px;
      border-bottom: 3px solid #e0c200;
      border-left: 3px solid #e0c200;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      textarea {
      width: 99%;
      margin-bottom: 12px;
      }
      button {
      width: 100%;
      padding: 8px;
      border-radius: 5px; 
      border: none;
      background: #e0c200; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #e0c200;
      }
      .grade-type div {
      display: flex;
      margin: 6px 0;
      }
      @media (min-width: 568px) {
      .info {
      flex-flow: row wrap;
      justify-content: space-between;
      }
      .info-item {
      width: 48%;
      }
      }


  </style>
</head>

<body>

  <h2>Crear Cohorte Académico</h2>

  <div class="row">
    <div class="column" style="background-color:#fff;">
      <h2>Nuevo Curso</h2>
      <p>Instrucciones: Complete los campos requeridos y presione para crear nuevo curso.</p>

      <div class="container">
        <form>
          <div class="form-group">
            <label for="sel1">Seleccione el departamento (Concentración):</label>
            <select class="form-control" id="sel1">
              <option></option>
              <option>Ciencias de Cómputos</option>
            </select>
            <br>
          </div>
      </div>
      <!-- Cambiar fname, lname, id, name  <label for="lname">Descripción del Curso:</label>-->
      <h3>Información del Curso</h3>
      <label> Código </label><br>
      <input type="text" id="crse_code" name="crse_code" placeholder="EJEM 1234"><br><br>
      <label> Descripción<label><br>
          <input type="text" id="crse_description" name="crse_description"><br><br>
          <label> Créditos</label><br>
          <input type="text" id="crse_credits" name="crse_credits"><br><br>

          <p>Curso se clasifica como:</p>
          <input type="radio" id="concentracion" name="clasificacion" value="concentracion">
          <label for="concentracion" class="radio">Requisito de Concentración</label><br>
          <input type="radio" id="general" name="clasificacion" value="general">
          <label for="general" class="radio">Requisito General</label><br>



          <button onclick='myFunction()'>Submit</button>

          </form>

    </div>
    <div class="column" style="background-color:#e0c200;">
      <h2>Cohorte Completo</h2>
      <p>Instrucciones: Presione el botón de confirmar para crear su nuevo cohorte.</p>
<h2>Concentración</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Créditos</th>
            <th>Año</th>
            <th>Semestre</th>
        </tr>
        </thead>
        <tbody id="concentracion">
        
        <tbody>
    </table>
</div>
<h2>General</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Créditos</th>
            <th>Año</th>
            <th>Semestre</th>
        </tr>
        </thead>
        <tbody id="general">
        
        <tbody>
    </table>
</div>
          <h2>Créditos adicionales</h2>
          <p>Si el cohorte requiere créditos en: electivas departamentales, electivas libres, educación general CISO,
            educación general HUMA indique la cantidad en el espacio correspondiente. </p>

<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Requisito Departamental </th>
            <th>Requisito Electiva Libre</th>
            <th>Requisitos Ciencias Sociales</th>
            <th>Requisitos Humanidades</th>
        </tr>
        </thead>
        <tbody id="requisito">
        <td>
          <input type="number" id="departamental" name="departamental"></td>
          <td>
          <input type="number" id="free" name="free"></td>
          <td>
          <input type="number" id="ciso" name="ciso"></td>
          <td>
          <input type="number" id="huma" name="huma"></td>
        <tbody>
    </table>
</div>

          
    </div>
  </div>

</body>

<script>
  function myFunction() {
  crse_code = document.getElementById("crse_code").value;
  crse_description = document.getElementById("crse_description").value;
  crse_credits = document.getElementById("crse_credits").value;
  const rbs = document.querySelectorAll('input[name="clasificacion"]');
            let clasificacion;
            for (const rb of rbs) {
                if (rb.checked) {
                    clasificacion = rb.value;
                }
            }
           
  if (clasificacion === "concentracion"){
  document.getElementById("concentracion").innerHTML = `<tr>
            <td>${crse_code}</td>
            <td>${crse_description}</td>
            <td>${crse_credits}</td>
            <td>Año 1</td>
            <td>Semestre 1</td>
        </tr>`;
  } else {
    document.getElementById("general").innerHTML = `<tr>
            <td>${crse_code}</td>
            <td>${crse_description}</td>
            <td>${crse_credits}</td>
            <td>Año 1</td>
            <td>Semestre 1</td>
        </tr>`;
  }
}

</script>

</html>