<?
for($i=0;$i<sizeof($results['result']);$i++){
	$results['result'][$i]['start'] = strtotime($results['result'][$i]['start']) * 1000;
	$results['result'][$i]['end'] = strtotime($results['result'][$i]['end']) * 1000;
}
echo json_encode($results);
?>