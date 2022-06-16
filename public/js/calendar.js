document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("form");

    var calendarEl = document.getElementById('calendario');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:"es",
      headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,listWeek'
      },
      events: "/Centro-Adultos-nuevo/public/actividades/calendario/mostrar",

      dateClick:function(info){
          $("#actividad").modal("show");
      }
    });
    calendar.render();

    document.getElementById("btnGuardar").addEventListener("click", function(){
        const datos = new FormData(formulario);
        console.log(datos);
        console.log(formulario.title.value);

        //   axios.post("/Centro-Adultos-nuevo/public/actividades/agregar", datos).$then(
        //       (respuesta) =>{
        //           $("#actividades").modal("hide");
                 
        //       }
        //       ).catch(
        //           error=>{
        //               if(error.response){
        //                   console.log(error.response.data);
        //            }
        //           }
        //       )

    });
  });