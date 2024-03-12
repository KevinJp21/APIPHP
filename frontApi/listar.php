<?php
require_once ("../frontApi/config.php");
if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$objeto = json_decode($response);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $opcionSel = $_POST['user'];
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
            if($reg->user_id == $opcionSel){
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
            foreach ($objeto as $reg) {
                    ?>
                    <tr>
                     <td> <?=$reg->id ?> </td> 
                     <td> <?=$reg->user_id ?> </td> 
                     <td> <?=$reg->title ?> </td> 
                     <td> <?=$reg->body ?> </td> 
                   </tr>  
                   <?php 
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
        }
    }
   ?>