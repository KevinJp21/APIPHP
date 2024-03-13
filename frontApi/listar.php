<?php
require_once ("../frontApi/config.php");

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$objeto = json_decode($response);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $opcionSel = $_POST['user'];

        $curll = curl_init();
        curl_setopt_array($curll, array(
            CURLOPT_URL => "https://gorest.co.in/public/v2/users/$opcionSel/posts",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        
        ));
            $responsePost = curl_exec($curll);
            $errr = curl_error($curll);
            curl_close($curll);
           
            $posts = json_decode($responsePost);
            
        ?>
        <table class="table table-striped" id="user">
    <thead>
        <tr>
           <th>ID</th>
           <th>USER_ID</th>
           <th>TITLE</th>
           <th>BODY</th>
        </tr>
    </thead>

    <tbody>
      
        <?php
        
        foreach ($objeto as $reg) {
            if($reg->id == $opcionSel){
                foreach ($posts as $reg) {
                ?>
                <tr>
                 <td> <?=$reg->id ?> </td> 
                 <td> <?=$reg->user_id ?> </td> 
                 <td> <?=$reg->title ?> </td> 
                 <td> <?=$reg->body ?> </td> 
               </tr>  
               <?php 
                }
            }
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
               <th>ID</th>
               <th>USER_ID</th>
               <th>TITLE</th>
               <th>BODY</th>
            </tr>
        </tfoot>
      </table>
            <?php
                
    }else{
        ?>
        <table class="table table-striped" id="user">
    <thead>
        <tr>
           <th>ID</th>
           <th>USER_ID</th>
           <th>TITLE</th>
           <th>BODY</th>
        </tr>
    </thead>

    <tbody>
      
        <?php

                ?>
                <tr>
                 <td>No hay datos</td> 
                 <td>No hay datos</td> 
                 <td>No hay datos</td>  
                 <td>No hay datos</td>  
               </tr>  
               <?php 
        ?>
        </tbody>
        <tfoot>
        <tr>
               <th>ID</th>
               <th>USER_ID</th>
               <th>TITLE</th>
               <th>BODY</th>
            </tr>
        </tfoot>
      </table>
        <?php
    }
    }
   ?>