<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
</head>
<style>


    * {
        margin: 0;
        box-sizing: border-box;
    }

    html {
        padding-top: 10px;
        background: #e6e6e6;
        text-align: center;
    }

    body {
        width: 730px;
        font-family: 'Droid', 'Helvetica';
        font-size: 14px;
        padding: 30px 40px;
        text-align: left;
        margin: 0 auto;
        background-color: #FFF;
    }

    .page_break {
        page-break-before: always;
    }

    h2 {
        margin-top: 8px;
        margin-bottom: 15px;
    }

    table {
        border-collapse: collapse;
        margin: 8px 0;
    }

    table th, td {
        padding: 8px 14px 8px 14px;
        border: 1px solid #333;
    }

    .text-center {
        text-align: center;
    }

    img {
        max-width: 100%;
    }
</style>
<body>

<div class="wrapper">
    <table style="table-layout: fixed; width: 100%;">
        <thead>
            <tr align="center" style="border: 0px">
                <th>
                    <img src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/servicio/public/utils/img/gob.jpg';?>" width="150px" height="80px">
                </th>
                <th>
                    <img src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/servicio/public/utils/img/sev.jpg';?>" width="150px" height="80px">
                </th>
                <th>
                    <img src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/servicio/public/utils/img/ver.jpg';?>" width="150px" height="80px">
                </th>
                <th>
                    <img src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/servicio/public/utils/img/ford.jpeg';?>" width="80px" height="80px">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr align="center">
                <th colspan="4">
                    ESCUELA PRIMARIA FORD 32
                </th>
            </tr>
            <tr align="center">
                <th colspan="4">
                    REPORTE SOBRE HORAS DE SERVICIO
                </th>
            </tr>
        </tbody>
    </table>

    <br>

    <table style="width: 100%;">
        <thead>
            <tr>
                <th colspan="4">Información del Alumno</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>Nombre</b></td>
                <td>Eduardo Ramires Perez</td>
                <td><b>Periodo</b></td>
                <td>2017-2018</td>
            </tr>
            <tr>
                <td><b>Periodo</b></td>
                <td>Eduardo Ramires Perez</td>
                <td><b>Horas Cumplidas</b></td>
                <td>0 de 480</td>
            </tr>
        </tbody>
    </table>


    <?php echo encrypt('7828867481').'<br>'; ?>
    <?php echo decrypt('l7oqCYFdutPx5f3a9G2Ex/VDgk3aWoKgflsLRKWxOnE='); ?>


    <div class="title"
         style="display: inline-block; position: absolute; top: -20px; left: 0; right: 0; text-align: center; margin: 0 auto; width: auto;">
        Title
    </div>
    <table cellspacing="0" cellpadding="0"
           style="background-color: #c6c6c6; color: #FFF; table-layout: fixed; width: 100%;">
        <thead>
        <tr>
            <th class="text-center">Chinese</th>
            <th class="text-center">Korean</th>
            <th class="text-center">English</th>
            <th class="text-center">Russian</th>
        </tr>
        <tbody>
        <tr>
            <td class="text-center">天空</td>
            <td class="text-center">하늘</td>
            <td class="text-center">Sky</td>
            <td class="text-center">Небо</td>
        </tr>
        </tbody>
    </table>
    <p>page-break</p>
    <div style="width: 100px;"><img src="http://brandongaille.com/wp-content/uploads/2013/07/Dell-Company-Logo.jpg">
    </div>
    <h2 style="text-align: center; background-color: #6d80f5; color: #fff;">Something here</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        standard dummy text ever since the 1500s, <strong>when</strong> an unknown printer took a galley of type and
        scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
        Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
        PageMaker including versions of Lorem Ipsum.</p>
    <p></p>
    <p></p>
    <p>Why do we use it? <a href="http://google.com">External LInk<a></p>
    <br>
    <br>
    <p><img src="image.jpg" style="float: right; width: 200px;">It is a long established fact that a reader will be
        distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that
        it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making
        it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
        their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
        Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and
        the like).
        <br>
        <br>
        Where does it come from?<br>
        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
        literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
        College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and
        going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum
        comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by
        Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
        The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
        a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
        Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions
        of Lorem Ipsum.</p>
    <br>
    <br>
    <p>Why do we use it?</p>
    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at
        its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
        opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing
        packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'
        will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by
        accident, sometimes on purpose (injected humour and the like).</p>
    <br>
    <br>
    <p>Where does it come from?</p>
    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
        literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
        College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and
        going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum
        comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by
        Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
        The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
        a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
        Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions
        of Lorem Ipsum.</p>
    <br>
    <br>
    <p>Why do we use it?</p>
    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at
        its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
        opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing
        packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'
        will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by
        accident, sometimes on purpose (injected humour and the like).</p>
    <br>
    <br>
    <p>Where does it come from?</p>
    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
        literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
        College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and
        going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum
        comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by
        Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
        The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
    <div>


        <!--JavaScript at end of body for optimized loading-->
</body>
</html>
