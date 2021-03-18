<?php include("db.php"); ?>

 <?php include("includes/header.php"); ?>


<main class="container-fluid p-2">
  <div class="row">
    <div class="col-md-4">
      


      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>



      <div class="card card-body">
        <form action="save_task.php" method="POST">
         
          <div class="form-group mt-1">
          <input type="text" name="player_id" class="form-control" placeholder="player" autofocus>
          </div>

          <div class="form-group mt-1">
              <select class="form-control" id="country">
                  <option>Seleccionar País</option>
                  <?php
                            $query = "SELECT * FROM soccer_country";      
                            $result_tasks = mysqli_query($conn, $query);   /* esta variable $conn me trae el resultado de los paises */  

                            while($row = mysqli_fetch_assoc($result_tasks)) {     /* while recorre la db y me muestra country de forma grafica */
                              
                              echo '<option value="'.$row["country_id"].'">'.$row["country_name"].'</option>';
                            }
                  ?>
                </select>
          </div>

          <div class="form-group mt-1">
            <input type="text" name="jersey_no" class="form-control" placeholder="Jersey#" autofocus>
          </div>

          <div class="form-group mt-1">
            <select class="form-control" id="country">
                  <option>Seleccionar Posición</option>
                  <?php
                            $query = "SELECT * FROM playing_position";
                            $result_tasks = mysqli_query($conn, $query);    

                            while($row = mysqli_fetch_assoc($result_tasks)) { 
                              
                              echo '<option value="'.$row["position_id"].'">'.$row["position_id"],$row["position_desc"].'</option>';
                            }
                 ?>
            </select>
          </div>

          <div class="form-group mt-1">
            <input type="text" name="dt_of_bir" class="form-control" placeholder="BirhtDay" autofocus>
          </div>

          <div class="form-group mt-1">
            <input type="text" name="age" class="form-control" placeholder="Age" autofocus>
          </div>

          <div class="form-group mt-1">
            <input type="text" name="playing_club" class="form-control" placeholder="Club" autofocus>
          </div>

          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Player">

        

<!-- registrar un new jugador -->

    <!-- <div class="card card-body" -->>
        <form action="save_task.php" method="POST">
         
          <div class="form-group mt-1">
          <select name="player" class="form-control" id="country">
                  <option>Seleccionar Jugador</option>
                  <?php
                            $query = "SELECT * FROM player_mast where active= 0 or active =1";
                            $result_tasks = mysqli_query($conn, $query);    

                            while($row = mysqli_fetch_assoc($result_tasks)) { 
                              
                            echo '<option value="'.$row["player_id"].'">'.$row["player_name"].'</option>';
                            }
                  ?>
              </select>
          </div>

          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Player">

        </form>
       </div>
      </div>
     </form>
    </div>
  </div>


<!-- Tables -->
<div class=container-fluid>
     <div class="col-md-8">
    <table class="table table-bordered">
        <thead>
          <tr> 
            <th>Name</th>
            <th>country</th>
            <th>Jersey</th>
            <th>Position Play</th>
            <th>Birthday</th>
            <th>Age</th>
            <th>playingClub</th>
            <th>Action</th>
          </tr>
        </thead>
       
<!-- llamado a db-->
        <tbody>
        <?php
          $query = "SELECT * FROM player_mast where active = 0";
          $result_tasks = mysqli_query($conn, $query); 

          $query2 = "SELECT  country_name FROM player_mast  INNER JOIN soccer_country ON soccer_country.country_id = player_mast.team_id";   
          $result_country = mysqli_query($conn, $query2);
        

          while ($row_country = mysqli_fetch_assoc ($result_country) and $row = mysqli_fetch_assoc($result_tasks)) { 
        ?>


          <tr>
            <td><?php echo $row['player_name'];?></td>
            <td><?php echo $row_country['country_name'];?></td>
            <td><?php echo $row['jersey_no'];?></td>
            <td><?php echo $row['posi_to_play'];?></td>
            <td><?php echo $row['dt_of_bir'];?></td>
            <td><?php echo $row['age'];?></td>
            <td><?php echo $row['playing_club'];?></td>
            <td>
            
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['player_id']?>" class="btn btn-danger">
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