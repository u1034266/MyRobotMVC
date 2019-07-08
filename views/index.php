<h1>Adventures of R2D2 on Planet 5-squared</h1>
<div class="row col-md-12 centered">
    <p>
        R2D2 needs your help to navigate the plains of planet 5-squared. Try not to guide him off the edge of the planet!
    </p>
    <?php 
        $a = $x;
        $b = $y;
        $c = $z;

        echo '<p><img src=https://cdn4.iconfinder.com/data/icons/star-wars-9/100/R2-D2-512.png width=90px height=90px> ';
        if ($a == 0 && $b == 0) {
            echo '<span class="alert alert-info">';
            echo $msg . '. ';
            echo  'Lets discover Planet 5-squared together. I am super chaaaarrrrggggeeeeeed!!!';
        } else if ($a > 5 || $b > 5) {
            echo '<span class="alert alert-danger">';
            echo '<font style=text: bold;>Stop! Are you trying to kill me?? Please get me back on the map.</fond>';
        } else if ($a < 0 || $b < 0) {
            echo '<span class="alert alert-danger">';
            echo 'Stop! Are you trying to kill me?? Please get me back on the map.';
            
        } else if ($msg != '') {
            echo '<span class="alert alert-info">';
            echo $msg;
        } else {
            echo '<span class="alert alert-success">';
            echo 'Yes! Now lets discover this cool planet together. ';
        }
        echo '</span>';
        echo '</p>';

    ?>
</div>
<div class="row col-md-12 centered">

    <div class="col-md-6">
        <table cellspacing="0px" cellpadding="0px" border="1px">

            <?php

                for($row=5;$row>=1;$row--) {

                    echo "<tr>";

                    for($col=1;$col<=5;$col++) {

                        $total=$row+$col;

                        if ($row == $a && $col == $b) {
                            $bg_color = 'orange';
                            $robotImg = '<img src=https://cdn4.iconfinder.com/data/icons/star-wars-9/100/R2-D2-512.png width=90px height=90px>';
                            $place = '(' . $row . ',' . $col . ',' . $c . ')';
                        } else {
                            $bg_color = '#FFFFFF';
                            $robotImg = '';
                            $place = '(' . $row . ',' . $col . ')';
                        }

                        if($total%2==0) {

                            echo "<td id=grid height=100px width=100px bgcolor=$bg_color>$place $robotImg</td>";

                        } else {

                            echo "<td height=100px width=100px bgcolor=$bg_color>$place $robotImg</td>";

                        }
                    }
                    
                    echo "</tr>";
                }
            ?>

        </table>
    </div>
    <div class="col-md-6">
    
        <div class="col-md-4">
            <form action="place" method="post">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>X</label>
                        <input type="number" class="" name="xAxis" placeholder="0" value="<?php echo $a; ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Y</label>
                        <input type="number" class="" name="yAxis" placeholder="0" value="<?php echo $b; ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>F</label>
                        <!-- <input type="text" class="" name="fAxis" placeholder="North" value="<?php $c; ?>" required/> -->
                        <select name="fAxis">
                            <option value="0" disabled>--- Direction ---</option>
                            <option value="North" <?php $c == 'North' ? 'selected' : ''; ?>>North</option>
                            <option value="South" <?php $c == 'South' ? 'selected' : ''; ?>>South</option>
                            <option value="East" <?php $c == 'East' ? 'selected' : ''; ?>>East</option>
                            <option value="West" <?php $c == 'West' ? 'selected' : ''; ?>>West</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Place</button>
                    </div>
                </div>
            </form>

            <form action="report" method="post"> 
                <input type="hidden" name="xAxis" value="<?php echo $a; ?>">
                <input type="hidden" name="yAxis" value="<?php echo $b; ?>">
                <input type="hidden" name="fAxis" value="<?php echo $c; ?>">
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Report</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Command Upload</label>
                <form action="upload" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="xAxis" value="<?php echo $a; ?>">
                    <input type="hidden" name="yAxis" value="<?php echo $b; ?>">
                    <input type="hidden" name="fAxis" value="<?php echo $c; ?>">
                    <div class="form-group">
                        <div>
                            <input type="file" name="cmdFile" class="btn-default" required />
                        </div>
                        <div style="padding-top: 5px;">
                            <input type="submit" class="btn btn-info" value="Upload" />
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<div class="row col-md-8" >

    <form action="move" method="post">
        <input type="hidden" name="xAxis" value="<?php echo $a; ?>">
        <input type="hidden" name="yAxis" value="<?php echo $b; ?>">
        <input type="hidden" name="fAxis" value="<?php echo $c; ?>">
        <div class="col-md-2">
            <button type="submit" class="btn btn-info">Move</button>
        </div>
    </form>

    <form action="left" method="post">
        <input type="hidden" name="xAxis" value="<?php echo $a; ?>">
        <input type="hidden" name="yAxis" value="<?php echo $b; ?>">
        <input type="hidden" name="fAxis" value="<?php echo $c; ?>">
        <div class="col-md-2">
            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left"></span>Left</button>
        </div>
    </form>

    <form action="right" method="post">
        <input type="hidden" name="xAxis" value="<?php echo $a; ?>">
        <input type="hidden" name="yAxis" value="<?php echo $b; ?>">
        <input type="hidden" name="fAxis" value="<?php echo $c; ?>">
        <div class="col-md-2">
            <button type="submit" class="btn btn-warning">Right<span class="glyphicon glyphicon-arrow-right"></span></button>
        </div>
    </form>

</div>
<div class="col-md-2">
    <span></span>
</div>

<!-- Note: Originally used this to report via alert popup. Using mvc now. -->
<script type="text/javascript">
    var x = '<?php echo $a ?>';
    var y = '<?php echo $b ?>';
    var f = '<?php echo $c ?>';
    var place = '(' + x + ',' + y + ',' + f + ')';
    function report() {
        if ((x < 0 || x > 5) || (y < 0 || y > 5)) {
            alert ('Hey dude! Give me valid coordinates to explore!');
        } else {
            alert ('Hey dude! I am now at ' + place);
        }
    }
</script>