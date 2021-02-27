<?php

namespace App\Http\Controllers;

use App\Model\CarModel;
use App\Model\SubSecondCategories;
use Illuminate\Http\Request;
use App\Model\Cars;
class TestController extends Controller
{
    public function index(){

        $cars ='Abarth;AC;Acura;Alfa Romeo;Alpina;Alpine;Apollo;Aria;Aro;Artega;Asia;Aspark;Aston Martin;Astro;Audi;Austin;Autobianchi;BAC;Baltijas Dzips;Baojun;Bee Bee;Beijing;Bentley;Bertone;Bitter;Blonell;BMW;Borgward;Brilliance;Bristol;Bufori;Bugatti;Buick;BYD;Cadillac;Callaway;Carbodies;Caterham;ChangAn;ChangFeng;Chery;Chevrolet;Chrysler;Citroen;Cizeta;Corbellati;Dacia;Dadi;Daewoo;DAF;Daihatsu;Daimler;Dallara;Dallas;David Brown;DC;De Lorean;De Tomaso;Derways;Dodge;DongFeng;Doninvest;Donkervoort;DS;Eagle;FAW;Felino;Ferrari;Fiat;Fittipaldi;FOMM;Ford;FSO;Fuqi;GAZ;Geely;Genesis;Geo;Ginetta;GMC;Great Wall;Hafei;Haval;Hennessey;Hindustan;Holden;Honda;HuangHai;Hummer;Hurtan;Hyundai;Infiniti;Innocenti;Invicta;Iran Khodro;Irmscher;Isdera;Isuzu;Italdesign;Iveco;Izh;JAC;Jaguar;Jeep;Jiangling;Karlmann King;Kia;Koenigsegg;KTM;Lamborghini;Lancia;Land Rover;Landwind;Lexus;Lincoln;Lister;Lotus;LTI;LUAZ;Lvchi;Mahindra;Marcos;Maruti;Maserati;Maybach;Mazda;MCC;McLaren;Mega;Mercedes-Benz;Mercury;Metrocab;MG;Minelli;Mini;Mitsubishi;Mitsuoka;Monte Carlo;Morgan;Morris;Moskvich;Nissan;Noble;Oldsmobile;Opel;Osca;Pagani;Panoz;Paykan;Perodua;Peugeot;Pininfarina;Plymouth;Pontiac;Porsche;Praga;Premier;Proton;PUCH;Puma;Qvale;Reliant;Renault;Renault Samsung;Rimac;Rolls-Royce;Ronart;Rover;RUF;Saab;Saleen;Saturn;SCG;Scion;Seat;SeAZ;ShuangHuan;Sin Cars;Skoda;SMA;Smart;Soueast;Spectre;Spyker;SsangYong;Subaru;Suzuki;TagAz;Talbot;Tata;Tatra;Techrules;Tesla;Tianma;Tianye;Tofas;Tonggong;Toyota;Trabant;Triumph;TVR;UAZ;Vauxhall;VAZ;Vector;Vencer;Venturi;Vespa;Volkswagen;Volvo;VUHL;VW-Porsche;W Motors;Wartburg;Westfield;WEY;Wiesmann;Xin Kai;Zastava;ZAZ;Zenvo;ZIL;ZX;';

        $diziarray = explode(";",$cars);
        //print_r($diziarray);
         $dizisay = count($diziarray);
      //  echo $dizisay ;die;

        for ($i=0; $i < $dizisay ; $i++) {
            $model =new Cars();
             $model->name  =  $diziarray[$i] ;
            $model->save();
        }

    }

    public function test(){

        $json = file_get_contents("database.json");
        $models =Cars::all();

        $cars = json_decode($json,true);


        $carcount = count($models);

        $markamodel = [] ;



        $carcount = count($cars);

      // echo $carcount;
        $arraydata = [] ;
       for ($i=0;$i<$carcount;$i++){
      //  echo  $cars[$i]['MarkaName'].'<br>';
        foreach ($models as $model ){
            if($cars[$i]['MarkaName']==$model->name){
                array_push($arraydata,[$model->id=> $cars[$i]['ModelName'] ]);

            }
        }


       }

      // print_r($arraydata);

    for($a=0;$a<count($arraydata) ;$a++){
         foreach ($arraydata[$a] as $key => $val){

            // echo $key ;
             $secsubcat=new CarModel();
             $secsubcat->car_id = $key;
             $secsubcat->name = $val;
             $secsubcat->save();

         }
    }



    }
}
