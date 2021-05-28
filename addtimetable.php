<?php
include("database.php");

if (isset($_POST['addtimetable'])) {
  // print_r($_POST);
  $sql = "SELECT * FROM timetable_batches tb INNER JOIN timetable tt ON tt.id = tb.timetable_id WHERE dept_id = '{$_POST['timetable_dept']}' AND timeslot_id = '{$_POST['timetable_timeslot']}' AND day_id = '{$_POST['timetable_day']}' AND sem_id='{$_POST['timetable_sem']}'";
  $result = mysqli_query($connection, $sql);
  $num_rows = mysqli_num_rows($result);
  if ($num_rows > 0) {
    echo "<script>alert('Timeslot is already reserved for other subjects.')</script>";
    echo "<script>window.location.href ='addtimetable.php'</script>";
  }

  $count = (int)$_POST['timetable_total_count'];
  $i = 0;
  $isAlreadyAllocated = false;
  $queries = [];
  while (isset($count) && $i < $count) {
    if (isset($_POST['staff_' . $i])) {
      $sql = "SELECT * FROM timetable_batches tb INNER JOIN timetable tt ON tt.id = tb.timetable_id INNER JOIN subject_staff ss ON ss.id=tb.subject_staff_id  WHERE dept_id = '{$_POST['timetable_dept']}' AND timeslot_id = '{$_POST['timetable_timeslot']}' AND day_id = '{$_POST['timetable_day']}' AND staff_id='{$_POST['staff_' .$i]}'";
      $result = mysqli_query($connection, $sql);
      $num_rows = mysqli_num_rows($result);
      if ($num_rows > 0) {
        $isAlreadyAllocated = true;
        break;
      } else {
        $sql = "SELECT * FROM subject_staff where sub_id='{$_POST['subject_' .$i]}' and staff_id='{$_POST['staff_' .$i]}' and type_id='{$_POST['timetable_type']}'";
        $result = mysqli_query($connection, $sql);
        $data = mysqli_fetch_array($result);
        array_push($queries, [$data['id'], $_POST['batch_' . $i]]);
      }
    }
    $i++;
  }
  if ($isAlreadyAllocated) {
    echo "<script>alert('For this Timeslot staff is already reserved.')</script>";
  } else {
    $sql = "INSERT INTO `timetable` (`timeslot_id`, `day_id`, `dept_id`, `sem_id`, `type_id`) VALUES ({$_POST['timetable_timeslot']},{$_POST['timetable_day']},{$_POST['timetable_dept']},{$_POST['timetable_sem']},{$_POST['timetable_type']});";
    $result = mysqli_query($connection, $sql);
    $timetable_id = mysqli_insert_id($connection);

    for ($i = 0; $i < count($queries); $i++) {
      $query = "INSERT INTO `timetable_batches` ( `subject_staff_id`, `batch_id`, `timetable_id`) VALUES ({$queries[$i][0]},{$queries[$i][1]},{$timetable_id})";
      $result = mysqli_query($connection, $query);
      // print_r($query);
      // print_r($result);
    }
    echo "<script>alert('Succesfully Timeslot is reserved!')</script>";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include_once "./partials/header.php" ?>

    <?php include_once "./partials/sidebar.php" ?>

    <div class="content-wrapper">

      <section class="content-header">
        <h1> Add Timetable </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">TimeSlot</li>
          <li class="active">Add Timeslot</li>
        </ol>
      </section>
      <hr>
      <hr>

      <form id="timetable_form" action="" method="post">
        <div>
          <div class="form-group col-md-3">
            <label class="control-label">Department</label>
            <select name="timetable_dept" id="timetable_dept" class="form-control custom-select">
              <option value="">Select Department</option>

              <?php
              $sql = "Select * from departments";
              $query = mysqli_query($connection, $sql);
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['dept_name'] ?></option>
              <?php
              } ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Semester</label>
            <select name="timetable_sem" id="timetable_sem" class="form-control custom-select">
              <option value="">Select Semester</option>
              <?php
              $sql = "Select * from semesters";
              $query = mysqli_query($connection, $sql);
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['sem_name'] ?></option>
              <?php
              } ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Time Slot</label>
            <select name="timetable_timeslot" id="timetable_timeslot" class="form-control custom-select">
            <option value="">Select Time Slot</option>
              <?php
              $query = mysqli_query($connection, "SELECT * FROM timeslots");
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['timeslot'] ?></option>
              <?php
              } ?>
              ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Day</label>
            <select name="timetable_day" id="timetable_day" class="form-control custom-select">
            <option value="">Select Day</option>
              <?php
              $query = mysqli_query($connection, "SELECT * FROM days");
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['day_name'] ?></option>
              <?php
              } ?>
              ?>
            </select>
          </div>
          <div class="row">
            <div class="form-group col-md-3">
              <label class="control-label">Type</label>
              <select name="timetable_type" id="timetable_type" class="form-control custom-select">
              <option value="">Select Type</option>
                <?php
                $query = mysqli_query($connection, "SELECT * FROM type_of_study;");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <option value="<?php echo $row['id'] ?>"><?php echo $row['type_name'] ?></option>
                <?php
                } ?>
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6" id="timetable_table">
              <table class="table table-striped">
                <thead>
                  <th scope="col">Subject</th>
                  <th scope="col">Teacher</th>
                  <th scope="col">Batch</th>
                  <th scope="col">Action</th>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

          <div class="form-group col-md-2">
            <a href="">
              <button class="btn btn-success" type="submit" name="addtimetable" id="addtimetable"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Timetable</button></a>
          </div>
        </div>
      </form>

      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="bower_components/fastclick/lib/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- Sparkline -->
      <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
      <!-- jvectormap  -->
      <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <!-- SlimScroll -->
      <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- ChartJS -->
      <script src="bower_components/chart.js/Chart.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard2.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <script>
        $('#timetable_type').on('change', function() {
          let dept_id = $("#timetable_dept").val();
          let sem_id = $("#timetable_sem").val();
          let type_id = this.selectedOptions[0].value;
          console.log(dept_id, sem_id, type_id);
          ajaxRequest("Batches", {
            dept_id: dept_id,
            sem_id: sem_id,
            type_id: type_id
          });
        });

        $('#timetable_dept').on('change', function() {
          var selectedValue = this.selectedOptions[0].value;
          var selectedText = this.selectedOptions[0].text;
          // console.log(selectedValue, selectedText);
        });
        // $('#timetable_sem').on('change', function() {
        //   let sem_id = this.selectedOptions[0].value;
        //   let dept_id = $("#timetable_dept").val();
        //   ajaxRequest("Timeslot", {
        //     dept_id: dept_id,
        //     sem_id: sem_id
        //   });
        // });
        var batches, sub_content;
        $(document).on('change', '.select-subject', function(e) {
          let sub_id = this.selectedOptions[0].value;
          let ind = this.selectedOptions[0].getAttribute("index");
          let staff = $(this).parent().next().children()[0];
          $(staff).find(":selected").val(sub_content[ind].staff_id);
          $(staff).find(":selected").text(sub_content[ind].name)
          // console.log("done");
        });
        $(document).on('click', '.deleterowtable', function(e) {
          e.preventDefault();
          $(this).parent().parent().remove();
        });

        function ajaxRequest(type, data) {
          $.ajax({
            url: "ajax.php", //the page containing php script
            type: "post", //request type,
            data: {
              request: type,
              data: data
            },
            success: function(result) {
              switch (type) {
                case "Subjects":
                  sub_content = JSON.parse(`${result}`);
                  // console.log(batches);
                  let content = ``;
                  batches.forEach((elem, index) => {
                    content += `<tr>
                    <td><select class="form-control select-subject" name="subject_${index}"> 
                    <option value="">Select Subject</option>
                    ${sub_content.map((elem,index) => { 
                    return  "<option index='"+ index +"' value='" + elem.sub_id + "'>" + elem.sub_name + "</option>"  }).join("")
                  }</select></td>
                  <td><select class="form-control" name="staff_${index}" >
                  <option value="">NA</option>
                  </select></td>
                  <td><select class="form-control" name="batch_${index}" >
                  <option value="${elem.id}">${elem.batch_name}</option>
                  </select></td>
                  <td><button class="btn btn-danger deleterowtable" name="deleterowtable">Delete</button></td></tr>`
                  });
                  if ($('#timetable_form').find('#timetable_total_count').length > 0) {
                    $('#timetable_form').find('#timetable_total_count').val(batches.length);
                  } else {
                    $('#timetable_form').append(`<input type="hidden" id="timetable_total_count" name="timetable_total_count" value='${batches.length}'>`);
                  }
                  // console.log(content);
                  $('#timetable_table table > tbody').html(content);

                  break;
                case "Batches":
                  // console.log(result);
                  batches = JSON.parse(`${result}`);
                  let dept_id = $("#timetable_dept").val();
                  let sem_id = $("#timetable_sem").val();
                  let type_id = $("#timetable_type").val();
                  ajaxRequest("Subjects", {
                    dept_id: dept_id,
                    sem_id: sem_id,
                    type_id: type_id,
                  });
                  break;
                default:
                  break;
              }
            },
            error: function(err) {
              console.log(err);
            }
          });
        }
      </script>
</body>

</html>