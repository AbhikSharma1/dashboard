<?php


include 'code.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}



?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


  <title>Welcome -
    <?php echo $_SESSION['username'] ?>
  </title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
      width: 100%;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    h1 {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px 0;
    }

    h1 span {
      color: #fe5b3d;
    }

    p {
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;

    }

    /*------------------left Side------------*/

    .dd {
      display: flex;
      align-items: center;
      justify-content: center;
      justify-content: space-between;
      padding: 5rem 5rem;
    }

    .dd .left {
      height: 555px;
      width: 444px;
      /*background-color: #222;*/
      border-radius: 15px;
    }

    .left .pic img {
      object-fit: cover;
      border-radius: 2rem;
      overflow: hidden;
      border-radius: 20px;
    }

    img {
      border-radius: 20px;
    }


    /*-------- Right Side -----------------*/

    .dd .right {
      height: 675px;
      width: 644px;
      background: whitesmoke;
      border-radius: 15px;
    }

    .cont p {
      margin-top: 15px;
      margin-bottom: 0;
    }

    .cont p span {
      font-size: 40px;
      font-weight: bold;
      color: crimson;
    }

    .dd .group {
      margin-top: 10px;
      display: flex;
      flex-direction: column;
    }

    .dd label {
      margin: 0 300px;
      color: #222;
      font-size: 17px;
    }

    .dd input {
      border: 0;
      outline: none;
      background: transparent;
      border-bottom: 2px solid #fe5b3d;
      width: 25rem;
      font-size: 20px;
      height: 40px;
      margin: 20px auto;
    }

    #img {
      margin: 15px auto;
    }

    .group small {
      margin: 10px 300px;
      font-size: 15px;
    }

    ::placeholder {
      opacity: 0.3;
      color: #555;
    }

    .btn {
      margin: 17px 300px;
      padding: 5px 10px;
      border: 0;
      font-size: 17px;
      outline: none;
      background: #474fa0;
      color: white;
      border-radius: 0.3rem;
      transition: 0.5s ease;
      cursor: pointer;
    }

    .btn:hover {
      background: #fe5b3d;
      color: #fff;
    }

    .line {
      margin: auto 90px;
      color: grey;
    }

    buttons {
      display: flex;

    }
  </style>

</head>

<body>
<!-- Button trigger modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit your Profile Here.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="welcome.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Note Title</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Note Description</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <?php require '_nav.php' ?>
  <h1>Welcome - <span>
      <?php echo $_SESSION['username'] ?>
    </span></h1>
  <p>Here you can upload your data according to your choice.</p>

  <?php

  ?>
  <div class="dd">
    <div class="container">
      <div class="left">

        <?php

        $sql = "SELECT * FROM cand ";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res)) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="pic">
              <img src="upload/<?= $row['img'] ?>">
            </div> <br><br>

            <?php
          }
        }

        ?>
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">UserName</th>
              <th scope="col">Email</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM `cand`";
            $result = mysqli_query($conn, $sql);
            $sno = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              $sno = $sno + 1;
              echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['username'] . "</td>
            <td>" . $row['email'] . "</td>
            <td> <button class='update btn btn-sm btn-primary' id=" . $row['Sno'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['Sno'] . ">Delete</button>  </td>
          </tr>";
            }
            ?>


          </tbody>
        </table>
      </div>
    </div>
    <div class="right">
      <div class="cont">
        <pre>
        <p>
          <span><?php echo $_SESSION['username'] ?></span>  Here you can Edit your Profile.
        </p>
        </pre>

        <hr class="line">

        <?php
        if (isset($_SESSION['status']) && $_SESSION != '') {
          echo $_SESSION['status'];
          unset($_SESSION['staus']);

        }


        ?>
        <form action="welcome.php" method="post" enctype="multipart/form-data">
          <div class="group">
            <label for="username">Username</label>
            <input type="text" class="" id="username" name="username" placeholder="Enter the username">

          </div>

          <div class="group">
            <label for="password">Password</label>
            <input type="password" class="" id="password" name="password" placeholder="Enter the Password">

          </div>
          <div class="group">
            <label for="email">Email</label>
            <input type="email" class="" id="email" name="email" placeholder="Enter your Email">

          </div>

          <div class="group">
            <label for="password">Profile</label>
            <input type="file" class="" id="img" name="img" placeholder="Enter the password">
          </div>


          <button type="submit" name="saver" class="btn">Update</button>

        </form>
      </div>
    </div>
  </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        titleEdit.value = title;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `welcome.php`;

        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>