function Paginador(objeto, url) {
  window.location.href = url + '?page=' + $(objeto).val();

}

function activar(id, variable, url) {
  eliminar(id, variable, url);
}

function activarMasivo() {
  eliminarMasivo();
}

function eliminar(id, variable, url) {
  $.ajax({
    url: url,
    data: variable + '=' + id,
    dataType: 'json',
    type: 'POST',
    success: function (data)
    {
      location.reload();
    },
//        error: function (objeto,quepaso,otroobj){
//            alert("Estas viendo esto porque falle ");
//            alert("Paso lo siguiente: " +quepaso);
//        }
  });
}

function eliminarMasivo() {
  $('#myModalDeleteMasivo').modal('toggle');
}

$(document).ready(function () {
  $('#chkAll').click(function () {
    $('input[name="chk[]"]').each(function (index, element) {
      if ($('#chkAll').is(':checked') == true && $(element).is(':checked') == false) {
        $(element).prop('checked', true);
      } else if ($('#chkAll').is(':checked') == false && $(element).is(':checked') == true) {
        $(element).prop('checked', false);
      }
    });
  });
});


