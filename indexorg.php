<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include ('setup.php');

//$tsql = "SELECT [CRASH_CRN]
//      ,[DISTRICT]
//      ,[CRASH_COUNTY]
//      ,[MUNICIPALITY]
//      ,[POLICE_AGCY]
//      ,[CRASH_YEAR]
//      ,[CRASH_MONTH]
//      ,[DAY_OF_WEEK]
//      ,[TIME_OF_DAY]
//      ,[HOUR_OF_DAY]
//      ,[ILLUMINATION]
//      ,[WEATHER]
//      ,[ROAD_CONDITION]
//      ,[COLLISION_TYPE]
//      ,[RELATION_TO_ROAD]
//      ,[INTERSECT_TYPE]
//      ,[TCD_TYPE]
//      ,[URBAN_RURAL]
//      ,[LOCATION_TYPE]
//      ,[SCH_BUS_IND]
//      ,[SCH_ZONE_IND]
//      ,[TOTAL_UNITS]
//      ,[PERSON_COUNT]
//      ,[VEHICLE_COUNT]
//      ,[AUTOMOBILE_COUNT]
//      ,[MOTORCYCLE_COUNT]
//      ,[BUS_COUNT]
//      ,[SMALL_TRUCK_COUNT]
//      ,[HEAVY_TRUCK_COUNT]
//      ,[SUV_COUNT]
//      ,[VAN_COUNT]
//      ,[BICYCLE_COUNT]
//      ,[FATAL_COUNT]
//      ,[INJURY_COUNT]
//      ,[MAJ_INJ_COUNT]
//      ,[MOD_INJ_COUNT]
//      ,[MIN_INJ_COUNT]
//      ,[UNK_INJ_DEG_COUNT]
//      ,[UNK_INJ_PER_COUNT]
//      ,[UNBELTED_OCC_COUNT]
//      ,[UNB_DEATH_COUNT]
//      ,[UNB_MAJ_INJ_COUNT]
//      ,[BELTED_DEATH_COUNT]
//      ,[BELTED_MAJ_INJ_COUNT]
//      ,[MCYCLE_DEATH_COUNT]
//      ,[MCYCLE_MAJ_INJ_COUNT]
//      ,[BICYCLE_DEATH_COUNT]
//      ,[BICYCLE_MAJ_INJ_COUNT]
//      ,[PED_COUNT]
//      ,[PED_DEATH_COUNT]
//      ,[PED_MAJ_INJ_COUNT]
//      ,[COMM_VEH_COUNT]
//      ,[MAX_SEVERITY_LEVEL]
//      ,[DRIVER_COUNT_16YR]
//      ,[DRIVER_COUNT_17YR]
//      ,[DRIVER_COUNT_18YR]
//      ,[DRIVER_COUNT_19YR]
//      ,[DRIVER_COUNT_20YR]
//      ,[DRIVER_COUNT_50_64YR]
//      ,[DRIVER_COUNT_65_74YR]
//      ,[DRIVER_COUNT_75PLUS]
//      ,[LATITUDE]
//      ,[LONGITUDE]
//      ,[DEC_LAT]
//      ,[DEC_LONG]
//      ,[ARRIVAL_TM]
//      ,[DISPATCH_TM]
//      ,[EST_HRS_CLOSED]
//      ,[LANE_CLOSED]
//      ,[LN_CLOSE_DIR]
//      ,[NTFY_HIWY_MAINT]
//      ,[RDWY_SURF_TYPE_CD]
//      ,[SPEC_JURIS_CD]
//      ,[TCD_FUNC_CD]
//      ,[TFC_DETOUR_IND]
//      ,[WORK_ZONE_IND]
//      ,[WORK_ZONE_TYPE]
//      ,[WORK_ZONE_LOC]
//      ,[CONS_ZONE_SPD_LIM]
//      ,[WORKERS_PRES]
//      ,[WZ_CLOSE_DETOUR]
//      ,[WZ_FLAGGER]
//      ,[WZ_LAW_OFFCR_IND]
//      ,[WZ_LN_CLOSURE]
//      ,[WZ_MOVING]
//      ,[WZ_OTHER]
//      ,[WZ_SHLDER_MDN]
//      ,[FLAG_CRN]
//      ,[INTERSTATE]
//      ,[STATE_ROAD]
//      ,[LOCAL_ROAD]
//      ,[LOCAL_ROAD_ONLY]
//      ,[TURNPIKE]
//      ,[WET_ROAD]
//      ,[SNOW_SLUSH_ROAD]
//      ,[ICY_ROAD]
//      ,[SUDDEN_DEER]
//      ,[SHLDR_RELATED]
//      ,[REAR_END]
//      ,[HO_OPPDIR_SDSWP]
//      ,[HIT_FIXED_OBJECT]
//      ,[SV_RUN_OFF_RD]
//      ,[WORK_ZONE]
//      ,[PROPERTY_DAMAGE_ONLY]
//      ,[FATAL_OR_MAJ_INJ]
//      ,[INJURY]
//      ,[FATAL]
//      ,[NON_INTERSECTION]
//      ,[INTERSECTION]
//      ,[SIGNALIZED_INT]
//      ,[STOP_CONTROLLED_INT]
//      ,[UNSIGNALIZED_INT]
//      ,[SCHOOL_BUS]
//      ,[SCHOOL_ZONE]
//      ,[HIT_DEER]
//      ,[HIT_TREE_SHRUB]
//      ,[HIT_EMBANKMENT]
//      ,[HIT_POLE]
//      ,[HIT_GDRAIL]
//      ,[HIT_GDRAIL_END]
//      ,[HIT_BARRIER]
//      ,[HIT_BRIDGE]
//      ,[OVERTURNED]
//      ,[MOTORCYCLE]
//      ,[BICYCLE]
//      ,[HVY_TRUCK_RELATED]
//      ,[VEHICLE_FAILURE]
//      ,[TRAIN_TROLLEY]
//      ,[PHANTOM_VEHICLE]
//      ,[ALCOHOL_RELATED]
//      ,[DRINKING_DRIVER]
//      ,[UNDERAGE_DRNK_DRV]
//      ,[UNLICENSED]
//      ,[CELL_PHONE]
//      ,[NO_CLEARANCE]
//      ,[RUNNING_RED_LT]
//      ,[TAILGATING]
//      ,[CROSS_MEDIAN]
//      ,[CURVE_DVR_ERROR]
//      ,[LIMIT_65MPH]
//      ,[SPEEDING]
//      ,[SPEEDING_RELATED]
//      ,[AGGRESSIVE_DRIVING]
//      ,[FATIGUE_ASLEEP]
//      ,[DRIVER_16YR]
//      ,[DRIVER_17YR]
//      ,[DRIVER_65_74YR]
//      ,[DRIVER_75PLUS]
//      ,[UNBELTED]
//      ,[PEDESTRIAN]
//      ,[DISTRACTED]
//      ,[CURVED_ROAD]
//      ,[DRIVER_18YR]
//      ,[DRIVER_19YR]
//      ,[DRIVER_20YR]
//      ,[DRIVER_50_64YR]
//      ,[VEHICLE_TOWED]
//      ,[FIRE_IN_VEHICLE]
//      ,[HIT_PARKED_VEHICLE]
//      ,[MC_DRINKING_DRIVER]
//      ,[DRUGGED_DRIVER]
//      ,[INJURY_OR_FATAL]
//      ,[COMM_VEHICLE]
//      ,[IMPAIRED_DRIVER]
//      ,[DEER_RELATED]
//      ,[DRUG_RELATED]
//      ,[HAZARDOUS_TRUCK]
//      ,[ILLEGAL_DRUG_RELATED]
//      ,[ILLUMINATION_DARK]
//      ,[MINOR_INJURY]
//      ,[MODERATE_INJURY]
//      ,[MAJOR_INJURY]
//      ,[NHTSA_AGG_DRIVING]
//      ,[PSP_REPORTED]
//      ,[RUNNING_STOP_SIGN]
//      ,[TRAIN]
//      ,[TROLLEY]
//      ,[ROADWAY_CRN]
//      ,[RDWY_SEQ_NUM]
//      ,[ADJ_RDWY_SEQ]
//      ,[ACCESS_CTRL]
//      ,[ROADWAY_COUNTY]
//      ,[LANE_COUNT]
//      ,[RDWY_ORIENT]
//      ,[ROAD_OWNER]
//      ,[ROUTE]
//      ,[SPEED_LIMIT]
//      ,[SEGMENT]
//      ,[OFFSET]
//      ,[STREET_NAME]
//  FROM [CrashData].[dbo].[CrashFlagRoadwayQuery]
//  where BICYCLE = 1;";
//        $SQL = "SELECT STREET_NAME,b.NAME,DEC_LAT,DEC_LONG
//    FROM ACCrashData as a ,MUNICIPALITY  as b
//    where BICYCLE = 1 and a.MUNICIPALITY = b.ID
//    order by STREET_NAME;";


        getCrashinformation();
        disconnectfromserver();

        function getCrashinformation() {





            //BeginCrashTable($rowcount);
            global $result;
            // global $result2;
            $rowcount = pg_num_rows($result);
            //$row = pg_fetch_row($result2);
            //$rowcount = $row[0];
            BeginCrashTable($rowcount);
            while ($row = pg_fetch_row($result)) {
                PopulateCrashTable($row);
            }
            //PopulateCrashTable($row);


            EndCrashTable();
        }

        function BeginCrashTable($rowCount) {
            /* Display the beginning of the search results table. */
            $headings = array("STREET_NAME", 
                "ROUTE", 
                "SEGMENT", 
                "OFFSET", 
                "MUNICIPALITY", 
                "CRASH_YEAR",
                "CRASH_MONTH",
                "TIME_OF_DAY",
                "DEC_LAT", 
                "DEC_LONG");
            echo "<table align='center' cellpadding='5' border=1>";
            echo "<tr><th>$rowCount Results</th></tr>";
            echo "<tr>";
            foreach ($headings as $heading) {
                echo "<th>$heading</th>";
            }
            echo "</tr>";
        }

        function PopulateCrashTable($values) {
            /* Populate table with results. */
            echo "<tr>";
            foreach ($values as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }

        function EndCrashTable() {
            echo "</table><br/>";
        }

        function FormatErrors($errors) {
            /* Display errors. */
            echo "Error information: <br/>";

            foreach ($errors as $error) {
                echo "SQLSTATE: " . $error['SQLSTATE'] . "<br/>";
                echo "Code: " . $error['code'] . "<br/>";
                echo "Message: " . $error['message'] . "<br/>";
            }
        }

        function disconnectfromserver() {

            echo "Disconnected from server " . "<br>";
            pg_close();
        }
        ?>
    </body>
</html>
