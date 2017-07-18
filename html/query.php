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
<?php
/**
 * Short description for query.php
 *
 * @package query
 * @version 0.1
 * @license MIT
 */
$html ='';
$IP = $_POST['IP'];
echo "IP = $IP<p></p>";
if (!empty($IP)) {
    $dbh = new SQLite3('../db/myscan.db') or die('cannot open the DB');
    echo "connected<p></p>";
    $queryPorts = $dbh->query("SELECT * from ports where ip='$IP'");

    echo "query built<p></p>";
    while(($row = $queryPorts->fetchArray())){
        $html .="<tr><td>" . $row['ip'] . "</td><td>" . $row['port'] . "</td><td>" . $row['name'] . "</td><td>" . $row['state'] . "</td><td>" . $row['service'] . "</td><td>" . $row['info'] . "</td> </tr>";
    }
    echo $html;
}
?>
    </tbody>
</table>
