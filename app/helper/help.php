<?php
if(!function_exists('active_sidebar'))
{
    function active_sidebar($route)
    {
       
        if(request()->segment(2)== $route && request()->segment(3) == '')
        {
            return ['permanent'=>'active','first'=>'active','second'=>'non'];       
        }
        elseif(request()->segment(2)== $route && request()->segment(3) != '')
        {
            return ['permanent'=>'active','first'=>'non','second'=>'active'];      

        }
        else{
            return ['permanent'=>'','first'=>'','second'=>''];  
        }
    }
}

