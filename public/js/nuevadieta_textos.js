const crearMas_texto_particular = document.getElementById('crearMas_texto_particular');
const texto_particular = document.getElementById('texto_particular');
let numero_campos_texto_particular = 1;

crearMas_texto_particular.addEventListener('click', (event) => {
    event.preventDefault;
    crear_nuevo_alimento();
})

function crear_nuevo_alimento() {
    const texto_particular_alimento = document.createElement("input");
    const texto_particular_descripcion = document.createElement("input");

    texto_particular_alimento.className =
        'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white';
    texto_particular_descripcion.className =
        'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white col-span-3';

    numero_campos_texto_particular++;
    texto_particular_alimento.name = `texto_particular_alimento_${numero_campos_texto_particular}`;
    texto_particular_descripcion.name = `texto_particular_descripcion_${numero_campos_texto_particular}`;

    texto_particular_alimento.placeholder = 'Escriba el alimento';
    texto_particular_descripcion.placeholder = 'Escriba la descripcion';

    texto_particular.insertBefore(texto_particular_alimento, crearMas_texto_particular);
    texto_particular.insertBefore(texto_particular_descripcion, crearMas_texto_particular);
}
