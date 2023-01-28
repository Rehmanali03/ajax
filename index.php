<?php 
    include 'conn.php';

    $q = "SELECT * from categories";
    $res = mysqli_query($con, $q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <h1>Ajax</h1>

    <select name="" id="cat">
        <option value="">Select Categories</option>
        <?php
            while($row = mysqli_fetch_assoc($res)){
                ?>
                    <option value="<?=$row['id']?>"><?= $row['cat_name'] ?></option>
                <?php
            }
        ?>
    </select>

    <select name="" id="subcat">
        <option value="">Select Sub Categories</option>
        
    </select>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>email</th>
            <th>Password</th>
        </tr>

        <?php
            $user_q = "SELECT * from users;";
            $user_res = mysqli_query($con, $user_q);
            while($user_row = mysqli_fetch_assoc($user_res)){
                ?>
                    <tr>
                        <td><?=$user_row["id"]?></td>
                        <td><?=$user_row["name"]?></td>
                        <td><?=$user_row["email"]?></td>
                        <td><?=$user_row["password"]?></td>
                    </tr>
                <?php
            }
        ?>
    </table>

    <div id="demo"></div>
    <script>
        $(document).ready(function(){




            $("#cat").change(function(){
                let cat_id = $("#cat").val()
                if(cat_id != ''){
                    $.ajax({
                        url: 'get_subcat.php',
                        method: 'GET',
                        data: {
                            category_id: cat_id
                        },
                        success: function(res){
                            console.log(res)
                            $("#subcat").html(res)
                        },
                        error: function(err){
                            console.log(err)
                        }
                    });
                }
            });

            // url -> url to hit
            // $.ajax({
            //     url: "data.php",
            //     method: "POST",
            //     data: {
            //         full_name: "Usman Khan",
            //         age: 11
            //     },
            //     success: function(result){
            //         $("#demo").html(result);
            //     },
            //     error: function(error){
            //         console.log(error);
            //     }
            // });

        });
    </script>
</body>
</html>