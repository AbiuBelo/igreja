<?php
    //srequire_once 'check_login.php';
    require_once 'utils.php'; 
    //oinsa hare variabel nia konteudo
    //var_dump($_POST); exit;
    if ( empty($_POST['name'] ) ) {
        newMessage('Ita tenki priense usuario nia naran', $_SERVER['HTTP_REFERER']);
    } 
    //else if ( strlen( $_POST['name'] ) < 0 ) {
       // newMessage('Ita tenki prensi usuario nia naran ho letra minimu 3', 'form_insertusuario.php');      
    //}

    if ( empty($_POST['password'] ) ) {
        newMessage('Ita tenki priense usuario nia password', $_SERVER['HTTP_REFERER']);
    } 

    if ( empty($_POST['login'] ) ) {
        newMessage('Ita tenki prensi usuario nia login', $_SERVER['HTTP_REFERER']);
    } else if ( strlen( $_POST['login'] ) < 4 ) {
        newMessage('Ita tenki priensi login ID  minimu letra 4', $_SERVER['HTTP_REFERER']);
    }

     if ( empty($_POST['husi_id'] ) ) {
        newMessage('Ita tenki prensi usuario nia Departamentu', $_SERVER['HTTP_REFERER']);
    }

     if ( empty($_POST['level'] ) ) {
        newMessage('Ita tenki prensi usuario nia Level', $_SERVER['HTTP_REFERER']);
    }

    if ( validLoginUsuario($_POST) == false ) {
        newMessage('Login ID nee iha ona', 'form_usuario.php');
    }

    if ( empty($_POST['id']) ) {

        $sql = "INSERT INTO user(name,password,login,husi_id,level) 
            VALUES('" . $_POST['name'] . "',
            '" . $_POST['password'] . "',
            '" . $_POST['login'] . "',
            '" . $_POST['husi_id'] . "',
            '" . $_POST['level'] . "'
            )";
       //Nee mosu variabel no hapara kodeku
        //die($sql);
        $result = mysql_query($sql);
        //die($sql);exit;
        if ( mysql_affected_rows() > 0 ) {
            newMessage('Usuario insere ona','lista_usuario.php');
        } else {
            newMessage('Erru ita koko insere fali usuario', $_SERVER['HTTP_REFERER']);
        }
    } else {
         $sql = "UPDATE user 
                    SET name = '" . $_POST['name'] . "',
                    password = '" . $_POST['password'] . "',
                    login = '" . $_POST['login'] . "',
                    husi_id = '" . $_POST['husi_id'] . "',
                    level = '" . $_POST['level'] . "'
                     WHERE id = " . $_POST['id'];
        //die($sql);
        $result = mysql_query($sql);

        if ( mysql_affected_rows() > 0 ) {

            newMessage('Usuario nee atualizadu ona','lista_usuario.php');
        } else {
            newMessage('Erru ita koko insere fali usuario', $_SERVER['HTTP_REFERER']);
        }


    }

?>