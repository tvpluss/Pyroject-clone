<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>New member register here!</h1>
    <form id="Register" method="post">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname" placeholder="2 to 30 characters"> <br>
        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname" placeholder="2 to 30 characters"> <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" placeholder="str@str.str"> <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="2 to 30 characters"> <br>
        <label>Birthday:</label>
        <!-- <input type="date"> -->
        <?php
        // lowest year wanted
        $cutoff = 1910;

        // current year
        $now = date('Y');

        // build years menu
        echo '<select name="year">' . PHP_EOL;
        for ($y = $now; $y >= $cutoff; $y--) {
            echo '  <option value="' . $y . '">' . $y . '</option>' . PHP_EOL;
        }
        echo '</select>' . PHP_EOL;

        // build months menu
        echo '<select name="month">' . PHP_EOL;
        for ($m = 1; $m <= 12; $m++) {
            echo '  <option value="' . $m . '">' . date('M', mktime(0, 0, 0, $m)) . '</option>' . PHP_EOL;
        }
        echo '</select>' . PHP_EOL;

        // build days menu
        echo '<select name="day">' . PHP_EOL;
        for ($d = 1; $d <= 31; $d++) {
            echo '  <option value="' . $d . '">' . $d . '</option>' . PHP_EOL;
        }
        echo '</select>' . PHP_EOL;
        ?>
        </select>
        <fieldset>
            <legend>Gender:</legend>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
            <input type="radio" id="unspecified" name="gender" value="unspecified" checked>
            <label for="unspecified">Unspecified</label>
        </fieldset>
        <label for="country">Select your country:</label>
        <select name="country" id="country">
            <option value="None">Select</option>
            <option value="Vietnam">Vietnam</option>
            <option value="Australia">Australia</option>
            <option value="United States">United States</option>
            <option value="India">India</option>
            <option value="Other">Other</option>
        </select>
        <br>
        <label for="about">About:</label> <br>
        <textarea name="about" id="about" cols="40" rows="20" placeholder="Maximum 10000 characters"></textarea> <br>
        <button type="submit" name="submit" value="submit">Submit</button>
        <input type="reset" value="Reset">
    </form>
</body>

</html>