<?php

   echo"<div class=\"espaco\"></div>";
      echo "<div class='pagination'>";
                  for($x=0; $x < $total; $x++){
                     echo"<a class=\"".($x==$current?'active':'')."\" href=\"".$base."/$link?page=".$x."\">".($x+1)."</a>";
                     }
      echo "</div>";

