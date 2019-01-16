<?php 
   require_once 'check_login.php';
   require_once 'admin_deit.php';
    require_once 'utils.php'; 
    //var_dump($sql); exit;
    if ( !empty($_GET['id']) ) {
        $usuario = getUsuario($_GET['id']);
    } else {
        $usuario = array(
            'id'=>'',
            'name'=>'',
            'password'=>'',
            'login'=>'',
            'church_id'=>'',
            'level'=> ''
           
        );
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php require_once 'menu.php'; ?>

    <h1>Insere usuario foun</h1>

    <?php printMessage(); ?>

    <form method="post" action="save_usuario.php">       

        <input type="hidden" name="id" value="<?php echo $usuario['id'] ; ?>">


        <p>
            <label class="required">Naran</label>
            <input type="text" name="name" value="<?php echo $usuario['name']; ?>"required>
        </p>
        
         <p>
            <label class="required">Password</label>
            <input type="password" name="password" value="<?php echo $usuario['password']; ?>"required>
        </p>  
         <p>
            <label class="required">Login</label>
            <input type="text" name="login" value="<?php echo $usuario['login']; ?>"required>
        </p>
         <p>
            <label class="required">Igreja</label>
            <select name="church_id">
            <option value="" >---Hili ida---</option>
            <?php      

                $igreja = listIgreja();

                foreach ( $igreja as $posisaun => $row ) {
                    $selected = '';
                    if ( $usuario['church_id'] == $row['id'] )
                        $selected = 'selected';

                    echo '<option value="'. $row['id'] .'" '. $selected . '>' . $row ['name'].'</option>';

                }

            ?>
            </select>
        </p>
    

         <p>
            <label class="required">Level</label>
            <select name="level" required>
                <option value="N" <?php if ( $usuario['level'] == 'N' ) echo 'selected'; ?> >Normal</option>
                <option value="A" <?php if ( $usuario['level'] == 'A' ) echo 'selected'; ?>>Administrator</option>
            </select>
        </p>
   
        <div class="buttons">
             <input type="submit" class="button" value="Rai">
             <a href="lista_usuario.php" class="button">Fila</a>
        </div>
    
    
    </form>

</body>
</html>