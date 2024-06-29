<?php

/*for($i = 97; $i < 109; $i++){
    $file = fopen(__DIR__."/json/$i.json", "wb");
    fwrite($file, 
        json_encode(
            json_decode(
                file_get_contents("https://api.ppdbjatim.net/api/acceptances/second-wave-registration/sma/grades?enable_pagination=0&filter%5Bschool_id%5D=$i")
            , true)
        , JSON_PRETTY_PRINT)
    );
    fclose($file);
}


$data = json_decode(file_get_contents(__DIR__."/SMK/Data.json"), true);
for($i = 0; $i < count($data); $i++){
    $sch = $data[$i]["name"];
    mkdir(__DIR__. "/SMK/3/Pemenuhan/$sch");
    for($j = 0; $j < count($data[$i]["majors"]); $j++){
        $id = $data[$i]["majors"][$j]["id"];
        $name = $data[$i]["majors"][$j]["name"];
        
        
        $file = fopen(__DIR__. "/SMK/3/Pemenuhan/$sch/$name.json", "wb");
        fwrite($file, 
            json_encode(
                json_decode(
                    file_get_contents("https://static.ppdbjatim.net/third-wave-acceptance-fulfillment/$id.json")
                , true)
            , JSON_PRETTY_PRINT)
        );
    }
}

$data = json_decode(file_get_contents(__DIR__."/SMK/Data.json"), true);
for($i = 0; $i < count($data); $i++){
    $sch = $data[$i]["name"];
    mkdir(__DIR__. "/SMK/3/Zonasi/$sch");
    for($j = 0; $j < count($data[$i]["majors"]); $j++){
        $id = $data[$i]["majors"][$j]["id"];
        $name = $data[$i]["majors"][$j]["name"];
        
        
        $file = fopen(__DIR__. "/SMK/3/Zonasi/$sch/$name.json", "wb");
        fwrite($file, 
            json_encode(
                json_decode(
                    file_get_contents("https://static.ppdbjatim.net/third-wave-acceptance/$id.json")
                , true)
            , JSON_PRETTY_PRINT)
        );
    }
}*/