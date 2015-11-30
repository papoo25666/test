<?php
$sprintId = $_GET['id'];
if (empty($sprintId) == false) {
    include_once "../configs/config.php";
    include_once "../classes/ManageSprint.php";
    include_once "../classes/ManageTasks.php";
    include_once "../classes/ManageSummary.php";

    $conn = new ManageSprint();

    $item = array();

    $result = $conn->getSprintInfoWithTeam($sprintId);
    $taskConn = new ManageTasks();
    $summaryConn = new ManageSummary();

    $resultSumTask = $taskConn->getCountTaskBySprintId($sprintId);
    $resultSummary = $summaryConn->getSumEstimate($sprintId);

    foreach ($resultSummary as $total) {
        $max = $total['EstimateSum'];
    }

    if (count($result) != 0) {
        foreach ($result as $row) {

            $item['sbl_name'] = $row['sbl_name'];
            $item['sbl_started'] = $row['sbl_started'];
            $item['sbl_end'] = $row['sbl_end'];
            $item['team'] = $row['team_name'];

            $counts = $conn->getCountBySprintId($sprintId);
            $item['counts'] = $counts;
            $item['total'] = $max;

        }
    } else {
        $result = $conn->getSprintById($sprintId);

        foreach ($result as $row) {

            $item['sbl_name'] = $row['sbl_name'];
            $item['sbl_started'] = $row['sbl_started'];
            $item['sbl_end'] = $row['sbl_end'];

            $counts = $conn->getCountBySprintId($sprintId);
            $item['counts'] = $counts;
            $item['total'] = $max;

        }
    }
    echo json_encode($item);
}
?>