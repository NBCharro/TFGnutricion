'use sctrict'
import obtenerTodosDatos from './funcionesGET/todosDatos.js';

const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const port = process.env.PORT || 3000;
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

/* app.get('/hola/:name/:id',(req,res)=>{
    res.status(200).send({message: `Hello ${req.params.name} con id: ${req.params.id}!`});
}) */

/* GET */
app.get('/api/product', (req, res) => {
    const datos = obtenerTodosDatos();
    res.status(200).send(datos);
})

app.get('/api/product/:productId', (req, res) => {

})

/* POST */
app.post('/api/product', (req, res) => {
    console.log(req.body);
    res.status(200).send({ message: 'El producto se ha recibido' });
})

/* PUT */
app.put('api/product/:productId', (req, res) => {

})

/* DELETE */
app.delete('api/product/:productId', (req, res) => {

})

/*  */
app.listen(port, () => {
    console.log(`API REST corriendo en http://localhost:${port}`);
})