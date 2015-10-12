<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../../web/css/bootstrap.css">
    </head>
    <body class="container container-fluid">
        <table class="table table-striped" >
            <tr>
   <td>PHP Version:</td>
   <td><?php echo phpversion(); ?></td>
   <td>5.0+</td>
   <td><?php echo (phpversion() >= '5.0') ? 'Ok' : 'Not Ok'; ?></td>
  </tr>
  <tr>
   <td>MySQL:</td>
   <td><?php echo extension_loaded('mysql') ? 'On' : 'Off'; ?></td>
   <td>On</td>
   <td><?php echo extension_loaded('mysql') ? 'Ok' : 'Not Ok'; ?></td>
   <tr>
   <td>Json:</td>
   <td><?php echo get_loaded_extensions()[array_search('json', get_loaded_extensions())] ?></td>
   <td>On</td>
   <td><?php echo extension_loaded('Json') ? 'Ok' : 'Not Ok'; ?></td>
   <tr>
   <td>PDO:</td>
   <td><?php echo get_loaded_extensions()[array_search('PDO', get_loaded_extensions())] ?></td>
   <td>On</td>
   <td><?php echo extension_loaded('pdo') ? 'Ok' : 'Not Ok'; ?></td>
   <tr>
   <td>Pdo_PgSQL:</td>
   <td><?php echo get_loaded_extensions()[array_search('pdo_pgsql', get_loaded_extensions())] ?></td>
   <td>On</td>
   <td><?php echo extension_loaded('pdo_pgsql') ? 'Ok' : 'Not Ok'; ?></td>

<tr>
    <td>
        <button type="submit" class="btn btn-info" ><a href="index.php?step=2">Siguiente</a></button>
</td>
</tr>
        </table>

      
 </body>
</html>
