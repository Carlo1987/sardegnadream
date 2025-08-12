<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                background-color: #f2f2f2;
                font-family: Tahoma, Helvetica, Verdana, sans-serif;
            }
            #container{
                max-width: 600px;
                margin: 10px auto;
                background-color: white;
            }
            @media(max-width: 600px){
                #container{
                    width: 100%;
                }
            }
            #content{
                width: 100%;
                padding: 10px;
            }
            .theme{
                background-color:rgb(118, 189, 228);
                color: white;
            }
            .button{
                display:inline-block; 
                text-decoration: none; 
                font-weight: bold; 
                border-radius: 5px;
                padding: 10px 20px; 
            }
        </style>
    </head>
    <body>
        <div id="container">
            @yield('email-body')
        </div>
    </body>
</html>