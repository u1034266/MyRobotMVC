<?php

// My RobotController
class RobotController extends DefaultController
{
    function index()
    {
        // Default Grid Data
        $data = [
            'x' => 0,
            'y' => 0,
            'z' => 'North'
        ];
        $this->set($data);

        // Render Index
        if ($int = 1) {
            $this->render("index");
        }
    }

    function place(int $int)
    {
        // Default Grid Data
        $data = [
            'x' => $_REQUEST['xAxis'],
            'y' => $_REQUEST['yAxis'],
            'z' => $_REQUEST['fAxis'],
            'msg' => ''
        ];

        // Render Index
        if ($int == 1) {
            $this->set($data);
            $this->render("index");
        } else if ($int == 2) {
            return $data;
        }
    }

    function move(int $int)
    {
        $error = '';
        
        $x = trim($_REQUEST['xAxis']);
        $y = trim($_REQUEST['yAxis']);
        $z = trim($_REQUEST['fAxis']);

        // if ($x == 0 && $y == 0){
        //     $error = 'Please place me on the map before moving me dude!';
        // }

        if ($z == 'North') {
            $x = $x + 1;
        } else if ($z == 'South') {
            $x = $x - 1;
        } else if ($z == 'East') {
            $y = $y + 1;
        } else if ($z == 'West') {
            $y = $y - 1;
        }

        // Grid Data
        $data = [
            'x' => $x,
            'y' => $y,
            'z' => $z,
            'msg' => $error
        ];

        // Render Index
        if ($int == 1) {
            $this->set($data);
            $this->render("index");
        } else if ($int == 2) {
            // Update $_REQUEST with new data
            $_REQUEST['xAxis'] = trim($data['x']);
            $_REQUEST['yAxis'] = trim($data['y']);
            $_REQUEST['fAxis'] = ucfirst(strtolower(trim($data['z'])));
            // echo "This is the data returned by move(2)\n";
            // print_r($data);
            return $data;
        }
    }

    function left(int $int)
    {
        $error = '';
        
        $x = $_REQUEST['xAxis'];
        $y = $_REQUEST['yAxis'];
        $z = $_REQUEST['fAxis'];

        // if ($x == 0 && $y == 0){
        //     $error = 'Please place me on the map before moving me dude!';
        // }

        if ($z == 'North') {
            $z = 'West';
        } else if ($z == 'South') {
            $z = 'East';
        } else if ($z == 'East') {
            $z = 'North';
        } else if ($z == 'West') {
            $z = 'South';
        }

        // Grid Data
        $data = [
            'x' => $x,
            'y' => $y,
            'z' => $z,
            'msg' => $error
        ];

        // Render Index
        if ($int == 1) {
            $this->set($data);
            $this->render("index");
        } else if ($int == 2) {
            // Update $_REQUEST with new data
            $_REQUEST['xAxis'] = trim($data['x']);
            $_REQUEST['yAxis'] = trim($data['y']);
            $_REQUEST['fAxis'] = ucfirst(strtolower(trim($data['z'])));
            // echo "Left data array is\n";
            // print_r($data);
            return $data;
        }
    }

    function right(int $int)
    {
        $error = '';
        
        $x = $_REQUEST['xAxis'];
        $y = $_REQUEST['yAxis'];
        $z = $_REQUEST['fAxis'];

        // if ($x == 0 && $y == 0){
        //     $error = 'Please place me on the map before moving me dude!';
        // }

        if ($z == 'North') {
            $z = 'East';
        } else if ($z == 'South') {
            $z = 'West';
        } else if ($z == 'East') {
            $z = 'South';
        } else if ($z == 'West') {
            $z = 'North';
        }

        // Grid Data
        $data = [
            'x' => $x,
            'y' => $y,
            'z' => $z,
            'msg' => $error
        ];

        // Render Index
        if ($int == 1) {
            $this->set($data);
            $this->render("index");
        } else if ($int == 2) {
            // Update $_REQUEST with new data
            $_REQUEST['xAxis'] = trim($data['x']);
            $_REQUEST['yAxis'] = trim($data['y']);
            $_REQUEST['fAxis'] = ucfirst(strtolower(trim($data['z'])));
            return $data;
        }
    }

    function report(int $int)
    {
        $error = '';

        // echo "Checking the report data\n";
        // print_r($_REQUEST);
        
        $x = $_REQUEST['xAxis'];
        $y = $_REQUEST['yAxis'];
        $z = $_REQUEST['fAxis'];

        if (($x < 0 || $x > 5) || ($y < 0 || $y > 5)) {
            $msg = 'Hey dude! Give me valid coordinates to explore!';
        } else {
            $msg = 'Hey dude! I am now at (' . $x . ',' . $y . ',' . $z . ')';
        }

        // Default Grid Data
        $data = [
            'x' => $x,
            'y' => $y,
            'z' => $z,
            'msg' => $msg
        ];

        // Render Index
        if ($int == 1) {
            $this->set($data);
            $this->render("index");
        } else if ($int == 2) {
            // Update $_REQUEST with new data
            $_REQUEST['xAxis'] = trim($data['x']);
            $_REQUEST['yAxis'] = trim($data['y']);
            $_REQUEST['fAxis'] = ucfirst(strtolower(trim($data['z'])));
            return $data;
        }
    }

    function upload()
    {
        // Check REQUEST vars
        // $x = $_REQUEST['xAxis'];
        // $y = $_REQUEST['yAxis'];
        // $z = $_REQUEST['fAxis'];

        // Default Grid Data
        $data = [];

        $fp = fopen($_FILES['cmdFile']['tmp_name'], 'r');
        
        // if ($fp) {
            while ( ($line = fgets($fp)) !== false) {

                $robot = new RobotController;

                // 'Check for 'MOVE', 'REPORT', 'LEFT' & 'RIGHT' commands
                if (str_word_count($line) == 1) {

                    $str = trim(strtolower($line));

                    // echo "Got here";die();

                    // Call the function
                    // Bad approach. But pressed for time so chose this metho
                    if ($str == 'move') {
                        $data = $robot->move(2);
                        // echo "Data from move(2) is\n";
                        // print_r($data);
                    }
                    if ($str == 'left') {
                        $data = $robot->left(2);
                    }
                    if ($str == 'right') {
                        $data = $robot->right(2);
                    }
                    if ($str == 'report') {
                        $data = $robot->report(2);
                        // echo "Data from report(2) is\n";
                        // print_r($data);
                    }

                // Note: 'PLACE' command should have a higher string count: ie. PLACE x,y,z
                } else {
                    // echo "Place new data\n";

                    // Note: More string validation required here incase unsanitised data gets passed in here.

                    // Explode string into array
                    $placeRobot = explode(' ', $line);
                    
                    // Get data
                    $dataString = explode(',', $placeRobot[1]);

                    // Update $_REQUEST with new data
                    $_REQUEST['xAxis'] = trim($dataString[0]);
                    $_REQUEST['yAxis'] = trim($dataString[1]);
                    $_REQUEST['fAxis'] = ucfirst(strtolower(trim($dataString[2])));

                    // Then call place()
                    $data = $robot->place(2);
                    // echo "data array returned from place(2)\n";
                    // print_r($data);

                    // Note: No need to call plac() here. We are just passing the set $data array to be manipulated.

                }

            }

            // echo "\n Got back to uploads...";
            // echo "\n End of Uploads data array is now...";
        
            // print_r($data);

            $this->set($data);

            // Render Index
            $this->render("index");
        // }

    }
}
?>