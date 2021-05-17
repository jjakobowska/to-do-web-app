<?php
require 'db_conn.php';
?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta naem="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do list</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-section">
        <div class="add-section">
            <form action="app/add.php" method="POST" autocomplete="off">
            <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                <input type="text" name="title" placeholder="required"/>
                <button type="submit"> Add to list</button>
            <?php } else{?>
                <input type="text" name="title" placeholder="What do you want to complete"/>
                <button type="submit"> Add to list</button>
            <?php } ?>
            </form>
        </div>
        <?php
            $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
        ?>
        <div class="show-todo-section">
            
            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) {?>
            <div class="todo-item">
                <span id="<?php echo $todo['id']; ?> "
                    class = "remove-to-do">x</span>
                <?php if($todo['checked']){ ?>
                    <input type="checkbox"
                            class="check-box"
                            checked />
                    <h2 class="checked"> <?php echo $todo['title']?></h2>
                    
                <?php } else {?>
                    <input type="checkbox"
                            class="check-box"
                    <h2> <?php echo $todo['title']?></h2>
                <?php } ?>

                <br>
                    <small> created: <?php echo $todo['date_time']?></small>
                </div>
            <?php }?>
        </div>
    </div>
    <script src=js/jquery-3.6.0.min.js></script>
    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
            const id=$(this).attr('id');
           $.post("app/remove.php",{
               id: id
           }
           (data) => {
               alert(data);

           });
            });
        });
    </script>
</body>
</html>