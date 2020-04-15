$(document).ready(function () {

    console.log('oK');
    const tipo_empleado_id = $('#tipo_empleado_id').val();
    setEspecialidadPorTipoEmpleado(tipo_empleado_id);

    $('#tipo_empleado_id').on('change', function () {
        let id = $(this).val();

        setEspecialidadPorTipoEmpleado(id);
    })

    $('#btnPromedioEdad').on('click', async function () {
        const promedioEdad = await getPromedioEdad();

        $('#text-msg-modal').html(`Promedio de edad de los empleados: ${promedioEdad}`);
        $('#msg-modal').modal('show');
    });
})

async function setEspecialidadPorTipoEmpleado(id) {
    const especialidades = await getEspecialidadPorTipoEmpleado(id);

    $('#especialidad_id').empty();

    especialidades.forEach(especialidad => {
        $('#especialidad_id').append(`<option value="${especialidad.id}">${especialidad.nombre}</option>`);
    });

}

async function getEspecialidadPorTipoEmpleado(id) {
    try {
        const data = $.ajax({
            url: `${appUrl}especialidades/tipo-empleado/${id}`,
            type: "GET",
        });

        return data;

    } catch (e) {
        console.log(e);
    }
}

async function getPromedioEdad() {
    try {
        const data = $.ajax({
            url: `${appUrl}empleados/promedio-edad`,
            type: "GET",
        });

        return data;

    } catch (e) {
        console.log(e);
    }
}