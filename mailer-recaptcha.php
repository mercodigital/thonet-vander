<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 

        $your_email = ' mm@thonet-vandere.com';
		$encopia = 'leads@mercodigital.com';
		$encopia = 'soporte@mercodigital.com';
		$captcha= $_POST['g-recaptcha-response'];
		
		if(!$captcha){
          echo '<h2 style="font: Arial, Sans Serif; text-align: center;">Por favor, recorda clickear el recaptcha y confirmar que no eres un robot.</h2>';
          ?>
			<script type="text/javascript">
			setTimeout("window.history.go(-1);",4000);
			</script>
			<?php
        }
	

		$secretKey = "6LdWFuQkAAAAAHHYhni8BZDCk8a4zaz0rLqmR5Hr";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2 style="font: Arial, Sans Serif; text-align: center;">Intenta nuevamente</h2>';
        } else {
			
		

		
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$cargo = $_POST['cargo'];

		$message = $_POST['message'];
		
		
		

		
		
		
		// construcción de mensaje
		$to = $email;
		$from = $your_email; 
		$subject = "Thonet & Vander - Nuevo contacto desde la landing de distribuidores b2b"; 
		$message = "$name te ha enviado un mensaje!  
			Nombre: $name 
			Email: $email 
			Telefono: $phone
			Cargo: $cargo
			Mensaje: $message 

		
			";
		$headers = "From: $to
		";
		
		
		
		

		
		// Completamos la variable $asunto con el título del mensaje
		// y armamos el mensaje dentro de la variable $mensaje

		//$email = $_POST['email'];
		$asunto = "Thonet & Vander - Gracias por contactarse!";

		$mensaje = "Muchas gracias por comunicarse con Thonet & Vander. \r\nEn breve nos ponemos en contacto contigo para que nos cuentes más sobre lo que estás buscando!!\r\n \r\nEl equipo Thonet & Vander.";
		

        mail($email, $asunto, $mensaje, "From: ".$your_email);


	//	mail("doppiattemail@gmail.com", $subject, $message, $headers); 

		
		

		
		// Mail recompilador de datos del formulario
		 
		$ok = mail($your_email, $subject, $message, $headers); 
		if ($ok) { 
			
			mail($encopia, $subject, $message, $headers); 
		
			?>
			<script type="text/javascript">
			window.location.href = 'https://gimnasios.Thonet & Vanderdeporte.com/gracias.html';
			</script>
			<?php
		} else { 
			echo "<p>El mail no pudo ser enviado. Completá los datos sin errores!</p>"; 
		} 

            
            
		}

 	
	


///////////////////////////Functions/////////////////
// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>