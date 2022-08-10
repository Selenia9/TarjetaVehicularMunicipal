const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const expresiones = {


    ci: /^[a-zA-ZÀ-ÿ-Z0-9\s\_\-\(\)\*]{1,255}$/,
   	nombre: /^[a-zA-ZÀ-ÿ\s]{1,255}$/,
    domicilio: /^[a-zA-ZÀ-ÿ-Z0-9\s\_\-\"\'\(\)\/]{1,255}$/,
    telefono: /^[a-zA-ZÀ-ÿ-Z0-9\s\_\-]{1,255}$/,
    placa: /^[a-zA-ZÀ-ÿ-Z0-9\s\_\-]{1,255}$/,
    marca: /^[a-zA-ZÀ-ÿ-\s\_\-]{1,255}$/,
    modelo: /^\d{1,4}$/,
    color: /^[a-zA-ZÀ-ÿ\s]{1,255}$/,
    tipoVehiculo: /^[a-zA-ZÀ-ÿ-Z0-9\s\-\_]{1,255}$/,
    combustible: /^[a-zA-ZÀ-ÿ\s]{1,255}$/,
    chasis: /^[a-zA-ZÀ-ÿ-Z0-9\s\_\-\*\+\(\)\"]{1,255}$/,
    motor: /^[a-zA-ZÀ-ÿ-Z0-9\s\_\-\*\+\(\)\"]{1,255}$/,
    capacidad: /^[a-zA-ZÀ-ÿ-Z0-9\s\_\-\/\.\,]{1,255}$/,
    asiento: /^\d{1,10}$/,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
        case "ci":
			validarCampo(expresiones.ci, e.target, 'ci');
		break;
        case "domicilio":
			validarCampo(expresiones.domicilio, e.target, 'domicilio');
		break;
        case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
        case "placa":
        validarCampo(expresiones.placa, e.target, 'placa');
        break;
        case "marca":
        validarCampo(expresiones.marca, e.target, 'marca');
        break;
        case "modelo":
        validarCampo(expresiones.modelo, e.target, 'modelo');
        break;
        case "color":
        validarCampo(expresiones.color, e.target, 'color');
        break;
        case "tipoVehiculo":
        validarCampo(expresiones.tipoVehiculo, e.target, 'tipoVehiculo');
        break;
        case "combustible":
        validarCampo(expresiones.combustible, e.target, 'combustible');
        break;
        case "chasis":
        validarCampo(expresiones.chasis, e.target, 'chasis');
        break;
        case "motor":
        validarCampo(expresiones.motor, e.target, 'motor');
        break;
        case "capacidad":
        validarCampo(expresiones.capacidad, e.target, 'capacidad');
        break;
        case "asiento":
        validarCampo(expresiones.asiento, e.target, 'asiento');
        break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}



inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});







