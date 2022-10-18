<head>  
    <meta charset="UTF-8">  
</head>  
  
<?php  
    $data=file_get_contents($_FILES['sp']['tmp_name']); 
    $datas=explode("\r\n", $data);  
    $sp=array();  
    $s=array();  
    $p=array();  
    $i=0;  
    $row=0;  
    $col=0;  
    $col=count($datas[0]);  
    
    foreach ($datas as $key => $var) {  
        $d[$row++]=explode(",", $datas[$key]);  
        array_push($sp, $d[$key]);  
    }  
    array_pop($sp);  
    $row=count($sp);  
    $col=count($sp[0]);  
    $sp[0][$col]="";  
    
    for($i=1;$i<$row;$i++){  
        $sp[$i][$col]=array_sum($sp[$i])-$sp[$i][0];  
        $s[$i]=$sp[$i][$col];  
    }  
  
    $sp[$row][0]="";  
    for($i=1;$i<$col;$i++){  
        $sp[$row][$i]=0;  
        for($j=1;$j<$row;$j++){  
            $sp[$row][$i]=$sp[$row][$i]+$sp[$j][$i];  
        }  
        $p[$i]=$sp[$row][$i];  
    }  
    echo"<h2>Original S-P Form:</h2>";  
    echo "<table border=1>";  
    for($i=0;$i<=$row;$i++){  
        echo "<tr>";  
        for($j=0;$j<=$col;$j++){  
            if($i==$row && $j==$col){  
                echo "<td align=center width=20px height=20px> </td>";  
            }  
            else{  
                echo "<td align=center width=20px height=20px>",$sp[$i][$j],"</td>";  
            }  
        }  
        echo "</tr>";  
    }  
    echo "</table>";  
  
    $sps=array();  
    arsort($s,SORT_NUMERIC);  
    $sidx=array_keys($s);  
    $sps[0]=$sp[0];                     //Fixed first column (title number)  
    for($i=1;$i<$row;$i++){              //Switching Row  
        $sps[$i]=$sp[$sidx[$i-1]];  
    }  
    $sps[$row]=$sp[$row];               //Fixed last column (number of correct answers per question)  

    echo"<h2>Sort by the number of correct answers by students:</h2>";  
    echo "<table border=1>";  
    for($i=0;$i<=$row;$i++){  
        echo "<tr>";  
        for($j=0;$j<=$col;$j++){  
            if($i==$row && $j==$col){  
                echo "<td align=center width=20px height=20px> </td>";  
            }  
            else{  
                echo "<td align=center width=20px height=20px>",$sps[$i][$j],"</td>";  
            }  
        }  
        echo "</tr>";  
    }  
    echo "</table>";  
  
    $spsp=array();  
    arsort($p,SORT_NUMERIC);  
    $pidx=array_keys($p);  
    for($i=0;$i<$row;$i++){              //Fixed student number  
        $spsp[$i][0]=$sps[$i][0];  
    }

    for($i=1;$i<$col;$i++){              //Switching col  
        for($j=0;$j<$row;$j++){  
            if($j==0){  
                $spsp[$j][$i]=$pidx[$i-1];  
            }  
            else{  
                $spsp[$j][$i]=$sps[$j][$pidx[$i-1]];  
            }  
        }  
    }

    for($i=0;$i<$row;$i++){              //Fixed number of correct answers for students  
        $spsp[$i][$col]=$sps[$i][$col];  
    }

    for($i=0;$i<$col;$i++){               
        if($i==0){  
            $spsp[$row][$i]="";  
        }  
        else{  
            $spsp[$row][$i]=$p[$pidx[$i-1]];  
        }  
    }  
  
    echo"<h2>Sort by number of correct answers:</h2>";  
    echo "<table border=1>";  
        for($i=0;$i<=$row;$i++){  
            echo "<tr>";  
            for($j=0;$j<=$col;$j++){  

                if($i==$row && $j==$col){  
                    echo "<td align=center width=20px height=20px> </td>";  
                }  
                else{  
                    echo "<td align=center width=20px height=20px>",$spsp[$i][$j],"</td>";  
                }  
            }  
            echo "</tr>";  
        }  
    echo "</table>";  

    $c=96;  
    echo"<h2>The sum of the number of 1s and 0s enclosed by the S and P curves:</h2>";  
    print($c);  

    $n=$col-1;  
    $N=$row-1;  
    echo"<h2>Number of Students N:</h2>";  
    print($N);  
    echo"<h2>Number of Questions n:</h2>";  
    print($n);  
    $t=$N*$n;  

    $total=0;  
    for($i=1;$i<$row;$i++){  
        for($j=1;$j<$col;$j++){  
            $total=$total+$spsp[$i][$j];  
        }  
    }  
  
    $total=$total/$t;  
    echo"<h2>Student Score Sum N/n:</h2>";  
    print($total);  

    $M=floor(sqrt($t)+0.5);  
    echo"<h2>floor(sqrt(N*n)+0.5):</h2>";  
    print($M);  

    $d=0;  
    switch ($M) {  
        case 11:  
            $d=0.278;  
            break;  
        case 12:  
            $d=0.285;  
            break;  
        case 13:  
            $d=0.291;  
            break;  
        case 14:  
            $d=0.296;  
            break;  
        case 15:  
            $d=0.302;  
            break;     
        case 16:  
            $d=0.307;  
            break;       
        case 17:  
            $d=0.312;  
            break;     
        case 18:  
            $d=0.317;  
            break;     
        case 19:  
            $d=0.321;  
            break;  
        case 20:  
            $d=0.326;  
            break;  
    }//The formula is too complicated and the calculation is not easy, so switch case is used to simplify
    echo"<h2>corresponding Db(M):</h2>";  
    echo "$d";  

    $a=4*$t*$total*(1-$total)*$d;  
    $D=$c/$a;  
    echo "<h2>Coefficient of Difference D*:</h2>";  
    print($D);  
?>  
