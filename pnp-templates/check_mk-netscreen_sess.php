<?php

# Template:	check_mk-netscreen_sess.php
# Author:	vaclav.ovsik@gmail.com

# Data:
# 1 - a - sessions
# 2 - b - session_fail_rate

$_WARNRULE = '#FFFF00';
$_CRITRULE = '#FF0000';

$ds_name[1] = "Netscreen sessions";
$opt[1] = "--vertical-label 'sessions' --title \"$hostname / $servicedesc\" ";

$def[1] = rrd::def("a", $RRDFILE[1], $DS[1], "AVERAGE");
$def[1] .= rrd::line1("a", "#FF66FF", "sessions");
$def[1] .= rrd::gprint("a", array("LAST", "MAX", "AVERAGE"), "%6.0lf");
if ( $WARN[1] != "" )
    $def[1] .= rrd::hrule($WARN[1], $_WARNRULE, sprintf("warning   %6.0lf\\n", $WARN[1]));
if ( $CRIT[1] != "" )
    $def[1] .= rrd::hrule($CRIT[1], $_CRITRULE, sprintf("critical  %6.0lf\\n", $CRIT[1]));

$ds_name[2] = "Netscreen session fail rate";
$opt[2] = "--vertical-label 's. fail rate' --title \"$hostname / $servicedesc\" ";

$def[2] = rrd::def("b", $RRDFILE[2], $DS[2], "AVERAGE");
$def[2] .= rrd::line1("b", "#FF0000", "session fail rate");
$def[2] .= rrd::gprint("b", array("LAST", "MAX", "AVERAGE"), "%6.0lf");

?>
