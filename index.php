<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <style>
            .error{ 
                color: #FF0000; 
            }
            .star~label::before{
                content: '\2606';
                font-size: 40px;
                color: gray;
            }
            .star:checked~label::before{
                content: '\2605';
                color: cyan;
            }
            .star{
                display: none;
            }
            .rating{
                display: flex;
                flex-direction: row-reverse;
                width: 20px;
                margin: 20px;
            }
            .address{
                width: 20px;
                margin-left: 20px;
            }
        </style>
    </head>
    <body bgcolor = "white">
        <h1 align="center"><big><big><u><b>FORMULAIRE</u></b></big></big></h1>
        <br><br>
        <?php

            $nameErr = $emailErr = $genderErr = $commentErr = $websiteErr = "";
            $name = $email = $gender = $comment = $website = "";
            $ambiance = $condition = $pedagogie = $support = 0;
    
            function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            //function test_input($data) { return = trim($stripslashes(htmlspecialchars($data))); }
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if (empty($_POST['name'])){
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST['name']);
                    if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $name)){
                        $nameErr = "Only letters and white space allowed";
                    }
                }

                if (empty($_POST['email'])){
                    $emailErr = "Email is resquired";
                } else {
                    $email = test_input($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      $emailErr = "Invalid email format";
                    }
                }

                if (empty($_POST['website'])){
                    $website = "";
                } else {
                    $website = test_input($_POST["website"]);
                    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                      $websiteErr = "Invalid URL";
                    }
                }

                if (empty($_POST['comment'])){
                    $comment = "";
                } else {
                    $comment = test_input($_POST['comment']);
                }

                if (empty($_POST['gender'])){
                    $genderErr = "Gender is required";
                } else {
                    $gender = test_input($_POST['gender']);
                }

                if(!empty($_POST["ambiance"])){
                    $ambiance = test_input($_POST["ambiance"]);
                }
                if(!empty($_POST["pedagogie"])){
                    $pedagogie = test_input($_POST["pedagogie"]);
                }
                if(!empty($_POST["condition"])){
                    $condition = test_input($_POST["condition"]);
                }
                if(!empty($_POST["support"])){
                    $support = test_input($_POST["support"]);
                }

            }
        ?>
        <form method='POST' action="<?php print(htmlspecialchars($_SERVER["PHP_SELF"]));?>">

            <fieldset class="address">
                <legend>Coordonnées</legend>
            Name: 
                <input type='text' name='name' value='<?php print($name);?>'><br>
                <span class="error">* <?php print($nameErr);?></span>
                <br><br>
            E-mail: 
                <input type='text' name='email' value='<?php print($email);?>'><br>
                <span class="error">* <?php print($emailErr);?></span>
                <br><br>
            Website: 
                <input type='text' name='website' value='<?php print($website);?>'><br>
                <span class="error">* <?php print($websiteErr);?></span>
                <br><br>
            Comment: <br><textarea rows='5' cols='40' name='comment'><?php print($comment);?></textarea><br>
                <br><br>
            Gender:
                <input type='radio' name='gender' <?php if (isset($gender) && $gender == "female")
                    print("checked");?> value="female">Female
                <input type='radio' name='gender' <?php if (isset($gender) && $gender == "male")
                    print("checked");?> value="male">Male
                <input type='radio' name='gender' <?php if (isset($gender) && $gender == "other")
                    print("checked");?> value='other'>Other<br>
                <span class="error"> * <?php print($genderErr);?></span>
            </fieldset>
            <br>
            <table border=1>
                <tr>
                    <td>
                        <fieldset class="rating">
                            <legend align=center>Ambiance générale de la formation</legend>

                            <input for='ambiance1' class='star' type='radio' name='ambiance' id='ambiance1' 
                            <?php if ($ambiance == 1) print('checked'); ?> value='1'>
                            <label for='ambiance1'></label>

                            <input for='ambiance2' class='star' type='radio' name='ambiance' id='ambiance2' 
                            <?php if($ambiance == 2) print('checked'); ?> value='2'>
                            <label for='ambiance2'></label>

                            <input for='ambiance3' class='star' type='radio' name='ambiance' id='ambiance3' 
                            <?php if($ambiance == 3) print('checked'); ?> value='3'>
                            <label for='ambiance3'></label>

                            <input for='ambiance4' class='star' type='radio' name='ambiance' id='ambiance4' 
                            <?php if($ambiance == 4) print('checked'); ?> value='4'>
                            <label for='ambiance4'></label>

                            <input for='ambiance5' class='star' type='radio' name='ambiance' id='ambiance5' 
                            <?php if($ambiance == 5) print('checked'); ?> value='5'>
                            <label for='ambiance5'></label>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="rating">
                            <legend>Pédagogie du formateur</legend>

                            <input for='pedagogie1' class='star' type='radio' name='pedagogie' id='pedagogie1' 
                            <?php if ($pedagogie == 1) print('checked'); ?> value='1'>
                            <label for='pedagogie1'></label>

                            <input for='pedagogie2' class='star' type='radio' name='pedagogie' id='pedagogie2' 
                            <?php if($pedagogie == 2) print('checked'); ?> value='2'>
                            <label for='pedagogie2'></label>

                            <input for='pedagogie3' class='star' type='radio' name='pedagogie' id='pedagogie3' 
                            <?php if($pedagogie == 3) print('checked'); ?> value='3'>
                            <label for='pedagogie3'></label>

                            <input for='pedagogie4' class='star' type='radio' name='pedagogie' id='pedagogie4' 
                            <?php if($pedagogie == 4) print('checked'); ?> value='4'>
                            <label for='pedagogie4'></label>

                            <input for='pedagogie5' class='star' type='radio' name='pedagogie' id='pedagogie5' 
                            <?php if($pedagogie == 5) print('checked'); ?> value='5'>
                            <label for='pedagogie5'></label>

                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="rating">
                            <legend>Conditions de formation</legend>

                            <input for='condition1' class='star' type='radio' name='condition' id='condition1' 
                            <?php if ($condition == 1) print('checked'); ?> value='1'>
                            <label for='condition1'></label>

                            <input for='condition2' class='star' type='radio' name='condition' id='condition2' 
                            <?php if($condition == 2) print('checked'); ?> value='2'>
                            <label for='condition2'></label>

                            <input for='condition3' class='star' type='radio' name='condition' id='condition3' 
                            <?php if($condition == 3) print('checked'); ?> value='3'>
                            <label for='condition3'></label>

                            <input for='condition4' class='star' type='radio' name='condition' id='condition4' 
                            <?php if($condition == 4) print('checked'); ?> value='4'>
                            <label for='condition4'></label>

                            <input for='condition5' class='star' type='radio' name='condition' id='condition5' 
                            <?php if($condition == 5) print('checked'); ?> value='5'>
                            <label for='condition5'></label>

                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="rating">
                            <legend>Supports de formation</legend>

                            <input for='support1' class='star' type='radio' name='support' id='support1' 
                            <?php if ($support == 1) print('checked'); ?> value='1'>
                            <label for='support1'></label>

                            <input for='support2' class='star' type='radio' name='support' id='support2' 
                            <?php if($support == 2) print('checked'); ?> value='2'>
                            <label for='support2'></label>

                            <input for='support3' class='star' type='radio' name='support' id='support3' 
                            <?php if($support == 3) print('checked'); ?> value='3'>
                            <label for='support3'></label>

                            <input for='support4' class='star' type='radio' name='support' id='support4' 
                            <?php if($support == 4) print('checked'); ?> value='4'>
                            <label for='support4'></label>

                            <input for='support5' class='star' type='radio' name='support' id='support5' 
                            <?php if($support == 5) print('checked'); ?> value='5'>
                            <label for='support5'></label>

                        </fieldset>
                    </td>
                <tr>
            </table>
            <br>
            <input type='submit'>
        </form>
    </body>
</html>