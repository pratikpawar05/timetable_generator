<?php

include_once 'database.php';
$call = $_POST['request'];

switch ($call) {
    case 'Timeslot':
        echo getTimeSlot($connection, $_POST['data']);
        break;
    case 'Subjects':
        echo getSubjects($connection, $_POST['data']);
        break;
    case 'Batches':
        echo getBatches($connection, $_POST['data']);
        break;
    case 'Staffs':
        echo getStaffs($connection, $_POST['data']);
        break;
    case 'GenerateTimetable':
        echo generateTimetable($connection, $_POST['data']);
        break;
    case 'GenerateStaffTimetable':
        echo generateStaffTimetable($connection, $_POST['data']);
    default:
}

function getStaffs($connection, $data)
{
    $dept_id = $data['dept_id'];
    $sql = "SELECT * FROM staffs where dept_id='{$dept_id}'";
    $staffs = mysqli_fetch_all(mysqli_query($connection, $sql), MYSQLI_ASSOC);
    echo "<label class='control-label'>Select Staff</label>";
    echo "<select name='timetable_staff' id='timetable_staff' class='form-control custom-select'>";
    echo "<option>Select Staff</option>";
    foreach ($staffs as $key => $value) {
        echo "<option value={$value['id']}>{$value['name']}</option>";
    }
    echo "</select>";
}

function generateStaffTimetable($connection, $data)
{
    $dept_id = $data['dept_id'];
    $sem_id = $data['sem_id'];
    $staff_id = $data['staff_id'];


    $sql = "SELECT * FROM timeslots";
    $timeslots = mysqli_fetch_all(mysqli_query($connection, $sql), MYSQLI_ASSOC);
    $sql = "SELECT * FROM days";
    $days = mysqli_fetch_all(mysqli_query($connection, $sql), MYSQLI_ASSOC);
    foreach ($timeslots as $i => $time) {
        echo "<tr><td><b>{$time['timeslot']}</b></td>";
        foreach ($days as $j => $day) {
            $result = mysqli_query($connection, "SELECT id FROM timetable where dept_id='{$dept_id}' AND sem_id='{$sem_id}' AND timeslot_id='{$time['id']}' AND day_id='{$day['id']}'");
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                $query = "SELECT * FROM timetable t inner join timetable_batches tb on t.id=tb.timetable_id inner join subject_staff ss on ss.id=tb.subject_staff_id inner join subjects on ss.sub_id=subjects.id inner join staffs on staffs.id=ss.staff_id where t.dept_id='{$dept_id}' AND t.sem_id='{$sem_id}' AND t.timeslot_id='{$time['id']}' AND t.day_id='{$day['id']}' AND ss.staff_id='{$staff_id}'";
                $resultset = mysqli_fetch_all(mysqli_query($connection, $query), MYSQLI_ASSOC);
                echo "<td>";
                $hasValue = false;
                foreach ($resultset as $k => $batches) {
                    $hasValue = true;
                    echo "<i>{$batches['sub_name']}<br>({$batches['name']})</i>";
                }
                if ($hasValue == false) {
                    echo "N-A";
                }
                
                echo "</td>";
            } else {
                echo "<td>N-A</td>";
            }
        }
        echo "</tr>";
    }
}
function generateTimetable($connection, $data)
{
    $dept_id = $data['dept_id'];
    $sem_id = $data['sem_id'];
    $sql = "SELECT * FROM timeslots";
    $timeslots = mysqli_fetch_all(mysqli_query($connection, $sql), MYSQLI_ASSOC);
    $sql = "SELECT * FROM days";
    $days = mysqli_fetch_all(mysqli_query($connection, $sql), MYSQLI_ASSOC);
    foreach ($timeslots as $i => $time) {
        echo "<tr><td><b>{$time['timeslot']}</b></td>";
        foreach ($days as $j => $day) {
            $result = mysqli_query($connection, "SELECT id FROM timetable where dept_id='{$dept_id}' AND sem_id='{$sem_id}' AND timeslot_id='{$time['id']}' AND day_id='{$day['id']}'");
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                $query = "SELECT * FROM timetable t inner join timetable_batches tb on t.id=tb.timetable_id inner join subject_staff ss on ss.id=tb.subject_staff_id inner join subjects on ss.sub_id=subjects.id inner join staffs on staffs.id=ss.staff_id where t.dept_id='{$dept_id}' AND t.sem_id='{$sem_id}' AND t.timeslot_id='{$time['id']}' AND t.day_id='{$day['id']}'";
                $resultset = mysqli_fetch_all(mysqli_query($connection, $query), MYSQLI_ASSOC);
                echo "<td>";
                foreach ($resultset as $k => $batches) {
                    echo "<i>{$batches['sub_name']}<br>({$batches['name']})</i>";
                }
                echo "</td>";
            } else {
                echo "<td>N-A</td>";
            }
        }
        echo "</tr>";
    }
}
function getBatches($conn, $data)
{
    $dept_id = $data['dept_id'];
    $sem_id = $data['sem_id'];
    $type_id = $data['type_id'];
    $sql = "SELECT * FROM batches where dept_id='$dept_id' and sem_id='$sem_id' and type_id='$type_id'";
    $query = mysqli_query($conn, $sql);
    $res = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return json_encode($res);
}
function getSubjects($conn, $data)
{
    $dept_id = $data['dept_id'];
    $sem_id = $data['sem_id'];
    $type_id = $data['type_id'];
    $sql = "SELECT * FROM subjects sub  inner join subject_staff ss on sub.id=ss.sub_id inner join staffs on ss.staff_id=staffs.id where sub.dept_id='$dept_id' and sem_id='$sem_id' and type_id='$type_id'";
    $query = mysqli_query($conn, $sql);
    $res = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return json_encode($res);
}
function getTimeSlot($conn, $data)
{
    $dept_id = $data['dept_id'];
    $sem_id = $data['sem_id'];
    $sql = "SELECT * FROM timetable.timeslots WHERE id NOT IN (SELECT timeslot_id FROM timetable.timetable WHERE dept_id = $dept_id AND sem_id = $sem_id)";
    $query = mysqli_query($conn, $sql);
    $res = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return json_encode($res);
}
