<?php
if(isset($error) && count($error)!=0)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>';
    foreach ($error as $err)
    {
        echo $err.'<br/>';
    }
    echo '</div>';
}
