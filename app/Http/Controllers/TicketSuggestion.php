<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketSuggestion extends Controller
{
    //

    /**
     * @param $matrix
     */
    public static function ticketSuggestion($matrix){
        $tbarr = [];
        $normmatrix = $matrix;
        $similarmatrix = [];
        $sodem = 0;
        $sodem1 = 0;
        $keyarr = [];
        foreach ($matrix as $key => $value){
            $keyarr[$sodem] = $key;
            $sodem++;
        }
        $sodem = 0;
        foreach ($matrix as $key => $value){
            $similarmatrix[$key] = [];
        }
        foreach ($matrix as $row){
            $sohang = count($row);
            $num = $sohang;
            $s = 0;
            for ($i=0;$i<$sohang;$i++){
                if (!is_numeric($row[$i])){
                    $num-=1;
                    $s+=0;
                }
                else{
                    $s+=intval($row[$i]);
                }
            }
            $tbarr[$sodem]=round($s/$num,2);
            $sodem+=1;
        }
//        die(var_dump($tbarr));
        foreach ($normmatrix as $key => $value){
            $sohang = count($value);
            for ($i=0;$i<$sohang;$i++){
                if(is_numeric($value[$i])){
                    $normmatrix[$key][$i]= intval($value[$i]) - $tbarr[$sodem1];
                }
            }
            $sodem1+=1;
        }
        foreach ($similarmatrix as $key => $value){
            $num = 0;
            foreach ($normmatrix as $row){
                $sohang = count($row);
                $s = 0;
                $s1 = 0;
                $s2 = 0;
                for ($i=0;$i<$sohang;$i++){
                    if(is_numeric($normmatrix[$key][$i])&&is_numeric($row[$i])){
                        $s += $normmatrix[$key][$i] * $row[$i];
                    }
                    if (is_numeric($normmatrix[$key][$i])){
                        $s1 += pow($normmatrix[$key][$i],2);
//                        echo $s1.'<br>';
                    }
                    if (is_numeric($row[$i])){
                        $s2 += pow($row[$i],2);
//                        echo $s2.'<br>';
                    }
                }
                $similarmatrix[$key][$num] = round($s/(sqrt($s1)*sqrt($s2)),2);
//                echo $s/(sqrt($s1)*sqrt($s2)).'<br>';
                $num++;
            }
        }
        $normmatrixFull = $normmatrix;
        foreach ($normmatrix as $key => $value){
            $sohang = count($value);
            for ($i=0;$i<$sohang;$i++){
                if(!is_numeric($value[$i])){
                    $max1 = -1;
                    $max2 = -1;
                    $s1 = 0;
                    $s2 = 0;
                    for ($j=0;$j<count($keyarr);$j++){
                        if($keyarr[$j]==$key)
                            continue;
                        if($similarmatrix[$key][$j]>$max1&&is_numeric($normmatrix[$keyarr[$j]][$i])){
                            $max1 = floatval($similarmatrix[$key][$j]);
                            $s1 = $normmatrix[$keyarr[$j]][$i]*$max1;
                        }
                        if($max1>$max2){
                            $max2 = $max1+$max2;
                            $max1= $max2-$max1;
                            $max2= $max2-$max1;
                            $s2= $s1+$s2;
                            $s1= $s2-$s1;
                            $s2= $s2-$s1;
                        }
                    }
                    $normmatrixFull[$key][$i] = round(($s1+$s2)/(abs($max1)+abs($max2)),2);
                }
            }
        }
        $matrixFinal = $normmatrixFull;
        $sodem2 = 0;
        foreach ($matrixFinal as $key => $value){
            for ($i=0;$i<count($value);$i++){
                $matrixFinal[$key][$i] = round($matrixFinal[$key][$i] + $tbarr[$sodem2],2);
            }
            $sodem2++;
        }
        echo var_dump($tbarr).'<br>';
        echo var_dump($normmatrix).'<br>';
        echo var_dump($similarmatrix).'<br>';
        echo var_dump($normmatrixFull).'<br>';
        echo var_dump($matrixFinal).'<br>';
    }
}
