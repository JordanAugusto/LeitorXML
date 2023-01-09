<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Thanos</title>
</head>

<body>
    <section>
        <form action="enviar.php" autocomplete="off" method="post" enctype="multipart/form-data">
            <p>Importar XML</p>
            <div>
                <input type="file" id="upload" style="display: none;" name="arquivo" />
                <label for="upload">Selecionar XML</label>
            </div>
            <button><span>&#8682; Registrar XML </span><span class="uploading"> XML </span></button>
            <button class="cancel">Cancelar</button>
            <button><a href='lista.php' style="text-decoration: none">Arquivos</a></button>
            <div class="pr">
                <strong>
                    <h4 class="ex">PDF</h4>
                    <h5 class="size">2.5kb</h5>
                </strong>
                <progress min="0" max="100" value="0"></progress>
                <span class="progress-indicator"></span>
            </div>
        </form>
    </section>
    
</body>
<script type="text/javascript" src="main.js"></script>
</html>