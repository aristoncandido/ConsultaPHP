<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    <?php
    
    include_once('conexao.php');


    ?>
   
                <div class="conteiner">
                    <form action="index.php" method="$_REQUEST">

                    <input type="search" name="cpf" id="cpf">
                    <input type="button" value="search">

                    </form>

              


        <?php
        
        include'dados.php';

        ?>            

</body>
</html>