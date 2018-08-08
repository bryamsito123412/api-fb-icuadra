<?php
/**
 * Created by PhpStorm.
 * User: inversionesdtispa
 * Date: 08-08-18
 * Time: 10:59
 */

$challenge = $_REQUEST['hub_challenge'];
$verify_token = $_REQUEST['hub_verify_token'];

if ($verify_token === 'abc123')
        echo $challenge;