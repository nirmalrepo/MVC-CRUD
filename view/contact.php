<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <title><?php print $contact->name; ?></title>
    </head>
    <body>
        <h1><?php print $contact->name; ?></h1>
        <div>
            <span class="label">Phone:</span>
            <?php print $contact->phone; ?>
        </div>
        <div>
            <span class="label">Email:</span>
            <?php print $contact->email; ?>
        </div>
        <div>
            <span class="label">Address:</span>
            <?php print $contact->address; ?>
        </div>
    </body>
</html>
