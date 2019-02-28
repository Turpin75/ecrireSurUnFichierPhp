<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php
        if(isset($_POST['envoyer'])):
            if(!empty($_POST['email'])):
                $email = htmlspecialchars($_POST['email']);
                if(filter_var($email, FILTER_VALIDATE_EMAIL)):
                    $file = 'demo.txt';
                    $data = $email;
                    $write = file_put_contents($file, $data . PHP_EOL, FILE_APPEND);
                    if($write !== FALSE):
                        $message = "Email bien enregistrée !";
                        $email = null;
                    else:
                        $message = "Erreur lors de l'enregistrement !";
                    endif;
                else:
                    $message = "Email renseigné non conforme.";
                endif;
            else:
                $message = "Veuillez renseigner un email";
            endif;
        endif;
    ?>
    <div style="margin-bottom: 10px;">
        <?php
            if(isset($message)):
                echo $message;
            endif;
        ?>
    </div>
    
   <div>
        <form action="" method="post">
                <input type="text" name="email" id="email" placeholder="Entrer votre email" value ="<?php echo ($email = $email ?? ''); ?>">
                <input type="submit" name="envoyer" value="Envoyer">
        </form>
   </div>
    
</body>
</html>


