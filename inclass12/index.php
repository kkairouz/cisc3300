<?php
$request_uri = $_SERVER['REQUEST_URI'];

if ($request_uri == '/html') {
    echo '
    <div>
      <b>content from backend</b>
    </div>
    ';
}
if($request_uri == '/json')
{
  $data = [
    [
        'date' => 'Feb25'
    ],
    [
        'year' => '2025'
    ]
];

echo json_encode($data);
exit();
}
?>
