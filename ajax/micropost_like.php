<?php
session_start();

require '../config/database.php';
require '../includes/fonctions.php';

extract($_POST);

if ($action == 'like')
{

    if(!user_has_liked_already_the_micropost($micropost_id))
    {
        like_micropost($micropost_id);
    }
}
else
    {
    if(user_has_liked_already_the_micropost($micropost_id))
    {
        unlike_micropost($micropost_id);
    }
}

echo get_likers_text($micropost_id);