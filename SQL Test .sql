SELECT
    pm_alert.`TesterID`,
    pm_alert.`Status`,
    testerInfo.`IP`,
    testerInfo.`model`,
    testerInfo.`MC_Asset_No`,
    testerInfo.`MC_Type`
FROM
    (
SELECT
    *
FROM
    `pm_alert`
) pm_alert
LEFT JOIN(
SELECT
    *
FROM
    man_tester_view
) testerInfo
ON
    pm_alert.`TesterID` = testerInfo.`TesterID`
	

SET @dayReport2 = DATE_FORMAT(NOW()+ INTERVAL 2 DAY, '%Y-%m-%d');

INSERT INTO `pm_alert`(`TesterID`, `pm_date_plan`, `Product`, `period`, `Alert_time`,`Status`) SELECT `TesterID`,@dayReport2,`Product`,`period`,NOW(),1 From 
(
SELECT
    tester_config.`TesterID`,tester_config.`period`,man_tester_view.`IP`,man_tester_view.`model`as `Product`
FROM
    (SELECT *,
	(CASE WHEN (`period_1_month` = 0 AND `period_6_month`=0 AND `period_1_year`=1) THEN "1Year"
	WHEN (`period_1_month` = 0 AND `period_6_month`=1 AND `period_1_year`=0) THEN "6Month"
	WHEN (`period_1_month` = 0 AND `period_6_month`=1 AND `period_1_year`=1) THEN "6Month,1Year"
	WHEN (`period_1_month` = 1 AND `period_6_month`=0 AND `period_1_year`=0) THEN "1Month"
	WHEN (`period_1_month` = 1 AND `period_6_month`=0 AND `period_1_year`=1) THEN "1Month,1Year"
	WHEN (`period_1_month` = 1 AND `period_6_month`=1 AND `period_1_year`=0) THEN "1Month,6Month"
	WHEN (`period_1_month` = 1 AND `period_6_month`=1 AND `period_1_year`=1) THEN "1Month,6Month,1Year"
	END
 )AS 'period' FROM `tester_config`
WHERE
    (`period_1_month` = 1 AND `next_pm_1_month` = @dayReport2) OR 
	(`period_6_month` = 1 AND `next_pm_6_month` = @dayReport2) OR 
	(`period_1_year` = 1 AND `next_pm_1_year` = @dayReport2))tester_config
LEFT JOIN
	(SELECT * FROM `man_tester_view`)man_tester_view
ON `tester_config`.`TesterID` = `man_tester_view`.`TesterID`
)e
ON DUPLICATE KEY UPDATE 
  `pm_date_plan`=VALUES(`pm_date_plan`),`Product`=VALUES(`Product`),`period`=VALUES(`period`),`Alert_time`=VALUES(`Alert_time`);
 