<?php
  $con=mysqli_connect("localhost","root","","presensidosendb");
  $count_on=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id) FROM attendance WHERE time(time_in)<='07:00:00' AND month(time_in)=month(now())"));
  $count_late=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id) FROM attendance WHERE time(time_in)>'07:00:00' AND month(time_in)=month(now())"));

  $count_on1=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id) FROM attendance WHERE time(time_in)<='07:00:00' AND date(time_in)=date(now())"));
  $count_late1=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id) FROM attendance WHERE time(time_in)>'07:00:00' AND date(time_in)=date(now())"));
  $count_absence1=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id) FROM count_absence_day"));
?>
