<!DOCTYPE>
<html>
<head>
    <title>Madlib!</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
<div class = "content">
    <h1>Madlib!</h1>
        <div class = "madlibbox">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                First Name:<input type="text" name="firstname" value="<?php echo $_POST['firstname'] ?>"><br />
                Another First Name:<input type="text" name="secondname" value="<?php echo $_POST['secondname'] ?>"><br />
                Location:<input type="text" name="location" value="<?php echo $_POST['location'] ?>"><br />
                Occupation:<input type="text" name="occupation" value="<?php echo $_POST['occupation'] ?>"><br />
                Adjective:<input type="text" name="adjective" value="<?php echo $_POST['adjective'] ?>"><br />
                Verb:<input type="text" name="verb" value="<?php echo $_POST['verb'] ?>"><br />
                Noun:<input type="text" name="noun" value="<?php echo $_POST['noun'] ?>"><br />
                Adverb:<input type="text" name="adverb" value="<?php echo $_POST['adverb'] ?>"><br />

                <input type="submit" name="madlib" value="Create story!">
            </form>
        </div>

    <?php
    if (isset($_POST['madlib'])){

        $errors = array();
        $filledCorrectly = true;

        if ($_POST['firstname'] != NULL){$firstname = $_POST['firstname'];}
        else{ array_push($errors, "You forgot the First Name!<br>"); $filledCorrectly = false;}

        if ($_POST['location'] != NULL){$location = $_POST['location'];}
        else{ array_push($errors, "You forgot the location!<br>"); $filledCorrectly = false;}

        if ($_POST['secondname'] != NULL){$secondname= $_POST['secondname'];}
        else{ array_push($errors, "You forgot the second name!<br>"); $filledCorrectly = false;}

        if ($_POST['adjective'] != NULL){$adjective = $_POST['adjective'];}
        else{ array_push($errors, "You forgot the adjective!<br>"); $filledCorrectly = false;}

        if ($_POST['verb'] != NULL){$verb = $_POST['verb'];}
        else{ array_push($errors, "You forgot the verb!<br>"); $filledCorrectly = false;}

        if ($_POST['noun'] != NULL){$noun = $_POST['noun'];}
        else{ array_push($errors, "You forgot the noun!<br>"); $filledCorrectly = false;}

        if ($_POST['occupation'] != NULL){$occupation = $_POST['occupation'];}
        else{ array_push($errors, "You forgot the occupation!<br>"); $filledCorrectly = false;}

        if ($_POST['adverb'] != NULL){$occupation = $_POST['adverb'];}
        else{ array_push($errors, "You forgot the adverb!<br>"); $filledCorrectly = false;}

            if ($filledCorrectly){
                // insert in to DB
            }
            else{
                foreach($errors as $value){
                    print $value;
                }
            }
        }

        // loop and display current stories from DB (see check box examples)

        
        ?><div class = "content">

        <div class = "madlibbox"><?php
            echo "There once was a $occupation named $firstname who lived in $location 
            and liked to $verb and talk to the neighbor's $adjective $noun. This bothered 
            $firstname's best friend $secondname. The end.";?>
        </div>
</div></body></html>