<?php

# Template:	check_mk-netscreen_temp.php
# Author:	vaclav.ovsik@gmail.com

# DS
#   1 temp

$_WARNRULE = '#FFFF00';
$_CRITRULE = '#FF0000';

$ds_name[1] = "Temperature";
$opt[1] = "--vertical-label '°C' --title \"$hostname / $servicedesc\" ";
$def[1] = rrd::def("temp", $RRDFILE[1], $DS[1], "AVERAGE");
$def[1] .= rrd::line1("temp", "#050", "temperature");
$def[1] .= rrd::gprint("temp", array("LAST", "MAX", "AVERAGE"), "%3.1lf°C");

if ( $WARN[1] != "" )
	$def[1] .= "HRULE:$WARN[1]$_WARNRULE ";
if ( $CRIT[1] != "" )
	$def[1] .= "HRULE:$CRIT[1]$_CRITRULE ";

?>
