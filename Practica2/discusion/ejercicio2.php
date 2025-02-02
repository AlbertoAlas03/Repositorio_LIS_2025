<?php
if (isset($_POST['Precio'])) {
    $precio = $_POST['Precio'];
    $IVA = $precio * 0.13;
    if ($precio > 100) {
        $descuento = $precio * 0.10;
        $precio_con_descuento_IVA = $precio - $descuento + $IVA;
        echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Resultado</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background: linear-gradient(135deg, #a1c4fd, #c2e9fb);
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .container {
                background: white;
                padding: 2rem;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 400px;
                width: 100%;
            }
            h1 {
                color: #333;
                font-size: 2rem;
                margin-bottom: 1.5rem;
            }
            p {
                font-size: 1.2rem;
                color: #555;
                margin: 0.5rem 0;
            }
            .dias {
                font-size: 2rem;
                color: #ff6f61;
                font-weight: bold;
                margin-top: 1rem;
            }
            a {
                display: inline-block;
                margin-top: 1.5rem;
                color: #ff6f61;
                text-decoration: none;
                font-weight: bold;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Resultado del descuento</h1>
            <p>Total a pagar: <strong>$precio_con_descuento_IVA</strong></p>
            <h5>Incluye IVA y descuento del 10%</h5>
            <a href='ejercicio2.html'>Volver a comprar</a>
        </div>
    </body>
    </html>
    ";
    } else {
        $precio_IVA = $precio + $IVA;
        echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Resultado</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background: linear-gradient(135deg, #a1c4fd, #c2e9fb);
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .container {
                background: white;
                padding: 2rem;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 400px;
                width: 100%;
            }
            h1 {
                color: #333;
                font-size: 2rem;
                margin-bottom: 1.5rem;
            }
            p {
                font-size: 1.2rem;
                color: #555;
                margin: 0.5rem 0;
            }
            .dias {
                font-size: 2rem;
                color: #ff6f61;
                font-weight: bold;
                margin-top: 1rem;
            }
            a {
                display: inline-block;
                margin-top: 1.5rem;
                color: #ff6f61;
                text-decoration: none;
                font-weight: bold;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Resultado del descuento</h1>
            <p>Total a pagar: <strong>$precio_IVA</strong></p>
                 <h5>Incluye IVA</h5>
            <a href='ejercicio2.html'>Volver a comprar</a>
        </div>
    </body>
    </html>
    ";
    }
} else {
    header("location: ejercicio2.html");
    exit();
}
