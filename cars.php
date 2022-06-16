<?php
$json = file_get_contents('<redacted>/Vehicles/ActiveVehiclesflat');
$data = json_decode($json, true);
$output = '{"type": "FeatureCollection","features": [';
$copy = $data;
foreach($data as $item) { 
    $output .= '{"type": "Feature", "geometry": {"type": "Point","coordinates": [' . $item['longitude'] . ',' . $item['latitude'] . ']},';
    $output .= '"properties": {';
    $output .= '"displayName": "' . $item['displayName'] . '",';
    $output .= '"imageUrl": "' . $item['imageUrl'] . '",';
    $output .= '"availableInFormulaBattFun": "' . $item['availableInFormulaBattFun'] . '",';
    $output .= '"availableInFormulaBattFan": "' . $item['availableInFormulaBattFan'] . '",';
    $output .= '"availableInFormulaBattFanPlus": "' . $item['availableInFormulaBattFanPlus'] . '",';
    $output .= '"availability": "' . $item['availability'] . '",';
    $output .= '"stationType": "' . $item['stationType'] . '",';
    $output .= '"brand": "' . $item['brand'] . '",';
    $output .= '"model": "' . $item['model'] . '",';
    $output .= '"fuelType": "' . $item['fuelType'] . '",';
    $output .= '"transmissionType": "' . $item['transmissionType'] . '",';
    $output .= '"baseAddress": "' . $item['baseAddress'] . '"';
    $output .= '}}';
    if (next($copy)) {
        $output .= ',';
    }
}
$output .= ']}';
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
echo $output;
?>
