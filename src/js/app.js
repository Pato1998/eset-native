$(document).ready(function () {

    const tipo_empleado_id = $('#tipo_empleado_id').val();
    setEspecialidadPorTipoEmpleado(tipo_empleado_id);

    $('#tipo_empleado_id').on('change', function () {
        let id = $(this).val();
        setEspecialidadPorTipoEmpleado(id);
    })

    $('#btnPromedioEdad').on('click', async function () {
        let response = await getPromedioEdad();
        const promedioEdad = JSON.parse(response);

        $('#text-msg-modal').html(`Promedio de edad de los empleados: ${promedioEdad}`);
        $('#msg-modal').modal('show');
    });
});

async function setEspecialidadPorTipoEmpleado(id) {
    let response = await getEspecialidadPorTipoEmpleado(id);
    const especialidades = JSON.parse(response);

    $('#especialidad_id').empty();

    especialidades.forEach(especialidad => {
        $('#especialidad_id').append(`<option value="${especialidad.id}">${especialidad.nombre}</option>`);
    });
}

async function getEspecialidadPorTipoEmpleado(id) {
    try {
        const data = $.ajax({
            url: `${appUrl}especialidades/getEspecialidadesPorTipoEmpleado/?tipo_empleado_id=${id}`,
            type: "GET",
        });

        return data;

    } catch (e) {
        console.log('error', e);
    }
}

async function getPromedioEdad() {
    try {
        const data = $.ajax({
            url: `${appUrl}empleados/getPromedioEdad`,
            type: "GET",
        });

        return data;

    } catch (e) {
        console.log(e);
    }
}