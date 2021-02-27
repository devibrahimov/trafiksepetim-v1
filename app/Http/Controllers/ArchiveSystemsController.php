<?php
/**
 * @CompanyURI: https://lesso.com.tr
 * @Description: Developed by EMRE AKINCI A.Ş. Software team.
 * @Version: 1.0.0
 * @Date :    20.02.2021
 */


namespace App\Http\Controllers;


class ArchiveSystemsController extends Controller
{

    public function sitemapxml(){
        if (file_exists(public_path().'sitemap.xml')){

        }else{
           mkdir(public_path().'sitemap.xml',0777);
        }
    }
}
