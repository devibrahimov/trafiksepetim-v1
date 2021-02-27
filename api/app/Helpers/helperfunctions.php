<?php
/**
 * @CompanyURI: https://koalamedya.com
 * @Description: Developed by Koalamedya Software team.
 * @Version: 1.0.0
 * @Authors: Baylar İbrahimov
 * @Date :    17.11.2020
 */



function product_image_change_url($data){
  return array_map(function($value){

        // $value['images'] = 'asdsadasdasd';

        $jsonimages = json_decode($value['images'])->images;

        $jsonimagesarray = [];

        foreach($jsonimages as $img){
            $imgrow = '/storage/uploads/thumbnail/malls/'.$value['market_id'].'/productimages/small/'.$img;
            array_push($jsonimagesarray,$imgrow);
        }

        $images = [
            'cover'=>'/storage/uploads/thumbnail/malls/'.$value['market_id'].'/productimages/small/'.json_decode($value['images'])->cover ,
            'images' =>$jsonimagesarray
        ];
        $value['images'] = json_encode($images);
        return $value;
    },$data->toArray());
}



function banks(){
    return[
        'Akbank',
        'Alternatifbank ',
        'Anadolubank ',
        'Arap Türk Bankası Bank ',
        'Ekspress',
        'Bayındır Bank',
        'Citibank',
        'Denizbank',
        'Diler Yatırım Bankası',
        'Dışbank',
        'Finans Bank',
        'Takas ve Saklama Bankası',
        'İnterbank',
        'Kentbank',
        'Koçbank',
        'MNG Bank',
        'Nurol Yatırım Bankası',
        'Oyak Bank',
        'Pamukbank',
        'Park Yatırım Bankası',
        'Sınai Yatırım Bankası',
        'Şekerbank',
        'Tekfen Bank',
        'ICBC Turkey Bank A.Ş.',
        'The Chase Manhattan Bank',
        'Turkish Bank',
        'Türk Dışbank',
        'Türk Ekonomi Bankası',
        'Türk Eximbank',
        'Türkbank',
        'Türk Ticaret Bankası',
        'TCMB',
        'TC Ziraat Bankası',
        'Türkiye Emlak Bankası',
        'Türkiye Garanti Bankası',
        'Türkiye Halk Bankası',
        'Türkiye İş Bankası',
        'Türkiye Kalkınma Bankası',
        'Türkiye Sınai Kalkınma Bankası',
        'Yaşarbank',
        'Vakıflar Bankası',
        'Yapı ve Kredi Bankası'
    ];

}
