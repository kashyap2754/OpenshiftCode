<html>

  <head>
   <title>Test</title>
  </head>

  <body bgcolor="white">

  <?
  $link = pg_Connect("dbname=sampledb user=postgres password=password");
  $result = pg_exec($link, "select * from person");
  $numrows = pg_numrows($result);
  echo "<p>link = $link<br>
  result = $result<br>
  numrows = $numrows</p>
  ";
  ?>

  <table border="1">
  <tr>
   <th>Last name</th>
   <th>First name</th>
   <th>ID</th>
  </tr>
  <?

   // Loop on rows in the result set.

   for($ri = 0; $ri < $numrows; $ri++) {
    echo "<tr>\n";
    $row = pg_fetch_array($result, $ri);
    echo " <td>", $row["fname"], "</td>
   <td>", $row["lname"], "</td>
   <td>", $row["id"], "</td>
  </tr>
  ";
   }
   pg_close($link);
  ?>
  </table>

  </body>

  </html>