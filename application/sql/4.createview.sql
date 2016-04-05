-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: smartorder
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary view structure for view `category_language_view`
--

DROP TABLE IF EXISTS `category_language_view`;
/*!50001 DROP VIEW IF EXISTS `category_language_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `category_language_view` AS SELECT
 1 AS `category_language_id`,
 1 AS `category_id`,
 1 AS `category_name`,
 1 AS `category_description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `area_language_view`
--

DROP TABLE IF EXISTS `area_language_view`;
/*!50001 DROP VIEW IF EXISTS `area_language_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `area_language_view` AS SELECT
 1 AS `area_language_id`,
 1 AS `area_id`,
 1 AS `area_name`,
 1 AS `area_description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `menu_language_view`
--

DROP TABLE IF EXISTS `menu_language_view`;
/*!50001 DROP VIEW IF EXISTS `menu_language_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `menu_language_view` AS SELECT
 1 AS `menu_id`,
 1 AS `menu_name`,
 1 AS `menu_description`,
 1 AS `language_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `menu_master_view`
--

DROP TABLE IF EXISTS `menu_master_view`;
/*!50001 DROP VIEW IF EXISTS `menu_master_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `menu_master_view` AS SELECT
 1 AS `menu_id`,
 1 AS `category_id`,
 1 AS `price`,
 1 AS `use_yn`,
 1 AS `date_created`,
 1 AS `menu_name`,
 1 AS `menu_description`,
 1 AS `category_name`,
 1 AS `category_description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `option_list_view`
--

DROP TABLE IF EXISTS `option_list_view`;
/*!50001 DROP VIEW IF EXISTS `option_list_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `option_list_view` AS SELECT
 1 AS `option_language_id`,
 1 AS `option_id`,
 1 AS `option_name`,
 1 AS `option_description`,
 1 AS `use_yn`,
 1 AS `date_created`,
 1 AS `option_value`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `order_session_view`
--

DROP TABLE IF EXISTS `order_session_view`;
/*!50001 DROP VIEW IF EXISTS `order_session_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `order_session_view` AS SELECT
 1 AS `id`,
 1 AS `session_id`,
 1 AS `menu_id`,
 1 AS `area_id`,
 1 AS `quantity`,
 1 AS `update_date_time`,
 1 AS `order_status`,
 1 AS `created_from_ip`,
 1 AS `updated_from_ip`,
 1 AS `date_created`,
 1 AS `date_updated`,
 1 AS `menu_name`,
 1 AS `category_id`,
 1 AS `category_name`,
 1 AS `area_name`,
 1 AS `menu_language_id`,
 1 AS `category_language_id`,
 1 AS `area_language_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `category_list_view`
--

DROP TABLE IF EXISTS `category_list_view`;
/*!50001 DROP VIEW IF EXISTS `category_list_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `category_list_view` AS SELECT
 1 AS `category_language_id`,
 1 AS `category_id`,
 1 AS `category_name`,
 1 AS `category_description`,
 1 AS `use_yn`,
 1 AS `date_created`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `option_language_view`
--

DROP TABLE IF EXISTS `option_language_view`;
/*!50001 DROP VIEW IF EXISTS `option_language_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `option_language_view` AS SELECT
 1 AS `option_language_id`,
 1 AS `option_id`,
 1 AS `option_name`,
 1 AS `option_description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `area_session_view`
--

DROP TABLE IF EXISTS `area_session_view`;
/*!50001 DROP VIEW IF EXISTS `area_session_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `area_session_view` AS SELECT
 1 AS `session_id`,
 1 AS `area_id`,
 1 AS `area_count`,
 1 AS `area_start_date`,
 1 AS `area_end_date`,
 1 AS `total_amount`,
 1 AS `order_close`,
 1 AS `area_close`,
 1 AS `created_from_ip`,
 1 AS `updated_from_ip`,
 1 AS `date_created`,
 1 AS `date_updated`,
 1 AS `area_name`,
 1 AS `area_description`,
 1 AS `use_yn`,
 1 AS `area_language_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `menu_list_view`
--

DROP TABLE IF EXISTS `menu_list_view`;
/*!50001 DROP VIEW IF EXISTS `menu_list_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `menu_list_view` AS SELECT
 1 AS `menu_id`,
 1 AS `price`,
 1 AS `category_id`,
 1 AS `use_yn`,
 1 AS `date_created`,
 1 AS `category_name`,
 1 AS `category_description`,
 1 AS `category_language_id`,
 1 AS `menu_name`,
 1 AS `menu_description`,
 1 AS `menu_language_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `area_list_view`
--

DROP TABLE IF EXISTS `area_list_view`;
/*!50001 DROP VIEW IF EXISTS `area_list_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `area_list_view` AS SELECT
 1 AS `area_language_id`,
 1 AS `area_id`,
 1 AS `area_name`,
 1 AS `area_description`,
 1 AS `use_yn`,
 1 AS `date_created`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `category_language_view`
--

/*!50001 DROP VIEW IF EXISTS `category_language_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `category_language_view` AS select `l`.`language_id` AS `category_language_id`,`m`.`category_id` AS `category_id`,`m`.`category_name` AS `category_name`,`m`.`category_description` AS `category_description` from (`category_language` `m` left join `language_master` `l` on((`m`.`language_id` = `l`.`language_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `area_language_view`
--

/*!50001 DROP VIEW IF EXISTS `area_language_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `area_language_view` AS select `l`.`language_id` AS `area_language_id`,`a`.`area_id` AS `area_id`,`a`.`area_name` AS `area_name`,`a`.`area_description` AS `area_description` from (`area_language` `a` left join `language_master` `l` on((`a`.`language_id` = `l`.`language_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `menu_language_view`
--

/*!50001 DROP VIEW IF EXISTS `menu_language_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `menu_language_view` AS select `m`.`menu_id` AS `menu_id`,`m`.`menu_name` AS `menu_name`,`m`.`menu_description` AS `menu_description`,`l`.`language_id` AS `language_id` from (`menu_language` `m` left join `language_master` `l` on((`m`.`language_id` = `l`.`language_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `menu_master_view`
--

/*!50001 DROP VIEW IF EXISTS `menu_master_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `menu_master_view` AS select `m`.`menu_id` AS `menu_id`,`m`.`category_id` AS `category_id`,`m`.`price` AS `price`,`m`.`use_yn` AS `use_yn`,`m`.`date_created` AS `date_created`,`l`.`menu_name` AS `menu_name`,`l`.`menu_description` AS `menu_description`,`c`.`category_name` AS `category_name`,`c`.`category_description` AS `category_description` from ((`menu_master` `m` join `menu_language_view` `l`) join `category_language_view` `c`) where ((`m`.`category_id` = `c`.`category_id`) and (`m`.`menu_id` = `l`.`menu_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `option_list_view`
--

/*!50001 DROP VIEW IF EXISTS `option_list_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `option_list_view` AS select `a`.`option_language_id` AS `option_language_id`,`a`.`option_id` AS `option_id`,`a`.`option_name` AS `option_name`,`a`.`option_description` AS `option_description`,`m`.`use_yn` AS `use_yn`,`m`.`date_created` AS `date_created`,`m`.`option_value` AS `option_value` from (`option_language_view` `a` left join `option_master` `m` on((`m`.`option_id` = `a`.`option_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `order_session_view`
--

/*!50001 DROP VIEW IF EXISTS `order_session_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `order_session_view` AS select `o`.`id` AS `id`,`o`.`session_id` AS `session_id`,`o`.`menu_id` AS `menu_id`,`o`.`area_id` AS `area_id`,`o`.`quantity` AS `quantity`,`o`.`update_date_time` AS `update_date_time`,`o`.`order_status` AS `order_status`,`o`.`created_from_ip` AS `created_from_ip`,`o`.`updated_from_ip` AS `updated_from_ip`,`o`.`date_created` AS `date_created`,`o`.`date_updated` AS `date_updated`,`m`.`menu_name` AS `menu_name`,`m`.`category_id` AS `category_id`,`m`.`category_name` AS `category_name`,`a`.`area_name` AS `area_name`,`m`.`menu_language_id` AS `menu_language_id`,`m`.`category_language_id` AS `category_language_id`,`a`.`area_language_id` AS `area_language_id` from ((`order_session` `o` join `menu_list_view` `m`) join `area_list_view` `a`) where ((`o`.`menu_id` = `m`.`menu_id`) and (`a`.`area_id` = `o`.`area_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `category_list_view`
--

/*!50001 DROP VIEW IF EXISTS `category_list_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `category_list_view` AS select `l`.`category_language_id` AS `category_language_id`,`l`.`category_id` AS `category_id`,`l`.`category_name` AS `category_name`,`l`.`category_description` AS `category_description`,`m`.`use_yn` AS `use_yn`,`m`.`date_created` AS `date_created` from (`category_language_view` `l` left join `category_master` `m` on((`m`.`category_id` = `l`.`category_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `option_language_view`
--

/*!50001 DROP VIEW IF EXISTS `option_language_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `option_language_view` AS select `l`.`language_id` AS `option_language_id`,`a`.`option_id` AS `option_id`,`a`.`option_name` AS `option_name`,`a`.`option_description` AS `option_description` from (`option_language` `a` left join `language_master` `l` on((`a`.`language_id` = `l`.`language_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `area_session_view`
--

/*!50001 DROP VIEW IF EXISTS `area_session_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `area_session_view` AS select `a`.`session_id` AS `session_id`,`a`.`area_id` AS `area_id`,`a`.`area_count` AS `area_count`,`a`.`area_start_date` AS `area_start_date`,`a`.`area_end_date` AS `area_end_date`,`a`.`total_amount` AS `total_amount`,`a`.`order_close` AS `order_close`,`a`.`area_close` AS `area_close`,`a`.`created_from_ip` AS `created_from_ip`,`a`.`updated_from_ip` AS `updated_from_ip`,`a`.`date_created` AS `date_created`,`a`.`date_updated` AS `date_updated`,`al`.`area_name` AS `area_name`,`al`.`area_description` AS `area_description`,`al`.`use_yn` AS `use_yn`,`al`.`area_language_id` AS `area_language_id` from (`area_session` `a` left join `area_list_view` `al` on((`a`.`area_id` = `al`.`area_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `menu_list_view`
--

/*!50001 DROP VIEW IF EXISTS `menu_list_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `menu_list_view` AS select `menu_master`.`menu_id` AS `menu_id`,`menu_master`.`price` AS `price`,`menu_master`.`category_id` AS `category_id`,`menu_master`.`use_yn` AS `use_yn`,`menu_master`.`date_created` AS `date_created`,`category_language_view`.`category_name` AS `category_name`,`category_language_view`.`category_description` AS `category_description`,`category_language_view`.`category_language_id` AS `category_language_id`,`menu_language_view`.`menu_name` AS `menu_name`,`menu_language_view`.`menu_description` AS `menu_description`,`menu_language_view`.`language_id` AS `menu_language_id` from ((`menu_master` left join `category_language_view` on((`category_language_view`.`category_id` = `menu_master`.`category_id`))) left join `menu_language_view` on((`menu_language_view`.`menu_id` = `menu_master`.`menu_id`))) where (`menu_master`.`category_id` = `category_language_view`.`category_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `area_list_view`
--

/*!50001 DROP VIEW IF EXISTS `area_list_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `area_list_view` AS select `a`.`area_language_id` AS `area_language_id`,`a`.`area_id` AS `area_id`,`a`.`area_name` AS `area_name`,`a`.`area_description` AS `area_description`,`m`.`use_yn` AS `use_yn`,`m`.`date_created` AS `date_created` from (`area_language_view` `a` left join `area_master` `m` on((`m`.`area_id` = `a`.`area_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-05 12:15:50
