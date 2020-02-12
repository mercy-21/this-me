<?php include('gsconn.php');
    if(isset($_GET['update'])) {
        $id = $_GET['update'];
        $edit_state = true;
        $rec = mysqli_query($db, "SELECT * FROM goalseekers WHERE id=$id");
        $record = mysqli_fetch_array($rec);
        $name = $record['name'];
        $status = $record['status'];
        $id = $record['id'];
    }
?>
<!DOCTYPE html>
<html>
<head>
<link rel ='stylesheet' type = 'text/css' href = 'styles/day.css'/>
    <title>
        Work Schedule
    </title>
</head>
<body>
    <?php if (isset($_SESSION['message'])): ?>
	    <div class="msg">
		    <?php 
			    echo $_SESSION['message']; 
			    unset($_SESSION['message']);
		    ?>
	    </div>
    <?php endif ?>
    <h1>
        Goal Seekers Work Schedule
    </h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th colspan = "2">Modify</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($row = mysqli_fetch_array($results))
                {
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <a class = "edit_btn" href ="goalseekers.php?update=<?php echo $row['id']; ?>">Update</a>
                </td>
                <td>
                    <a class = "del_btn" href ="gsconn.php?del=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
             <?php }?>
        </tbody>
    </table>
    <form method = "post" action ="gsconn.php">
    <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
        <div class = "input-group">
            <label>Name:</label>
            <input type = "text" name = "name" value = "<?php echo $name; ?>">
        </div>
        <div class = "input-group">
            <label>Status:</label>
            <input type = "text" name = "status" value = "<?php echo $status; ?>">
        </div>
        <div class = "input-group">
        <?php if ($edit_state == false): ?>
            <button type = "submit" name = "add" class = "btn">Add</button>
        <?php else: ?>
            <button type = "submit" name = "update" class = "btn">Update</button>
        </div>
        <?php endif ?>
    </form>
    <div style = "text-align: center; margin: 50px">
        <a href = "home.php">Back</a>
    </div>
</body>
</html>