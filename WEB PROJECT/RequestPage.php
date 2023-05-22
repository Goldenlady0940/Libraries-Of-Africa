<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>request</title>
    <style>
        .fname {
            padding: 0;
            width:70%;
            height: 30px;
            left: 0;
            border: 1px solid #cdcdcd;
            border-color: rgba(0,0,0,.15);
            background-color: white;
            font-size: 16px;
        }
            .finish
            {
                background-color: rgb(253, 212, 135);
                height:40px;
                width:100px;
                border-radius: 20px;
                
            }
        
    </style>
</head>
<body bgcolor="mintcream">
    <form action="" method="post">

   
        <table align="center" width="600px" height="500px">
            <div class="name">
                <tr>
                    <td></td>
                    <td align="left"><img src="Images/logo1.jpg" alt=""></td>
                </tr>
                <tr >
                    <td align="center"><label for="fname">Name</label></td>
                    <td><input type="text" class="fname" name="fname" id="fname" ></td>
                </tr>
                <tr>
                    <td align="center"><label for="id">National ID</label></td>
                    <td><input type="text" class="fname" name="id" id="id" ></td>
                </tr>
                <tr>
                    <td align="center"><label for="ci">Address</label></td>
                    <td><input type="text" class="fname" name="ci" id="ci" ></td>
                </tr>
                <tr>
                    <td align="center"><label for="co">Specified Country</label></td>
                    <td><input type="text" class="fname" name="co" id="co" ></td>
                </tr>
                <tr>
                    <td align="center"><label for="bn">Book Name</label></td>
                    <td><input type="text" class="fname" name="bn" id="bn" ></td>
                </tr>
                <tr>
                    <td align="center"><label for="ba">Book Author</label></td>
                    <td><input type="text" class="fname" name="ba" id="ba" ></td>
                </tr>
                <tr>
                    <td align="center"><label for="da">Request Date</label></td>
                    <td><input type="date" class="fname" name="da" id="da" ></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right"><button class="finish">Pass Request</button></td>
                </tr>
            </div>
        </table>
    </form>
</body>
</html>