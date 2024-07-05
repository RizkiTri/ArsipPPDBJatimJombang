<?php

$data = json_decode(file_get_contents(__DIR__."/SMA/Data.json"), true);
for($i = 0; $i < count($data); $i++){
    $sch = $data[$i]["name"];
    $id = $data[$i]["id"];
    
    $file = fopen(__DIR__."/SMA/2/$sch.json", "wb");
    fwrite($file, 
        json_encode(
            json_decode(
                file_get_contents("https://api.ppdbjatim.net/api/acceptances/second-wave-registration/sma/grades?enable_pagination=0&filter%5Bschool_id%5D=$id")
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
}

$data = json_decode(file_get_contents(__DIR__."/SMA/Data.json"), true);
for($i = 0; $i < count($data); $i++){
    $sch = $data[$i]["name"];
    $id = $data[$i]["id"];
    
    $file = fopen(__DIR__."/SMA/4/Zonasi/$sch.json", "wb");
    fwrite($file, 
        json_encode(
            json_decode(
                file_get_contents("https://static.ppdbjatim.net/fourth-wave-acceptance/radius/$id.json")
            , true)
        , JSON_PRETTY_PRINT)
    );
    fclose($file);
}

$data = json_decode(file_get_contents(__DIR__."/SMA/Data.json"), true);
for($i = 0; $i < count($data); $i++){
    $sch = $data[$i]["name"];
    $id = $data[$i]["id"];
    
    $file = fopen(__DIR__."/SMA/4/Sebaran/$sch.json", "wb");
    fwrite($file, 
        json_encode(
            json_decode(
                file_get_contents("https://static.ppdbjatim.net/fourth-wave-acceptance/distribution/$id.json")
            , true)
        , JSON_PRETTY_PRINT)
    );
    fclose($file);
}

$data = json_decode(file_get_contents(__DIR__."/SMA/Data.json"), true);
for($i = 0; $i < count($data); $i++){
    $sch = $data[$i]["name"];
    $id = $data[$i]["id"];
    
    $file = fopen(__DIR__."/SMA/4/Pemenuhan/$sch.json", "wb");
    fwrite($file, 
        json_encode(
            json_decode(
                file_get_contents("https://static.ppdbjatim.net/fourth-wave-acceptance-fulfillment/$id.json")
            , true)
        , JSON_PRETTY_PRINT)
    );
    fclose($file);
}

$data = json_decode(file_get_contents(__DIR__."/SMK/Data.json"), true);
for($i = 0; $i < count($data); $i++){
    $sch = $data[$i]["name"];
    mkdir(__DIR__. "/SMK/5/$sch");
    for($j = 0; $j < count($data[$i]["majors"]); $j++){
        $id = $data[$i]["majors"][$j]["id"];
        $name = $data[$i]["majors"][$j]["name"];
        
        
        $file = fopen(__DIR__. "/SMK/5/$sch/$name.json", "wb");
        fwrite($file, 
            json_encode(
                json_decode(
                    file_get_contents("https://api.ppdbjatim.net/api/acceptances/second-wave-registration/smk/grades?enable_pagination=0&filter%5Bsmk_major_id%5D=$id")
                , true)
            , JSON_PRETTY_PRINT)
        );
    }
}