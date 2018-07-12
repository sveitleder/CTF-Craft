<?php
   error_reporting(0);
   if( $_GET["Password"] || $_GET["Pirateword"] ) {
      echo "<!DOCTYPE HTML>\n";
      echo "<script type='text/javascript'>\n";
      echo "//Helper for sha256 encoding.
async function sha256(message) {
   // encode as UTF-8
   const msgBuffer = new TextEncoder('utf-8').encode(message);                    

   // hash the message
   const hashBuffer = await crypto.subtle.digest('SHA-256', msgBuffer);

   // convert ArrayBuffer to Array
   const hashArray = Array.from(new Uint8Array(hashBuffer));

   // convert bytes to hex string                  
   const hashHex = hashArray.map(b => ('00' + b.toString(16)).slice(-2)).join('');
   return hashHex;
}\n";
      echo "//Generate a secure password
secretpassword = '791939'+Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);\n\n";
      echo "//save hash for later comparison
const secrethash = sha256(secretpassword);\n\n";
      echo "// DevRedbeard: Ha, by deleting our secret no one will ever know it.\n";
      echo "delete secret;\n\n";
      echo "//output server response to taunt user.
document.writeln('Your chosen password is ' +'". $_GET['Password'] ."'+ ' and probably wrong! '+'". $_GET['Pirateword']. "' );\n\n";
      echo "secretcheck = prompt('Want to change your guess for the secret password? Last chance!');\n";
      echo "if( sha256(secretcheck).value == secrethash.value ){ console.log('Winner! Your flag is: Flag{'+secretcheck.substr(0,6)+'}') }else{ console.log('Ha, Wrong!') } \n";
      echo "</script>";
      exit();
   }
?>
<html>
   <body>
      <!-- 
         DevRedbeard: What did SAXB stand for again?
         DevSkorbut:  Skull and cross bones you numbnut...
         DevRedbeard: Oh.
      !-->
      <form action = "<?php $_PHP_SELF ?>" method = "GET">
         <div><b>SAXB Access Panel:</b></div>
         Password: <input type = "text" name = "Password" value= "..."/>
         Pirateword: <input type = "text" name = "Pirateword" value= "Arrr" />
         <input type = "submit" />
      </form>
      
   </body>
</html>