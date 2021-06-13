<?php
  $length = 10;
  $width = 10;
  $perimeter = 2*($length+$width);
  $area = $length*$width;
  if($length == $width){
      echo"the shape is a square";
  }else{
      echo"The perimeter of the rectangle is ".$perimeter." And the area is ".$area;
  }
    ?>