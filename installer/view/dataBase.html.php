<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../../web/css/bootstrap.css">
    </head>
    <body>
        <?php if (isset($_GET['error']) and $_GET['error'] === true): ?>
            Ocurrio un error
        <?php endif ?>
        <form action="index.php?step=3" method="POST">
            <div class="form-horizontal-heading">
                <div class="form-group" >
                    <div>
                        <label class="col-sm-2 control-label">Host De La BD</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" value="<?php echo (isset($_POST['host'])) ? $_POST['host'] : '' ?>" type="text" name="host" placeholder="Inserte el host de la base de datos" required><br>
                    </div>
                </div>
                <div class="form-horizontal-heading">
                    <div class="form-group" >
                        <div>
                            <label class="col-sm-2 control-label">Controlador</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="driver" required>
                                <option value="">Seleccione un controlador</option>
                                <option value="pgsql" <?php echo (isset($_POST['driver']) and $_POST['driver'] === 'pgsql') ? 'selected' : '' ?>>PostgreSQL</option>
                                <option value="mysql" <?php echo (isset($_POST['driver']) and $_POST['driver'] === 'mysql') ? 'selected' : '' ?>>MySQL</option>
                            </select><br>

                        </div>
                    </div>

                    <div class="form-group" >
                        <div>
                            <label class="col-sm-2 control-label">Puerto</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="port" placeholder="Digite el puerto" required><br>

                        </div>
                    </div>
                </div>

                <div class="form-group" >
                    <div>
                        <label class="col-sm-2 control-label">nombre de la BD</label>
                    </div>
                    <div class="col-sm-9">
                        <input  class="form-control" type="text" name="dbName" placeholder="Nombre de la base de datos" required><br>

                    </div>
                </div>

            </div>

            <div class="form-group" >
                <div>
                    <label class="col-sm-2 control-label">Usuario de la BD</label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control" type="text" name="dbUser" placeholder="Usuario de la base de datos" required><br>

                </div>
            </div>
        </div>

        <div class="form-group" >
            <div>
                <label class="col-sm-2 control-label">Password</label>
            </div>
            <div class="col-sm-9">
                <input class="form-control" type="password" name="dbPass" placeholder="Contraseña de la base de datos" required><br>

            </div>
        </div>
    </div>

    <div class="form-group" >
        <div>
         
        </div>
        <div class="col-sm-9">
            <input class="btn btn-info" type="submit" value="Continuar">
        </div>
    </div>


    
    </div>
</form>
<?php if (isset($_GET['error']) and $_GET['error'] === true): ?>
    <?php echo $_GET['error_message'] ?>
<?php endif ?>
</body>
</html>
