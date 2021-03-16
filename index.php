<?php include("db.php"); 
$club = "SELECT * FROM player_mast";?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?> <!-- esto limpia los datos q tenemos en seccion -->

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Description"></textarea>
          </div>
          <input type="submit" name="save" class="btn btn-success btn-block" value="Save ">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>player_id</th>
            <th>team_id</th>
            <th>jersey_no</th>
            <th>player_name</th>
            <th>posi_to_play</th>
            <th>dt_of_bir</th>
            <th>age</th>
            <th>playing_club</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM player_mast";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['player_id']; ?></td>
            <td><?php echo $row['team_id']; ?></td>
            <td><?php echo $row['jersey_no']; ?></td>
            <td><?php echo $row['player_name']; ?></td>
            <td><?php echo $row['posi_to_play']; ?></td>
            <td><?php echo $row['dt_of_bir']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['playing_club']; ?></td>

            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

