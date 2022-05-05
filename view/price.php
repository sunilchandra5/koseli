<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    * {
  font-family: sans-serif; /* Change your font family */
}

.content-table {
    position: relative;   
    left: 37%;
  border-collapse: collapse;
  margin:4%;
  width: 600px;
  height: 200px;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #d6491e;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #d6491e;
}


h2 {
    position: relative;
    left: 41%;
    padding-top: 5%;
}
</style>

</head>
<body>
   <h2> As per your courier's weight the price is listed below:</h2>
<table class="content-table">
  <thead>
    <tr>
      <th>S.n</th>
      <th>Weight in Kg</th>
      <th>Price Rs.</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>upto 1kg</td>
      <td>Rs.120</td>
      
    </tr>
    <tr class="active-row">
      <td>2</td>
      <td>1kg to 2kg</td>
      <td>Rs.200</td>
      
    </tr>
    <tr>
      <td>3</td>
      <td>2kg to 4kg</td>
      <td>Rs.250</td>
      
    </tr>
    <tr>
      <td>4</td>
      <td>4kg to 5kg</td>
      <td>Rs.300</td>
     
    </tr>
    <tr>
      <td>5</td>
      <td>5kg to 7kg</td>
      <td>Rs.400</td>
     
    </tr>
    <tr>
      <td>6</td>
      <td>7kg to above</td>
      <td>Rs.500</td>
     
    </tr>
  </tbody>
</table>
</body>
</html>