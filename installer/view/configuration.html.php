<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../../web/css/bootstrap.css">
    </head>
    <body>
        <form action="index.php?step=4" method="POST">
            <div  class="form-horizontal-heading">
                <div class="form-group" >
                    <div>
                        <label class="col-sm-2 control-label">Row Grid</label>
                    </div>
                    <div class="col-sm-9">
                        <input  class="form-control" type="text" name="RowGrid" placeholder="Numero de lineas por regilla"><br>

                    </div>
                </div>
                <div class="form-group" >
                    <div>
                        <label class="col-sm-2 control-label">Pacth Absolute</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="PathAbsolute" placeholder="Dirección en servidor de la carpeta raíz"><br>

                    </div>
                </div>
                  <div class="form-group" >
                    <div>
                        <label class="col-sm-2 control-label">Url Base</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="UrlBase" placeholder="Dirección de la web"><br>
                
                    </div>
                </div>
                  <div class="form-group" >
                    <div>
                        <label class="col-sm-2 control-label">Scope</label>
                    </div>
                    <div class="col-sm-9">
                        <select class="form-control" name="Scope">
                    <option value="">Seleccione modo de instalación</option>
                    <option value="dev">Desarrollo</option>
                    <option value="prod">Producción</option>
                </select><br>
                    </div>
                </div>
                  <div class="form-group" >
                    <div>
                        <label class="col-sm-2 control-label">Idioma</label>
                    </div>
                    <div class="col-sm-9">
                        <select class="form-control" name="idioma">
                    <option value="">Seleccione idioma</option>
                    <option value="es">Español</option>
                    <option value="en">English</option>
                </select><br>
                    </div>
                </div>
                  <div class="form-group" >
                    <div>
                        <label class="col-sm-2 control-label">Formato Tiempo</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="FormatTimestamp" value="Y-m-d H:i:s" placeholder="Formato de fecha y hora"><br>
               
                    </div>
                </div>
                  <div class="form-group" >
                    <div>
                        <label class="col-sm-2 control-label">Cookie Path</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="CookiePath"  placeholder="coloque la direccion del proyecto "><br>
                
                    </div>
                </div>
                 <div class="form-group" >
                    <div>
                        <label class="col-sm-2 control-label">Cookie Time</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="CookieTime"  placeholder="ingrese horas en segundos "><br>
                
                    </div>
                </div>
                  <div class="form-group" >
                    <div>
                       >
                    </div>
                    <div class="col-sm-9">
                        <input class="btn btn-info" type="submit" value="Instalar">
                    </div>
                </div>
                
            </div>
        </form>
    </body>
</html>
