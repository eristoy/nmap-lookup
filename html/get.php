<style>
table, th, td {
    border: 1px solid black;
    text-align: center;
}
</style>
<table>
    <thead>
<tr>
    <th width="100">IP</th>
    <th width="100">Protocol</th>
    <th width="100">Name</th>
    <th width="100">State</th>
    <th width="100">Service</th>
    <th width="100">Info</th>
</tr>
    </thead>
    <tbody>
<br><h1>Port info</h1>
<?php
/**
 * Short description for query.php
 *
 * @package query
 * @version 0.1
 * @license MIT
 */
$html1 ='';
$html2 ='';
$IP = $_GET['IP'];
$IP_es = Sqlite3::escapeString($IP);
if (!empty($IP_es)) {
    $dbh = new SQLite3('../db/myscan.db') or die('cannot open the DB');
    $queryPorts = $dbh->query("SELECT * from ports where ip='$IP_es'");

    while(($row = $queryPorts->fetchArray())){
        $html1 .="<tr><td>" . $row['ip'] . "</td><td>" . $row['port'] . "</td><td>" . $row['name'] . "</td><td>" . $row['state'] . "</td><td>" . $row['service'] . "</td><td>" . $row['info'] . "</td> </tr>";
    }
    echo $html1;
}
?>
    </tbody>
</table>
<table>
    <thead>
<tr>
    <th width="100">ip</th>
    <th width="100">mac</th>
    <th width="100">hostname</th>
    <th width="100">protocol</th>
    <th width="100">os_name</th>
    <th width="100">os_family</th>
    <th width="100">os_accuracy</th>
    <th width="100">os_gen</th>
    <th width="100">last_update</th>
    <th width="100">state</th>
    <th width="100">mac_vendor</th>
    <th width="100">whois</th>
</tr>
    </head>
    <tbody>
<br><br><h1>Host Info</h1>
<?php
$queryHost = $dbh->query("SELECT * from hosts where ip='$IP_es'");
    while(($row2 = $queryHost->fetchArray())){
        $html2 .="<tr><td>" . $row2['ip'] . "</td><td>" . $row2['mac'] . "</td><td>" . $row2['hostname'] . "</td><td>" . $row2['protocol'] . "</td><td>" . $row2['os_name'] . "</td><td>" . $row2['os_family'] . "</td><td>" . $row['os_accuracy'] . "</td><td>" . $row2['os_gen'] . "</td><td>" . $row2['last_update'] . "</td><td>" . $row2['state'] . "</td><td>" . $row2['mac_vendor'] . "</td><td>" . $row2['whois'] . "</td></tr>";
    }
    echo $html2;
?>
