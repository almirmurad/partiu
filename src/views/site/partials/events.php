<?php 
if(isset($events['events'])){

     foreach ($events['events'] as $event){
        echo<<<EOT
         <a href="$base/events/$event->id/readEvent"><div class="itemEventoL">
            <div style="background-image:linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url($base/media/uploads/imgs/events/$event->cover);background-position:center;background-size:cover;" class="imgEvento" >
                <h3>$event->title</h3>
            </div>
            <div class="footEvento">
                <p>$event->description
                </p>
            </div>
        </div></a>
EOT;
     }
    }elseif($events){
        foreach ($events as $event){
        echo<<<EOT
        <a href="$base/events/$event->id/readEvent"><div class="itemEventoL">
            <div style="background-image:linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url($base/media/uploads/imgs/events/$event->cover);background-position:center;background-size:cover;" class="imgEvento" >
                <h3>$event->title</h3>
            </div>
            <div class="footEvento">
                <p>$event->description
                </p>
            </div>
        </div></a>
EOT;
        }
    }
