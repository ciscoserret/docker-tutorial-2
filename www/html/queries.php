<?php

function queries($connection) {
    $database = "ubersmith";
    $query      = $connection->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_TYPE='BASE TABLE'");
    $tables     = $query->fetchAll(PDO::FETCH_COLUMN);
    $table_array = array();
    if (empty($tables)) {
        echo "<p>There are no tables in database \"{$database}\".</p>";
    } else {
        echo "<p>Database \"{$database}\" has the following tables:</p>";
        foreach ($tables as $table) {
            $table_array[] = $table;
        }
    }
    foreach ($table_array as $table_name) {
        $sql = "SELECT count(*) FROM `".$table_name."`";
        $statement = $connection->prepare($sql); 
        $statement->execute(); 
        $count = $statement->fetch(PDO::FETCH_NUM); // Return array indexed by column number
        echo "<div>".$table_name." ".reset($count).' rows</div>';
    }

    $sql1 = "SELECT PACKAGES.packid, PACKAGES.clientid, PACKAGES.plan_id, vadmin_plan_map_plans.new_plan_id, ".
    "plans.code, vadmin_plans.vadmin_plan_id, vadmin_plans.title, vadmin_plans.category, ".
    "vadmin_plan_map_options.vadmin_spg_id, vadmin_plan_map_options.vadmin_spo_id ".
    "FROM ubersmith.PACKAGES ".
    "INNER JOIN ubersmith.vadmin_plan_map_plans ".
    "ON PACKAGES.plan_id = vadmin_plan_map_plans.plan_id ".
    "INNER JOIN ubersmith.plans ".
    "ON PACKAGES.plan_id = ubersmith.plans.plan_id ".
    "INNER JOIN ubersmith.vadmin_plans ".
    "ON PACKAGES.plan_id = vadmin_plans.plan_id ".

    "INNER JOIN ubersmith.vadmin_plan_map_options ".
    "ON vadmin_plan_map_options.vadmin_plan_id = vadmin_plans.vadmin_plan_id ".

    "LIMIT 50"; 

    $sql2 = "SELECT packid, clientid, plan_id FROM ubersmith.PACKAGES LIMIT 50";

    $rows = $connection->query($sql1)->fetchAll();
    $count = 0;
    echo "<table>";
    echo "<tr><th class=\"string\">packid</th><th class=\"string\">clientid</th><th class=\"string\">plan_id</th>".
    "<th class=\"string\">new_plan_id</th><th class=\"string\">code</th>".
    "<th class=\"string\">vadmin_plan_id</th>".
    "<th class=\"string\">title</th><th class=\"string\">category</th>".
    "<th class=\"string\">spg_id</th><th class=\"string\">spo_id</th><tr>";

    foreach($rows as $row) {
        echo ("<tr><td class=\"numeric\">".$row['packid']."</td>");
        echo ("    <td class=\"numeric\">".$row['clientid']."</td>");
        echo ("    <td class=\"numeric\">".$row['plan_id']."</td>");
        echo ("    <td class=\"numeric\">".$row['new_plan_id']."</td>");
        echo ("    <td class=\"numeric\">".$row['code']."</td>");
        echo ("    <td class=\"numeric\">".$row['vadmin_plan_id']."</td>");
        echo ("    <td class=\"numeric\">".$row['title']."</td>");
        echo ("    <td class=\"numeric\">".$row['category']."</td>");
        echo ("    <td class=\"numeric\">".$row['vadmin_spg_id']."</td>");
        echo ("    <td class=\"numeric\">".$row['vadmin_spo_id']."</td>");
        echo ("</tr>");
        $count++;
    }
    echo "</table>";
}
?>