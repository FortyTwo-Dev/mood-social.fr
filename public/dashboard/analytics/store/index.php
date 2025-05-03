<?php
    session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];

    include_once($root . '/private/Actions/Cookie/Cookie.php');
    include_once($root . '/private/Actions/Routing/Route.php');
    include_once($root . '/private/Actions/Database/Query/Log.php');

    $logs = GetAllLogs("ip, script_name, http_referer, request_uri, request_method");
	$all_status = GetStatusOccurrences();

    $total = 0;
    foreach ($all_status as $status) {
        $total += $status->occurrences;
    }

    $cx = 150;
    $cy = 150;
    $r = 100;

    $colors = [ 200 => "#63D471", 404 => "#E71D36" ];

    $svg = '<svg width="300" height="300" xmlns="http://www.w3.org/2000/svg">';
    $angle_start = 0;
    foreach ($all_status as $status) {
        $angle = ($status->occurrences / $total) * 360;
        $angle_end = $angle_start + $angle;

        $x1 = $cx + $r * cos(deg2rad($angle_start));
        $y1 = $cy + $r * sin(deg2rad($angle_start));

        $x2 = $cx + $r * cos(deg2rad($angle_end));
        $y2 = $cy + $r * sin(deg2rad($angle_end));

        $large_arc = ($angle > 180) ? 1 : 0;

        $svg .= '<path d="M'.$cx.','.$cy.' L'.$x1.','.$y1.' A'.$r.','.$r.' 0 '.$large_arc.',1 '.$x2.','.$y2.' Z" fill="'.$colors[$status->status].'" />';
        
        $angle_start = $angle_end;
    }
    $svg .= '</svg>';
    header("Content-Type: image/svg+xml");
    echo $svg;
?>