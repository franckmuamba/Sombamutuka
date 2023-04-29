<?php
if(!function_exists('echap'))
{
    function echap($string)
    {
        if($string)
        {
            return htmlspecialchars($string);
        }
    }
}


if(!function_exists('get_session'))
{
    function get_session($key)
    {
        if($key)
        {
            return !empty($_SESSION[$key])
                ? echap($_SESSION[$key])
                : null;
        }
    }
}

if(!function_exists('is_logged_in'))
{
    function is_logged_in()
    {
        return isset($_SESSION['user_id']) || isset($_SESSION['prenom']);
    }
}

if(!function_exists('find_user_by_id'))
{
    function find_user_by_id($id)
    {
        global $bd;
        $q= $bd->prepare('select nom, prenom, email,telephone, sexe, ville, bio, adresse, avatar from users where id=?');
        $q->execute([$id]);

        $data = $q->fetch(PDO::FETCH_OBJ);
        $q->closeCursor();
        return $data;
    }
}

if(!function_exists('pas_vide'))
{
    function pas_vide($fields=[])
    {
        if(count($fields)!=0)
        {
            foreach ($fields as $field)
            {
                if(empty($_POST[$field]) || trim($_POST[$field])=="")
                {
                    return false;
                }
            }
            return true;
        }
    }
}

if(!function_exists('is_already_in_use'))
{
    function is_already_in_use($field, $value, $table)
    {
        global $bd;
        $query= $bd->prepare("select id from $table where $field=?");
        $query->execute([$value]);
        $count= $query->rowCount();

        $query->closeCursor();

        return $count;
    }
}

if(!function_exists('set_flash'))
{
    function set_flash($message, $type)
    {
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}

if(!function_exists('redirect'))
{
    function redirect($page)
    {
        header('Location: ' . $page);
        exit();
    }
}
if(!function_exists('save_input_data'))
{
    function save_input_data()
    {
        foreach ($_POST as $key => $value)
        {
            if(strpos($key, 'password')===false)
            {
                $_SESSION['input'][$key] = $value;
            }
        }
    }
}
if(!function_exists('get_input'))
{
    function get_input($key)
    {
        return !empty($_SESSION['input'][$key])
            ? echap($_SESSION['input'][$key])
            : null;
    }
}
if(!function_exists('clear_input_data'))
{
    function clear_input_data()
    {
        if(isset($_SESSION['input']))
        {
            $_SESSION['input']=[];
        }

    }
}

if(!function_exists('set_active'))
{
    function set_active($file)
    {
        //array_pop permet de recuperer le dernier element d'une chaine de caractère
        $var = $_SERVER['SCRIPT_NAME'];
        $stuff = '/';
        $last = explode($stuff, $var);
        $page = array_pop($last);

        if($page == $file.'.php')
        {
            return "active";
        }
        else
        {
            return "";
        }
    }
}

if(!function_exists('find_code_by_id'))
{
    function find_code_by_id($id)
    {
        global $bd;
        $q= $bd->prepare('select code from codes where id=?');
        $q->execute($id);

        $data = $q->fetch(PDO::FETCH_OBJ);

        $q->closeCursor();

        return $data;
    }
}

if(!function_exists('rediriger_vers_ou'))
{
    function rediriger_vers_ou($default_url)
    {
        if($_SESSION['forwarding_url'])
        {
            $url = $_SESSION['forwarding_url'];
        }
        else
        {
            $url= $default_url;
        }
        $_SESSION['forwarding_url']=null;
        redirect($url);
    }
}
// Recuperer l'url de l'avatar
if(!function_exists('get_avatar_url'))
{
    function get_avatar_url($email,$size=25)
    {
        return  "http://gravatar.com/avatar/".md5(strtolower(trim(echap($email))))."?s=".$size.'&d='.WEBSITE_URL.'/assets/img/default-user.png';
        //return "assets/img/default-user.png";
    }
}

if(!function_exists('relation_link_to_display'))
{
    function relation_link_to_display($id)
    {
        global $bd;
        $q = $bd->prepare('SELECT user_id1, user_id2, status FROM friends_relationships
              where (user_id1 = :user_id1 and user_id2= :user_id2)
              OR (user_id1 = :user_id2 and user_id2= :user_id1)');

        $q->execute([
            'user_id1' =>get_session('user_id'),
            'user_id2' =>$id
        ]);

        $data = $q->fetch();

        if($data['user_id1']== $id && $data['status'] == '0')
        {
            // lien pour accepter ou rejeter l'invitation
            return "accept_reject_relation_link";
        }
        elseif ($data['user_id1']== get_session('user_id') && $data['status'] == '0')
        {
            //demande deja été envoyéée et lien pour annuler la demande
            return "cancel_relation_link";
        }
        elseif (($data['user_id1']== get_session('user_id') or $data['user_id1']== $id) and $data['status'] == '1')
        {
            //lien pour supprimer la relation amitiéé
            return "delete_relation_link";
        }
        else
        {
            // lien pour ajouter un ami
            return "add_relation_link";
        }
        $q->closeCursor();
        //var_dump($data);
        //die();

    }


}

if(!function_exists('friends_count'))
{
    function friends_count()
    {
        global $bd;
        $query= $bd->prepare("select status from friends_relationships
                     where (user_id1 = :user_connected OR user_id2 = :user_connected) 
                     AND status ='1'");
        $query->execute([
            'user_connected' =>$_GET['id']
        ]);
        $count= $query->rowCount();

        $query->closeCursor();

        return $count;

    }
}


if(!function_exists('cheks_if_a_friend_request_has_been_sent'))
{
    function cheks_if_a_friend_request_has_been_sent($id1, $id2)
    {
        global $bd;
        $query= $bd->prepare("select status from friends_relationships
                     WHERE (user_id1 = :user_id1 AND user_id2 = :user_id2) 
                     OR (user_id1 = :user_id2 AND user_id2 = :user_id1)");
        $query->execute([
            'user_id1'=> $id1,
            'user_id2'=> $id2
        ]);
        $count= $query->rowCount();

        $query->closeCursor();

        return (bool) $count;
    }
}

if(!function_exists('replace_links'))
{
    function replace_links($texte)
    {
        $regex_url = "/(http|https|ftp|ftps\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]*)?(\/\S*)?/";
        return preg_replace($regex_url, "<a href=\"$0\">$0</a>", $texte);
    }
}

if(!function_exists('user_has_liked_already_the_micropost'))
{
    function user_has_liked_already_the_micropost($micropost_id)
    {
        global $bd;
        $q = $bd->prepare('select id from micropost_like where user_id=:user_id and micropost_id=:micropost_id');
        $q->execute([
            'user_id'=> get_session('user_id'),
            'micropost_id'=> $micropost_id
        ]);
        return (bool) $q->rowCount();
    }
}

if (!function_exists('like_micropost'))
{
    function like_micropost($micropost_id)
    {
        global $bd;

        $q = $bd->prepare('insert into micropost_like(user_id, micropost_id) 
              values(:user_id, :micropost_id)');

        $q->execute([
            'user_id'=> get_session('user_id'),
            'micropost_id'=> $micropost_id
        ]);

        $q = $bd->prepare('update microposts set like_count = like_count + 1
                  where id=:micropost_id ');
        $q->execute([
            'micropost_id' => $micropost_id
        ]);
    }

}

if (!function_exists('unlike_micropost'))
{
    function unlike_micropost($micropost_id)
    {
        if( user_has_liked_already_the_micropost($micropost_id))
        {
            global $bd;

            $q = $bd->prepare('delete from micropost_like 
                  WHERE user_id= :user_id and micropost_id= :micropost_id ');

            $q->execute([
                'user_id'=> get_session('user_id'),
                'micropost_id'=> $micropost_id
            ]);

            $q = $bd->prepare('update microposts set like_count = like_count - 1
                  where id=:micropost_id ');
            $q->execute([
                'micropost_id' => $micropost_id
            ]);
        }

    }

}

if (!function_exists('get_likers'))
{
    function get_likers($micropost_id)
    {
        global $bd;
        $q = $bd -> prepare('select users.id, users.prenom from users
                                        left join micropost_like
                                         on users.id = micropost_like.user_id
                                         where micropost_id = :id 
                                         limit 3');

        $q->execute([
            'id'=>$micropost_id
        ]);

        return $q->fetchAll(PDO::FETCH_OBJ);
    }
}


if (!function_exists('get_likers_text'))
{
    function get_likers_text($micropost_id)
    {
        $likes_count = get_like_count($micropost_id);
        $likers = get_likers($micropost_id);

        //return $itself_like ? 'True' : 'False';


        $output = '';

        if ($likes_count > 0)
        {
            $remaining_like_count = $likes_count - 3;
            $itself_like = user_has_liked_already_the_micropost($micropost_id);

            foreach ($likers as $liker)
            if (get_session('user_id') !== $liker->id)
            {
                $output .='<a href="profile.php?id='.$liker->id.'">'.$liker->prenom.'</a>, ';
            }

            $output = $itself_like? 'Vous, ' .$output : $output ;

            if( ($likes_count == 2 || $likes_count ==3 ) && $output !== "" )
            {
                $output = trim($output, ', ');
                $arr = explode(',', $output);
                $lastItem = array_pop($arr);
                $output = implode(', ', $arr);
                $output .= ' et ' .$lastItem;
            }

            $output = trim($output, ', ');


            switch ($likes_count)
            {
                case 1:
                    $output .= $itself_like ? ' aimez ça. ' : ' aime ça.';
                    break;

                case 2:
                case 3:
                    $output .= $itself_like ? ' aimez ça. ' : ' aiment ça.';
                    break;

                case 4:
                    $output .= $itself_like ? ' et 1 une autre personne aimez ça.' : ' et une autre personne aiment ça. ' ;
                    break;

                    default;
                    $output .= $itself_like ? ' et '.$remaining_like_count .' autres personnes aimez ça.' : ' et '.$remaining_like_count .' autres personnes aiment ça. ';
                    break;
            }
        }

       return $output;
    }
}

if (!function_exists('get_like_count'))
{
    function get_like_count($micropost_id)
    {
        global $bd;

        $q = $bd -> prepare('select like_count from microposts where id = :id');
        $q->execute([
            'id'=>$micropost_id
        ]);

        $data = $q->fetch(PDO::FETCH_OBJ);

        return intval($data->like_count);
    }
}