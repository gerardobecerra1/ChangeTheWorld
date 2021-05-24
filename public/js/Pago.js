$(document).ready(function () {
	const tarjeta = document.querySelector('#tarjeta'),
		btnAbrirFormulario = document.querySelector('#btn-abrir-formulario'),
		formulario = document.querySelector('#formulario-tarjeta'),
		numeroTarjeta = document.querySelector('#tarjeta .numero'),
		nombreTarjeta = document.querySelector('#tarjeta .nombre'),
		logoMarca = document.querySelector('#logo-marca'),
		firma = document.querySelector('#tarjeta .firma p'),
		mesExpiracion = document.querySelector('#tarjeta .mes'),
		yearExpiracion = document.querySelector('#tarjeta .year');
	ccv = document.querySelector('#tarjeta .ccv');

	// * Volteamos la tarjeta para mostrar el frente.
	const mostrarFrente = () => {
		if (tarjeta.classList.contains('active')) {
			tarjeta.classList.remove('active');
		}
	}

	// * Rotacion de la tarjeta
	tarjeta.addEventListener('click', () => {
		tarjeta.classList.toggle('active');
	});

	// * Boton de abrir formulario
	btnAbrirFormulario.addEventListener('click', () => {
		btnAbrirFormulario.classList.toggle('active');
		formulario.classList.toggle('active');
	});

	// * Select del mes generado dinamicamente.
	for (let i = 1; i <= 12; i++) {
		let opcion = document.createElement('option');
		opcion.value = i;
		opcion.innerText = i;
		formulario.selectMes.appendChild(opcion);
	}

	// * Select del año generado dinamicamente.
	const yearActual = new Date().getFullYear();
	for (let i = yearActual; i <= yearActual + 8; i++) {
		let opcion = document.createElement('option');
		opcion.value = i;
		opcion.innerText = i;
		formulario.selectYear.appendChild(opcion);
	}

	// * Input numero de tarjeta
	formulario.inputNumero.addEventListener('keyup', (e) => {
		let valorInput = e.target.value;

		formulario.inputNumero.value = valorInput
			// Eliminamos espacios en blanco
			.replace(/\s/g, '')
			// Eliminar las letras
			.replace(/\D/g, '')
			// Ponemos espacio cada cuatro numeros
			.replace(/([0-9]{4})/g, '$1 ')
			// Elimina el ultimo espaciado
			.trim();

		numeroTarjeta.textContent = valorInput;

		if (valorInput == '') {
			numeroTarjeta.textContent = '#### #### #### ####';

			logoMarca.innerHTML = '';
		}

		if (valorInput[0] == 4) {
			logoMarca.innerHTML = '';
			const imagen = document.createElement('img');
			imagen.src = 'IMG/Tarjeta/logos/visa.png';
			logoMarca.appendChild(imagen);
		} else if (valorInput[0] == 5) {
			logoMarca.innerHTML = '';
			const imagen = document.createElement('img');
			imagen.src = 'IMG/Tarjeta/logos/mastercard.png';
			logoMarca.appendChild(imagen);
		}

		// Volteamos la tarjeta para que el usuario vea el frente.
		mostrarFrente();
	});

	// * Input nombre de tarjeta
	formulario.inputNombre.addEventListener('keyup', (e) => {
		let valorInput = e.target.value;

		formulario.inputNombre.value = valorInput.replace(/[0-9]/g, '');
		nombreTarjeta.textContent = valorInput;
		firma.textContent = valorInput;

		if (valorInput == '') {
			nombreTarjeta.textContent = 'Alberto Hernandez';
		}

		mostrarFrente();
	});

	// * Select mes
	formulario.selectMes.addEventListener('change', (e) => {
		mesExpiracion.textContent = e.target.value;
		mostrarFrente();
	});

	// * Select Año
	formulario.selectYear.addEventListener('change', (e) => {
		yearExpiracion.textContent = e.target.value.slice(2);
		mostrarFrente();
	});

	// * CCV
	formulario.inputCCV.addEventListener('keyup', () => {
		if (!tarjeta.classList.contains('active')) {
			tarjeta.classList.toggle('active');
		}

		formulario.inputCCV.value = formulario.inputCCV.value
			// Eliminar los espacios
			.replace(/\s/g, '')
			// Eliminar las letras
			.replace(/\D/g, '');

		ccv.textContent = formulario.inputCCV.value;
	});


	$(".formulario-tarjeta").submit(function (e) {
		e.preventDefault();
		if($("#inputNumero").val() != "" && $("#inputNombre").val() != "" && $("#inputCCV").val() != ""){
			Swal.fire({
				title: 'Do you want to buy?',
				showDenyButton: true,
				showCancelButton: true,
				confirmButtonText: `buy`,
				denyButtonText: `Don't buy`,
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
                        type: "POST",
                        url: "http://localhost/CTW/pago/hacerPago",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            Swal.fire({
                                title: 'Please wait',
                                html: 'Checking payment',
                                didOpen: () => {
                                    Swal.showLoading()
                                }
                            })
                        },
                        success: function (response) {
                            if (response >= 0) {
                                console.log(response);
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Successful purchase!',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                })
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'The course could not be saved',
                                    icon: 'error',
                                    confirmButtonText: 'Retry'
                                })
                            }
                        }
                    });
				} else if (result.isDenied) {
					$( "#inputNumero" ).prop( "disabled", true );
					$( "#inputNombre" ).prop( "disabled", true );
					$( "#inputCCV" ).prop( "disabled", true );
					$( "#selectMes" ).prop( "disabled", true );
					$( "#selectYear" ).prop( "disabled", true );
					$( "#btn-enviar" ).prop( "disabled", true );
					Swal.fire({
						title: 'Please wait',
						html: 'Redirecting',
						didOpen: () => {
							Swal.showLoading()
						}
					})
					window.location.href = 'http://localhost/CTW/curso/cargarCursos/' + $("#cursoComprar").val();
				}
			});
		}else{
			Swal.fire({
                title: 'Empty Requirements!',
                text: 'Enter all requeriments',
                icon: 'error',
                confirmButtonText: 'Retry'
            })
		}
		
	});
})