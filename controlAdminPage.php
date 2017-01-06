<?php
session_start();

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id']) && $_SESSION['connected_type'] == "admin")
{
    if(isset($_POST['student_']) && $_POST['student_'] != '')
    {
        if(isset($_POST['classe']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password']))
        {
            if($_POST['classe'] != '' && $_POST['firstname'] != '' && $_POST['lastname'] != '' && $_POST['password'] != '')
            {
                include_once('./config/connect.php');
                require('class/Person.php');
                require('class/Admin.php');

                $sFirstName = htmlspecialchars($_POST['firstname']);
                $sLastName = htmlspecialchars($_POST['lastname']);
                $sPassword = htmlspecialchars($_POST['password']);
                $sClasse = htmlspecialchars($_POST['classe']);
                if(isset($_POST['delegue']) && $_POST['delegue']) $isDelegate = 1;

                $anAdmin = unserialize($_SESSION['connected_objet']);

                if(isset($isDelegate) && $isDelegate = 1)
                {
                    $anAdmin->insertStudent($bdd, $sFirstName, $sLastName, $sPassword, $sClasse, 1);
                    header("Location: classRoomDetail?id=$sClasse");
                }
                else
                {
                    $anAdmin->insertStudent($bdd, $sFirstName, $sLastName, $sPassword, $sClasse);
                    header("Location: classRoomDetail?id=$sClasse");
                }            
            }
            else
            {
                exit("aw :3");
            }
        }
        else
        {
            exit('Ah !');
        }
    }
    elseif(isset($_POST['teacher_']) && $_POST['teacher_'] != '')
    {
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password']))
        {
            if($_POST['firstname'] != '' && $_POST['lastname'] != '' && $_POST['password'] != '')
            {
                include_once('./config/connect.php');
                require('class/Person.php');
                require('class/Admin.php');

                $tFirstName = htmlspecialchars($_POST['firstname']);
                $tLastName = htmlspecialchars($_POST['lastname']);
                $tPassword = htmlspecialchars($_POST['password']);

                $anAdmin = unserialize($_SESSION['connected_objet']);
                
                $anAdmin->insertTeacher($bdd, $tFirstName, $tLastName, $tPassword);
                
                header("Location: adminPage.php");          
            }
            else
            {
                exit("aw :3");
            }
        }
        else
        {
            exit('Ah !');
        }
    }
    elseif(isset($_POST['class_']) && $_POST['class_'] != '')
    {
        if(isset($_POST['name']) && isset($_POST['comment_']))
        {
            if($_POST['name'] != '' && $_POST['comment_'] != '')
            {
                include_once('./config/connect.php');
                require('class/ClassRoom.php');
                require('class/Person.php');
                require('class/Admin.php');

                $cName = htmlspecialchars($_POST['name']);
                $cComment = htmlspecialchars($_POST['comment_']);

                $anAdmin = unserialize($_SESSION['connected_objet']);
                
                $anAdmin->insertClassRoom($bdd, $cName, $cComment);
                
                header("Location: adminPage.php");          
            }
            else
            {
                exit("aw :3");
            }
        }
        else
        {
            exit('Ah !');
        }
    }
    else
    {
        exit('Wowowowo');
    }
}
else
{
    exit("non");
}
