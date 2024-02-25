<?php
       $sql="SELECT *FROM flights;";
       $result=mysqli_query($conn, $sql);
       $resultcheck=mysqli_num_rows($result);
       if($resultcheck> 0){
          while($row = mysqli_fetch_assoc($result)){
            echo $row['price'];
            echo $row['source'];            
          }
       }
    ?>