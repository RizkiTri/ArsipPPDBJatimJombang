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
            
            $markdown[] = "**$no. $name**";
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
    $tahap = ["Zonasi", "Pemenuhan"];
    
    for($i = 0; $i < count($resource); $i++){
        $la = str_replace("{sek}", $resource[$i]["name"], $header);
        mkdir(__DIR__."/Resource/SMK");
        mkdir(__DIR__."/Resource/SMK/3");
        mkdir(__DIR__."/Resource/SMK/3/" . $resource[$i]["name"]);
        
        for($y = 0; $y < count($resource[$i]["majors"]); $y++){
            
            
            for($x = 0; $x < count($tahap); $x++){
                $markdown = [];
                $markdown[] = $la;
                $markdown[] = "Tahap ke-3 dari PPDB ini merupakan jalur zonasi bagian jarak terdekat. Jalur ini memprioritaskan calon siswa yang tinggal paling dekat dengan sekolah.\nBerikut merupakan data peserta didik yang lolos di " . $resource[$i]["name"] . " Jurusan " . $resource[$i]["majors"][$y]["name"] . "\n";
                $markdown[] = "## Informasi Peserta ";
                mkdir(__DIR__."/Resource/SMK/3/" . $resource[$i]["name"] . "/" . $tahap[$x]);
                $source = json_decode(file_get_contents(__DIR__."/SMK/3/" . $tahap[$x] . "/" . $resource[$i]["name"] . "/" . $resource[$i]["majors"][$y]["name"] . ".json"), true);
                if(!is_null($source)){
                    
                    for($j = 0; $j < count($source); $j++){
                        
                        
                        $no = $j + 1;
                        $name = $source[$j]["name"];
                        $nisn = $source[$j]["nisn"];
                        $grade = $source[$j]["distance"];
                        $pendaftaran = $source[$j]["registration_created_at"];
                        $pendaftaran = strtotime($pendaftaran);
                        $pendaftaran = date("l, j F Y H:i:s", $pendaftaran);
                        
                        $markdown[] = "**$no. $name**";
                        $markdown[] = "- **NISN:** $nisn";
                        $markdown[] = "- **JARAK KE SEKOLAH:** $grade";
                        $markdown[] = "- **WAKTU PENDAFTARAN:** $pendaftaran\n";
                    }
                }
                $markdown[] = "## Catatan Penting\n\n- Semua data telah diverifikasi.\n- Pendaftaran akan ditutup pada tanggal 19 Juni 2024.";
                $markdown[] = "---";
                $markdown[] = "_Terima Kasih_";
                $markdown = implode("\n", $markdown);
                    
                $file = fopen(__DIR__."/Resource/SMK/3/".$resource[$i]["name"]."/" . $tahap[$x] . "/" .  $resource[$i]["majors"][$y]["name"] .".md", "wb");
                fwrite($file, $markdown);
                fclose($file);
                
            }
            
            
        }
    }
    
}
function tahap4(){
    global $header, $data;
    $tahap = ["Zonasi", "Sebaran", "Pemenuhan"];
    $resource = json_decode(file_get_contents($data["SMA"]), true);
    
    for($i = 0; $i < count($resource); $i++){
        $la = str_replace("{sek}", $resource[$i]["name"], $header);
        mkdir(__DIR__."/Resource/SMA/4");
        
        for($x = 0; $x < count($tahap); $x++){
            $markdown = [];
            $markdown[] = $la;
            switch($x){
                case 0:
                    $markdown[] = "Tahap ke-4 PPDB melalui jalur Zonasi memprioritaskan calon siswa yang tinggal paling dekat dengan sekolah, untuk memudahkan akses pendidikan bagi siswa di sekitar.\n";
                    break;
                case 1: 
                    $markdown[] = "Tahap ke-4 jalur Sebaran memastikan penerimaan siswa dari berbagai daerah agar pemerataan kesempatan pendidikan tercapai, menghindari penumpukan dari satu daerah.\n";
                    break;
                case 2: 
                    $markdown[] = "Tahap ke-4 Pemenuhan Pagu bertujuan untuk mengisi sisa kuota penerimaan yang belum terpenuhi, memberikan kesempatan terakhir berdasarkan berbagai kriteria tambahan.\n";
                    break;
            }
            $markdown[] = "## Informasi Peserta ";
            mkdir(__DIR__."/Resource/SMA/4". "/" . $tahap[$x]);
            $source = json_decode(file_get_contents(__DIR__."/SMA/4/" . $tahap[$x] . "/" . $resource[$i]["name"] . ".json"), true);
            for($j = 0; $j < count($source); $j++){
                $no = $j + 1;
                $name = $source[$j]["name"];
                $nisn = $source[$j]["nisn"];
                $distance = $source[$j]["distance"];
                $village = $source[$j]["village"] !== null ? $source[$j]["village"] : "unknown" ;
                $pendaftaran = $source[$j]["registration_created_at"];
                $pendaftaran = strtotime($pendaftaran);
                $pendaftaran = date("l, j F Y H:i:s", $pendaftaran);
                
                $markdown[] = "**$no. $name**";
                $markdown[] = "- **NISN:** $nisn";
                $markdown[] = "- **JARAK KE SEKOLAH:** $distance";
                $markdown[] = "- **KELURAHAN:** $village";
                $markdown[] = "- **WAKTU PENDAFTARAN:** $pendaftaran\n";
            }
            $markdown[] = "## Catatan Penting\n\n- Semua data telah diverifikasi.\n- Pendaftaran akan ditutup pada tanggal 19 Juni 2024.";
            $markdown[] = "---";
            $markdown[] = "_Terima Kasih_";
            $markdown = implode("\n", $markdown);
            
            $file = fopen(__DIR__."/Resource/SMA/4/" . $tahap[$x] . "/" . $resource[$i]["name"] . ".md", "wb");
            fwrite($file, $markdown);
            fclose($file);
        }
    }
    
}
function tahap5(){
    global $header, $data;
    $resource = json_decode(file_get_contents($data["SMK"]), true);
    
    for($i = 0; $i < count($resource); $i++){
        $la = str_replace("{sek}", $resource[$i]["name"], $header);
        mkdir(__DIR__."/Resource/SMK");
        mkdir(__DIR__."/Resource/SMK/5");
        mkdir(__DIR__."/Resource/SMK/5/" . $resource[$i]["name"]);
        
        for($y = 0; $y < count($resource[$i]["majors"]); $y++){
            $markdown = [];
            $markdown[] = $la;
            $markdown[] = "PPDB tahap ke-5 menggunakan jalur nilai rapor untuk menyeleksi siswa. Tahap ini memberikan kesempatan kepada siswa berprestasi akademik untuk diterima di sekolah pilihan mereka. \nBerikut merupakan data peserta didik yang lolos di " . $resource[$i]["name"] . " Jurusan " . $resource[$i]["majors"][$y]["name"] . "\n";
            $markdown[] = "## Informasi Peserta ";
            $source = json_decode(file_get_contents(__DIR__."/SMK/5/" . $resource[$i]["name"] . "/" . $resource[$i]["majors"][$y]["name"] . ".json"), true)["data"];
            if(!is_null($source)){
                
                for($j = 0; $j < count($source); $j++){
                    
                    
                    $no = $j + 1;
                    $name = $source[$j]["name"];
                    $nisn = $source[$j]["nisn"];
                    $grade = $source[$j]["grade_final"];
                    $pendaftaran = $source[$j]["registration_created_at"];
                    $pendaftaran = strtotime($pendaftaran);
                    $pendaftaran = date("l, j F Y H:i:s", $pendaftaran);
                        
                    $markdown[] = "**$no. $name**";
                    $markdown[] = "- **NISN:** $nisn";
                    $markdown[] = "- **NILAI AKHIR:** $grade";
                    $markdown[] = "- **WAKTU PENDAFTARAN:** $pendaftaran\n";
                }
            }
            $markdown[] = "## Catatan Penting\n\n- Semua data telah diverifikasi.\n- Pendaftaran akan ditutup pada tanggal 19 Juni 2024.";
            $markdown[] = "---";
            $markdown[] = "_Terima Kasih_";
            $markdown = implode("\n", $markdown);
                    
            $file = fopen(__DIR__."/Resource/SMK/5/".$resource[$i]["name"]. "/" .  $resource[$i]["majors"][$y]["name"] .".md", "wb");
            fwrite($file, $markdown);
            fclose($file);
        }
    }
}

tahap5();