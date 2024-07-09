<?php

date_default_timezone_set("Asia/Jakarta");

$header = "# Data PPDB {sek} Tahun 2023/2024";
$data   = [
    "SMA" => __DIR__."/SMA/Data.json",
    "SMK" => __DIR__."/SMK/Data.json"
];
$nama   = [
    "M", "ACHMAD", "MOHAMMAD", "MOCH", "Mochammad"
];

function tahap2(){
    global $header, $data;
    $resource = json_decode(file_get_contents($data["SMA"]), true);
    
    for($i = 0; $i < count($resource); $i++){
        $la = str_replace("{sek}", $resource[$i]["name"], $header);
        
        $markdown = [];
        $markdown[] = $la;
        $markdown[] = "Berikut adalah data pendaftaran untuk tahap ke-2, yaitu PPDB jalur nilai rapor, yang telah dikumpulkan. Tahap ke-2 ini dikhususkan untuk calon siswa yang memiliki prestasi akademik berdasarkan nilai rapor selama jenjang pendidikan sebelumnya.\n";
        $markdown[] = "## Informasi Peserta ";
        
        $source = json_decode(file_get_contents(__DIR__."/SMA/2/" . $resource[$i]["name"] . ".json"), true)["data"];
        for($j = 0; $j < count($source); $j++){
            $no = $j + 1;
            $name = $source[$j]["name"];
            $nisn = $source[$j]["nisn"];
            $grade = $source[$j]["grade_final"];
            $pendaftaran = $source[$j]["registration_created_at"];
            $pendaftaran = strtotime($pendaftaran);
            $pendaftaran = date("l, j F Y H:i:s", $pendaftaran);
            
            $markdown[] = "*$no. $name*";
            $markdown[] = "- **NISN:** $nisn";
            $markdown[] = "- **NILAI AKHIR:** $grade";
            $markdown[] = "- **WAKTU PENDAFTARAN:** $pendaftaran\n";
        }
        $markdown[] = "## Catatan Penting\n\n- Semua data telah diverifikasi.\n- Pendaftaran akan ditutup pada tanggal 19 Juni 2024.";
        $markdown[] = "---";
        $markdown[] = "_Terima Kasih_";
        $markdown = implode("\n", $markdown);
        
        $file = fopen(__DIR__."/Resource/SMA/2/".$resource[$i]["name"].".md", "wb");
        fwrite($file, $markdown);
        fclose($file);
        
        $markdown = [];
    }
    
}
function tahap3(){
    global $header, $data;
    $resource = json_decode(file_get_contents($data["SMK"]), true);
    
    for($i = 0; $i < count($resource); $i++){
        $la = str_replace("{sek}", $resource[$i]["name"], $header);
        
        $markdown = [];
        $markdown[] = $la;
        $markdown[] = "Berikut adalah data pendaftaran untuk tahap ke-2, yaitu PPDB jalur nilai rapor, yang telah dikumpulkan. Tahap ke-2 ini dikhususkan untuk calon siswa yang memiliki prestasi akademik berdasarkan nilai rapor selama jenjang pendidikan sebelumnya.\n";
        $markdown[] = "## Informasi Peserta ";
        
        $source = json_decode(file_get_contents(__DIR__."/SMK/3/" . $resource[$i]["name"] . ".json"), true)["data"];
        for($j = 0; $j < count($source); $j++){
            $no = $j + 1;
            $name = $source[$j]["name"];
            $nisn = $source[$j]["nisn"];
            $grade = $source[$j]["grade_final"];
            $pendaftaran = $source[$j]["registration_created_at"];
            $pendaftaran = strtotime($pendaftaran);
            $pendaftaran = date("l, j F Y H:i:s", $pendaftaran);
            
            $markdown[] = "### $no. $name";
            $markdown[] = "- **NISN:** $nisn";
            $markdown[] = "- **NILAI AKHIR:** $grade";
            $markdown[] = "- **WAKTU PENDAFTARAN:** $pendaftaran\n";
        }
        $markdown[] = "## Catatan Penting\n\n- Semua data telah diverifikasi.\n- Pendaftaran akan ditutup pada tanggal 19 Juni 2024.";
        $markdown[] = "---";
        $markdown[] = "_Terima Kasih_";
        $markdown = implode("\n", $markdown);
        
        $file = fopen(__DIR__."/Resource/SMK/3/".$resource[$i]["name"].".md", "wb");
        fwrite($file, $markdown);
        fclose($file);
        
        $markdown = [];
    }
    
}


tahap2();