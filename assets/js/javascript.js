$(document).ready(function () {});
//validacion de los campos del formulario para la creacion de las peliculas en la base de datos
$("#crear").validate({
  rules: {
    nombre: "required",
    fecha_estreno: "required",
    sinopsis: "required",
    imagen: "required",
  },
  messages: {
    nombre: "Por favor, Ingresa el nombre de la pelicula",
    fecha_estreno: "Por favor, Ingresa el fecha de estreno de la pelicula",
    sinopsis: "Por favor, Ingresa la sinopsis de la pelicula",
    imagen: "Por favor, Adjunta la portada de la pelicula",
  },
});

//ajax para la busqueda de las peliculas en la pestaña de mis peliculas
function getData(campo) {
  $.ajax({
    url: "getByName",
    type: "POST",
    data: { campo: campo },

    success: function (respuesta) {
      $("#peliculas").html(respuesta);
    },
  });
}

$(document).on("keyup", "#campo", function () {
  let valor = $(this).val();
  if (valor != "") {
    getData(valor);
  }
});
