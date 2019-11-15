<?php

function RedirectURL($url, $refreshtime = null,$message="")
{
    if(isset($refreshtime))
    {
        echo header('refresh:'.$refreshtime.';url='.$url);
    }
    else
    {
        echo header('Location:'.$url);
    }
    return $url;
}

//RedirectURL('login.php' , 5);

RedirectURL('/sample_project/dashboard/companies/companyList.php',$message);
?>