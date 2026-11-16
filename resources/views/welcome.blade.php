<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posta de Salud San Jerónimo</title>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }


        body {
            min-height: 100vh;
            background: #f1f5f9;
            color: #1e293b;
        }


        header {
            background: #ffffff;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
        }


        .logo {
            color: #087e72;
            font-size: 21px;
            font-weight: bold;
        }


        .logo span {
            color: #334155;
        }


        .estado {
            background: #dcfce7;
            color: #166534;
            padding: 9px 15px;
            border-radius: 20px;
            font-size: 13px;
        }


        main {
            max-width: 1100px;
            margin: 65px auto;
            padding: 20px;
        }


        .presentacion {
            background: linear-gradient(120deg, #075e59, #0d9488);
            color: white;
            padding: 65px 50px;
            border-radius: 18px;
        }


        .etiqueta {
            display: inline-block;
            background: rgba(255,255,255,.15);
            padding: 9px 15px;
            border-radius: 20px;
            font-size: 13px;
            margin-bottom: 25px;
        }


        h1 {
            font-size: 38px;
            line-height: 1.25;
            max-width: 650px;
            margin-bottom: 20px;
        }


        .descripcion {
            max-width: 650px;
            line-height: 1.8;
            color: #e0f2f1;
            font-size: 16px;
        }


        .boton {
            display: inline-block;
            margin-top: 30px;
            padding: 14px 24px;
            background: white;
            color: #087e72;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }


        .seccion {
            margin-top: 40px;
        }


        .seccion h2 {
            font-size: 22px;
            margin-bottom: 18px;
        }


        .tarjetas {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }


        .tarjeta {
            background: white;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }


        .tarjeta h3 {
            color: #087e72;
            margin-bottom: 10px;
        }


        .tarjeta p {
            color: #64748b;
            line-height: 1.6;
            font-size: 14px;
        }


        footer {
            text-align: center;
            padding: 25px;
            color: #64748b;
            font-size: 13px;
        }


        @media (max-width: 700px) {
            .tarjetas {
                grid-template-columns: 1fr;
            }


            .presentacion {
                padding: 40px 25px;
            }


            h1 {
                font-size: 29px;
            }


            header {
                gap: 15px;
                flex-wrap: wrap;
            }
        }
    </style>
</head>


<body>


    <header>
        <div class="logo">POSTA SALUD <span>| San Jerónimo</span></div>
        <div class="estado">Sistema en desarrollo</div>
    </header>


    <main>
        <section class="presentacion">
            <div class="etiqueta">PROYECTO BACKEND · LARAVEL 13</div>


            <h1>Sistema de Gestión de la Posta de Salud San Jerónimo</h1>


            <p class="descripcion">
                Plataforma web orientada a mejorar la organización y
                administración de la información del establecimiento
                de salud, facilitando la gestión de pacientes, personal
                médico, citas y atenciones.
            </p>


            <a href="#" class="boton">Bienvenido al sistema</a>
        </section>


        <section class="seccion">
            <h2>Módulos principales del sistema</h2>


            <div class="tarjetas">
                <div class="tarjeta">
                    <h3>Pacientes</h3>
                    <p>Registro y administración de la información de los pacientes.</p>
                </div>


                <div class="tarjeta">
                    <h3>Personal médico</h3>
                    <p>Organización y control de los datos del personal de salud.</p>
                </div>


                <div class="tarjeta">
                    <h3>Citas y atenciones</h3>
                    <p>Gestión de citas médicas y registro de las atenciones realizadas.</p>
                </div>
            </div>
        </section>
    </main>


    <footer>
        Proyecto académico · Tecnología Backend · Laravel 13
        <br>
        IES Público Túpac Amaru – Cusco
    </footer>


</body>
</html>