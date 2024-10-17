<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware("auth");
    // }
    
    

    public function index()
    {
        $baseUrl = "https://sso.egov.uz/sso/oauth/Authorization.do";
        $params = [
            'response_type' => 'one_code',
            'client_id' => 'grand_mininnovation_uz',
            'redirect_uri' => 'https://test-loyiha.ilmiy.uz/',
            'scope' => 'siginup',
            'state' => 'testState',
        ];
    
        $url = $baseUrl . '?' . http_build_query($params);
        return view('admin.home',['url'=>$url]);
    }
    public function endPoint(Request $request){
             return $request;
    }

}
