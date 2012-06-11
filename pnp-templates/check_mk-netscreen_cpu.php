<?php

# Template:	check_mk-netscreen_cpu.php
# Author:	vaclav.ovsik@gmail.com

# Data:
# 1 - a - 1min
# 2 - b - 5min
# 3 - c - 15min


$ds_name[1] = "Netscreen CPU Utilization";
$opt[1] = "--vertical-label 'Percent' --title \"$hostname / $servicedesc\" ";


$def[1] = rrd::def("a", $RRDFILE[1], $DS[1], "AVERAGE");
$def[1] .= rrd::line1("a", "#FF66FF", "1 min");
$def[1] .= rrd::gprint("a", array("LAST", "MAX", "AVERAGE"), "%6.0lf %%");

$def[1] .= rrd::def("b", $RRDFILE[1], $DS[2], "AVERAGE");
$def[1] .= rrd::line1("b", "#9999FF", "5 min");
$def[1] .= rrd::gprint("b", array("LAST", "MAX", "AVERAGE"), "%6.0lf %%");

$def[1] .= rrd::def("c", $RRDFILE[1], $DS[3], "AVERAGE");
$def[1] .= rrd::line1("c", "#0066FF", "15 min");
$def[1] .= rrd::gprint("c", array("LAST", "MAX", "AVERAGE"), "%6.0lf %%");

?>
