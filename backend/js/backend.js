/**
* Funcion para mostrar el spin de load cuando se ejecuta al guna operacion asyncronica
*/
function loader() {
  $('#loader').css('display','flex');
  return;
}

function createToasts(clase, title, subtitle, body) {
  $('#toastsContainerTopRight').show();
  $(document).Toasts('create', {
    class: clase,
    title: title,
    subtitle: subtitle,
    autohide: true,
    autoremove: true,
    delay: 2000,
    body: body
  })
}