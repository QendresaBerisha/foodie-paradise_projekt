
<?php include ('partials/header.php'); ?>
<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Contact</title>

        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="initial-scale=1.0 width=device-width">
    </head>
    <body>


<div class="wrapper">
    <h2>CONTACT</h2>
    <div id="error_message"></div>

    <form id="myform">
         <div class="input_field">
             <input type="text" placeholder="Name" id="name">
         </div>
         <div class="input_field">
             <input type="text" placeholder="Subject" id="subject">
         </div>
         <div class="input_field">
            <input type="text" placeholder="Phone" id="phone">
        </div>
        <div class="input_field">
            <input type="text" placeholder="Email" id="email">
        </div>
        <div class="input_field">
            <textarea id="message" placeholder="Message" ></textarea>
        </div>
            <div class="btn">
                <input type="submit">
            
        
        
         </div>
    </form>
</div>

<div class="footer">
 <a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-snapchat"></a>
<a href="#" class="fa fa-instagram"></a>
</div>

    </body>
</html>
