<?php
echo "
<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <title>$a[nom]</title>
    </head>
    <body>
        <h1>$a[titre]</h1><br/>
        <p>Cette page est disponible pour $authorization_agree</p><br/>
        <P>$a[paragraphe]</p>
    </body>
    </html>";