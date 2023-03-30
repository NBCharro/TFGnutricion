const express = require('express')
const app = express()
const port = 3000

app.get('/', (req: any, res: any) => {
    const datos = require('./datos.json');
    res.send(datos)
})

app.get('/datos/:id', (req: any, res: any) => {
    let id: string = req.params.id;
    console.log(id);
    const datos = require('./datos.json');
    res.send(datos)
})

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`)
})