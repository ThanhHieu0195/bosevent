<?php
$path_template_url = get_template_directory_uri();
?>
<div class="nourteam">
    <ul class="nourteam__wrap wp-inlineb list-clm clm-04">
        <?php
        $idx = 0;
        while (isset($params['name'.$idx])) {
            $name = $params['name'.$idx];
            $background = $params['background'.$idx];
            $position = $params['position'.$idx];
            echo '<li class="nitem inlineb-t">
                    <div class="nourteam__img">
                        <img src="'.$background.'" alt="" class="nimg nratio--img">
                    </div>
                    <div class="nourteam__des txt--r">
                        <h4 class="nourteam__des-title  cl--white f--600 txt--up">'.$name.'</h4>
                        <span class="nourteam__des-pos cl--white">'.$position.'</span>
                    </div>
                </li>';
            $idx ++;
        }
        ?>
    </ul>
</div>