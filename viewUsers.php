<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
</head>
<body>
    <table border="1">
        <tr>
            <td colspan = "4" align="center">Users</td>
        </tr>
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>USER TYPE</td>
        </tr>
        <?php
            $file = fopen("userInfo.txt",'r');

            while(!feof($file)) {
                $data = fgets($file);
                if(empty($data)){
                    break;
                }
                $user = explode('|', $data);
                if(is_null($user)) {
                    break;
                }
                echo "
                    <tr>
                        <td>$user[0]</td>
                        <td>$user[2]</td>
                        <td>$user[3]</td>
                        <td>$user[4]</td>
                    </tr>";
            }
        ?>
        <tr>
            <td colspan = "4" align="right"><a href="">Go Home</a></td>
        </tr>

    </table>
</body>
</html>