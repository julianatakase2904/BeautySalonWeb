<?php
//require files
require_once('inc\config.inc.php');
require_once('Utility\Page.class.php');
require_once('Entity\Service.class.php');
require_once('Utility\ServiceDAO.class.php');
require_once('Utility\RestClient.class.php');
require_once('Utility\PDOService.class.php');

//initialize ServiceDAO
ServiceDAO::initialize();
//display header and nav bar
Page::navBar();
//get Services
$jServices = RestClient::call("GET_SERVICE");
//store the service objs
$services = array();
//Iteract through services and convert them Service obj
foreach($jServices as $jService) {
    $service = new Service();
    $service->setServiceID($jService->serviceID);
    $service->setServiceName($jService->serviceName);
    $service->setServicePrice($jService->servicePrice);
    $service->setDescription($jService->description);

    $services[] = $service;
}
Page::service($services);
Page::footer();
?>