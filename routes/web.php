<?php

use Illuminate\Support\Facades\Route;
use GravityLegal\GravityLegalAPI\Facades\GravityLegal;
use SebastianBergmann\CodeCoverage\Driver\Xdebug3Driver;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $PRAHARI_BASE_URL='https://api.sandbox.gravity-legal.com/prahari/v1';
    $ENV_URL='https://api.sandbox.gravity-legal.com/pd/v1';
    $SYSTEM_TOKEN='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzaWQiOiJzYW5kYm94Iiwic3RpZCI6ImYzMDAyNmFmLTMxMjAtNDdmYy05MmRmLWFlNmMyZmEwMThiNSIsInRva2VuX3VzZSI6InN5c3RlbV90b2siLCJybmQiOjQ2NjQyNTEzMjEsImlhdCI6MTYwODY2NjI1MH0.-gtUMBkeIhdLilUJWiCgHWfROgCtWEcx_1gLlNWmVmo';
    $APP_ID='soluno';
    $ORG_ID='781ac60e-cff5-4971-8053-cddf5eec696f';
    $API_KEY = array ('PRAHARI_BASE_URL' => $PRAHARI_BASE_URL, 
                            'ENV_URL' => $ENV_URL, 
                            'SYSTEM_TOKEN' => $SYSTEM_TOKEN, 
                            'APP_ID' => $APP_ID, 
                            'ORG_ID' => $ORG_ID );
    $gService = GravityLegal::setApiKeyVariables($API_KEY);
return view('welcome', [
        'customer' => json_encode($gService->FindCustomer("Manoj's Firm"), JSON_PRETTY_PRINT),
        'matter' => json_encode($gService->GetMatter("23c47c88-a287-4962-bf92-6ff30798377c"), JSON_PRETTY_PRINT),
    ]);
});
