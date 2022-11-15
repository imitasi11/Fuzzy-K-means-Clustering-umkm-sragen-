<?php
include "koneksi.php";
set_time_limit(0);
$count=1;

function largest($arr, $n)
{
    $i;
    // Initialize maximum element
    $max = $arr[1];
 
    // Traverse array elements
    // from second and
    // compare every element 
    // with current max 
    for ($i = 1; $i < $n; $i++)
        if ($arr[$i] > $max)
            $max = $arr[$i];
 
    return $max;
}  
function littest($arr, $n)
{
    $i;
     
    // Initialize maximum element
    $max = $arr[1];
 
    // Traverse array elements
    // from second and
    // compare every element 
    // with current max 
    for ($i = 1; $i < $n; $i++)
        if ($arr[$i] < $max)
            $max = $arr[$i];
 
    return $max;
}   

$sql = 'SELECT * FROM data ORDER BY id_data' ;
$result = $db->query($sql);
$jml_omset = 0;
$jml_aset = 0;
$count=1;
foreach ($result as $row) {
    $iddata[$count]=$row['id_data'];
    $omset[$count]=$row['omset'];
    $aset[$count]=$row['aset'];
    $count=$count+1;
    }
    $maxomset=largest($omset, count($omset));
    $minomset=littest($omset, count($omset));
    $maxaset=largest($aset, count($aset));
    $minaset=littest($aset, count($aset));

$sql = 'SELECT * FROM cluster ORDER BY id_cluster' ;
$result = $db->query($sql);
//-- menyiapkan variable penampung berupa array
$pcluster=array();
//-- melakukan iterasi pengisian array cluster pertama untuk tiap record data yang didapat
$count=1;
$clustername=array();
foreach ($result as $row) {
    $clustername[$count]=$row['nama'];
    $pcluster[0][$count][1]=$row['omset'];
    $pcluster[0][$count][2]=$row['aset'];
    $pcluster[0][$count][3]=$row['tenaga'];
    $count=$count+1;
    } 


$count=1;
$filterhasil=0;

$sql = 'SELECT * FROM data ORDER BY id_data' ;
$result = $db->query($sql);
$data=array();
$cluzbowl=array();
$jumlahc=array();
$keterangan=0;

//iterasi pertama
foreach ($result as $row) {
    $normalizeomset=(1+(($row['omset']-$minomset)*(10-1)/($maxomset-$minomset)));
    $normalizeaset=(1+(($row['aset']-$minaset)*(10-1)/($maxaset-$minaset)));
    $data[0][$count][1]=$row['id_data'];
    $data[0][$count][2]=$row['nama'];
    $data[0][$count][3]=$normalizeomset;
    $data[0][$count][4]=$normalizeaset;
    $data[0][$count][5]=$row['tenaga'];
    //perhitungan cluster 1
    $cluzbowl[1]=sqrt(pow(($normalizeomset-$pcluster[0][1][1]),2)+pow(($normalizeaset-$pcluster[0][1][2]),2)+pow(($row['tenaga']-$pcluster[0][1][3]),2));
    //perhitungan cluster 2
    $cluzbowl[2]=sqrt(pow(($normalizeomset-$pcluster[0][2][1]),2)+pow(($normalizeaset-$pcluster[0][2][2]),2)+pow(($row['tenaga']-$pcluster[0][2][3]),2));
    //perhitungan cluster 3
    $cluzbowl[3]=sqrt(pow(($normalizeomset-$pcluster[0][3][1]),2)+pow(($normalizeaset-$pcluster[0][3][2]),2)+pow(($row['tenaga']-$pcluster[0][3][3]),2));
    //penampungan data cluster
    $data[0][$count][6]=$cluzbowl[1];
    $data[0][$count][7]=$cluzbowl[2];
    $data[0][$count][8]=$cluzbowl[3];
    //pencarian cluster dengan nilai terkecil
    $min=MIN($cluzbowl[1],$cluzbowl[2],$cluzbowl[3]);
    //pencarian jumlah pada tiap cluster untuk iterasi 1 dan penulisan keterangan
    for($i=1;$i<=count($cluzbowl);$i++){
    if($min==$cluzbowl[$i]){
        $keterangan=$i; 
        if(!isset($pcluster[1][$i][1])){
        $pcluster[1][$i][1]=$normalizeomset;
        $pcluster[1][$i][2]=$normalizeaset;
         $pcluster[1][$i][3]=$row['tenaga'];

        $jumlahc[1][$i]=1;
        }else{
        $pcluster[1][$i][1]=$pcluster[1][$i][1]+$normalizeomset;
        $pcluster[1][$i][2]=$pcluster[1][$i][2]+$normalizeaset;
        $pcluster[1][$i][3]=$pcluster[1][$i][3]+$row['tenaga'];
        $jumlahc[1][$i]=$jumlahc[1][$i]+1;
        }
    }
    }
    //menyimpan data hasil
    $data[0][$count][9]=$keterangan;
    $count=$count+1;
    }


    
    $maxiterasi=100;



$filterhasil=0;
        //membuat perulangan dan batasan iterasi sejumlah 100
   for($i=1;$i<$maxiterasi;$i++){
        $w=$i-1;
        $v=$i+1;

    for($j=1;$j<=3;$j++){
        for($k=1;$k<=3;$k++){
            $pcluster[$i][$j][$k]=$pcluster[$i][$j][$k]/$jumlahc[$i][$j];
        }
    }
    for($j=1;$j<=count($data[0]);$j++){
        $data[$i][$j][1]=$data[$w][$j][1];
        $data[$i][$j][2]=$data[$w][$j][2];
        $data[$i][$j][3]=$data[$w][$j][3];
        $data[$i][$j][4]=$data[$w][$j][4];
        $data[$i][$j][5]=$data[$w][$j][5];
        for($k=1;$k<=count($pcluster[0]);$k++){
            $cluzbowl[$k]=sqrt(pow(($data[$i][$j][3]-$pcluster[$i][$k][1]),2)+pow(($data[$i][$j][4]-$pcluster[$i][$k][2]),2)+pow(($data[$i][$j][5]-$pcluster[$i][$k][3]),2));
        }
        $data[$i][$j][6]=$cluzbowl[1];
        $data[$i][$j][7]=$cluzbowl[2];
        $data[$i][$j][8]=$cluzbowl[3];
        $min=MIN($cluzbowl[1],$cluzbowl[2],$cluzbowl[3]);
        if($v==$maxiterasi){
        }else{


        for($k=1;$k<=count($cluzbowl);$k++){
            if($min==$cluzbowl[$k]){
            $keterangan=$k; 
            if(!isset($pcluster[$v][$k][1])){
            $pcluster[$v][$k][1]=$data[$i][$j][6];
            $pcluster[$v][$k][2]=$data[$i][$j][7];
            $pcluster[$v][$k][3]=$data[$i][$j][8];
            $jumlahc[$v][$k]=1;
            }else{
            $pcluster[$v][$k][1]=$pcluster[$v][$k][1]+$data[$i][$j][6];
            $pcluster[$v][$k][2]=$pcluster[$v][$k][2]+$data[$i][$j][7];
            $pcluster[$v][$k][3]=$pcluster[$v][$k][3]+$data[$i][$j][8];
            $jumlahc[$v][$k]=$jumlahc[$v][$k]+1;
            }
            }
        }
        }
        $data[$i][$j][9]=$keterangan;
        if($data[$i][$j][9]==$data[$w][$j][9]){
            $filterhasil=$filterhasil+1;
        }
        
    }
    if($filterhasil==count($data[0])){
       
                $i=$maxiterasi;
       
    }
   
    $filterhasil=0;
}

?>
<?php include('linka.php'); ?>
<?php 
?>
    <!-- offer -->
    <div class="offer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Cluster UMKM<strong class="black"> Karangmalang</strong></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="offer-bg">
            <div class="container" style="padding:0px;">
                <div class="row">
                     <h2 style="color: white;">Perhitungan Akhir Cluster ( Iterasi Ke <?php echo count($data); ?>)</h2>
                     <?php 
                     $i=count($data)-1;
                     ?>
                    

                    <table border="1px" class="table" width="100%">
                        <thead class="thead-dark">
                        <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Omset</th>
                        <th>Aset</th>
                        <th>tenaga</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>kriteria</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php for($j=1;$j<=count($data[0]);$j++){?>
                        <tr>
                            <?php for($k=1;$k<=9;$k++){?>
                            <td><?php echo $data[$i][$j][$k];?></td>
                            <?php }
                            $wid_data=$data[$i][$j][1];
                            $inputcluster=$data[$i][$j][9];
                             $results = $db->query("UPDATE data SET cluster='$inputcluster' WHERE id_data ='$wid_data'");
                             $sql = "SELECT * FROM data WHERE id_data ='$wid_data'" ;
                                $result = $db->query($sql);
                                foreach ($result as $row) {
                                    $data[$i][$j][2]=$row['nama_usaha'];
                                }
                                } ?>
                       </tr>
                    </tbody>
                    </table>
              

                </div>
                <div class="row">
                    <h3 style="color: white;"> Hasil Akhir Cluster </h3>
    <?php 
          $i=count($data)-1;
          $v=$i+1;
        
    ?>
    <table border="1px" class="table" width="100%">
        <thead class="thead-dark">
                        <tr>
            <th>#</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
        </tr>
    </thead>
        <tr>
            <td>Jumlah</td>
            <td><?php echo $jumlahc[$v][1];?></td>
            <td><?php echo $jumlahc[$v][2];?></td>
            <td><?php echo $jumlahc[$v][3];?></td>
        </tr>
    </table>
    </div>
    <div class="row">
    <div id="div1">
    <table border="1px" class="table" width="100%">
        <thead class="thead-dark">
                        <tr>
            <th><?php echo $clustername[1];?></th>
            <th><?php echo $clustername[2];?></th>
            <th><?php echo $clustername[3];?></th>
        <tr>
        </thead>
            <td valign="top">
                <?php for($j=1;$j<=count($data[0]);$j++){ ?>
                <?php 
                if($data[$i][$j][9]==1){?>
                    <?php
                    echo $data[$i][$j][2];?>
                    <br>
                <?php }} ?>


            </td>
            <td valign="top"><?php for($j=1;$j<=count($data[0]);$j++){ ?>
                <?php 
                if($data[$i][$j][9]==2){?>
                    <?php
                    echo $data[$i][$j][2];?>
                    <br>
                <?php }} ?>
            </td>
            <td valign="top">
            <?php for($j=1;$j<=count($data[0]);$j++){ ?>
                <?php 
                if($data[$i][$j][9]==3){?>
                    <?php
                    echo $data[$i][$j][2];?>
                    <br>
                <?php }} ?>
            </td>
        </tr>
    </table>
</div></div>
<div class="col-lg-12">
                    <div class="row my-5">
                        <div class="col-lg-6 col-sm-6">
                            <div class="coupon-box">
                                <div class="input-group input-group-sm">
                                    <a href="map.php" class="btn btn-primary">Pemetaan UMKM</a>
                                </div>
                            </div>
                            
                        </div>
                       
                    </div>
                </div>
                </div>
          

            </div>
        </div>
    </div>

    <!-- end offer -->

   

<?php include('linkaf.php'); ?>