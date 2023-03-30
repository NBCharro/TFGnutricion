# TFG de Nutricion
Trabajo de fin de grado del ciclo formativo de Desarrollo de Aplicaciones web.

Utiliza PHP mediante el framework Laravel.

Proyecto enlazado con la API 'apiNutricion' como RESTful. [Enlace](http://github.com/NBCharro)


## Base de datos

Se utiliza MariaDB como base de datos mediante el siguiente esquema:

### Formulario de contacto
| Nombre | Telefono | Email | Fecha | Mensaje |
| ---------- | ---------- | ---------- | ---------- | ---------- |
| VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) |

### Formulario de contacto interno
| IDcliente | Nombre | Fecha | Mensaje |
| ---------- | ---------- | ---------- | ---------- |
| VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) |

### Formulario de datos
| IDcliente | Nombre | Fecha | Pregunta1 | Respuesta1 |
| ---------- | ---------- | ---------- | ---------- | ---------- |
| VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) |

### Clientes
| IDcliente | Nombre | Apellidos | FechaInicio | PesoInicial | PesoFinal | PesoFinal2 | Telefono | Email |
| ---------- | ---------- | ---------- | ---------- | ---------- | ---------- | ---------- | ---------- | ---------- |
| VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) |

### Pesos
| IDCliente | Fecha | Peso | Nota |
| ---------- | ---------- | ---------- | ---------- |
| VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) |

### Comidas/Cenas
| IDCliente | Comida1 | Comida2 | Cena1 | Cena2 |
| ---------- | ---------- | ---------- | ---------- | ---------- |
| VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) |

### Texto Inicial
| IDcliente | Texto1 | Texto2 | Texto3 | Texto4 |
| ---------- | ---------- | ---------- | ---------- | ---------- |
| VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) | VARCHAR(25) |