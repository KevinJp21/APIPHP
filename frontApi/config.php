<script>
   $(document).ready( function () {
        $('#user').DataTable();
    } );
</script> 
<?php
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "https://gorest.co.in/public/v2/posts",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
?>