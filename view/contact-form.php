<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <title>
            <?php print htmlentities($title) ?>
        </title>
    </head>
    <body>
        <?php
        if ($errors) {
            print '<ul class="errors">';
            foreach ($errors as $field => $error) {
                print '<li>' . htmlentities($error) . '</li>';
            }
            print '</ul>';
        }
        ?>
        <form id="forms">
            <label for="name">Name:</label><br/>
            <input id='name'type="text" name="name" value="<?php print htmlentities($name) ?>"/>
            <br/>

            <label for="phone">Phone:</label><br/>
            <input id="phone" type="text" name="phone" value="<?php print htmlentities($phone) ?>"/>
            <br/>
            <label for="email">Email:</label><br/>
            <input id="email" type="text" name="email" value="<?php print htmlentities($email) ?>" />
            <br/>
            <label for="address">Address:</label><br/>
            <textarea id="address" name="address"><?php print htmlentities($address) ?></textarea>
            <br/>
            <input type="hidden" name="form-submitted" value="1" />
            <input id="btn"type="submit" />
        </form>
        <script type="text/javascript">

        </script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="./assests/custom.js" type="text/javascript"></script>
    </body>
</html>
