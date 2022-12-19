<?php

class Rucksack{
    public $contents_len;
    public $compartement_a = [];
    public $compartement_b = [];
    public $abc_array = [];
    public $total_sum = 0;

    

    public function __construct($content)
    {
        $this->total_sum = 0;
        $this->contents_len = strlen($content);
        $this->split($content, $this->contents_len - 2);
        $this->init_array();
        $this->sum_values($this->abc_array, $this->compare());
    }
    function __destruct()
    {
       // echo "destructed\n";
    }
    private function init_array(){
        //vytvo5en9 pole s pismeny a jejich hodnotami
        array_push($this->abc_array, 0);
        for($i = 0; $i < 26; $i++){
            array_push($this->abc_array, chr(97 + $i));
        } 
        for($i = 0; $i < 26; $i++){
            array_push($this->abc_array, chr(65 + $i));
        } 
    }
    public function get_sum(){
        return $this->total_sum;
    }
    public function print_arr($arr){
        print_r($arr);
    }
    private function split($content, $len){
        $half = $len/2;
        for($i = 0; $i < $half; $i++){
            array_push($this->compartement_a, $content[$i]);
        }
        for($i = $half; $i < $len; $i++){
            array_push($this->compartement_b, $content[$i]);
        }
    }
    private function compare(){
        $is_in_both = 0;

        for($i = 0; $i < ($this->contents_len - 2) /2; $i++){
            for($j = 0; $j < ($this->contents_len - 2) /2; $j++){
                if($this->compartement_a[$i] == $this->compartement_b[$j]){
                    $is_in_both = $this->compartement_a[$i];
                    break;
                }
            }
        }
        return $is_in_both;
    }
    private function sum_values($arr = [], $char){
        $len = count($arr);

        for($i = 1; $i < $len; $i++){
            if($char == $arr[$i]){
                $this->total_sum = $this->total_sum + $i;
            }
        }
    }
}

$result = 0;



//$file = fopen("input.txt", "r");
//First part of the task
foreach(file('input.txt') as $line){
    
    $sack = new Rucksack($line);
    $result = $result + $sack->get_sum();
}

$sack_arr = [];
$cnt = 0;

//second part of the task
foreach(file('input.txt') as $line){
    
    
    $sack_a = new Rucksack($line);

    if($cnt < 3){
        array_push($sack_arr, $sack_a);
        for($i = 0; $i < count($sack_arr); $i++){
            /*for($j = 0; $j < $sack_arr[$contents_len] /2; $j++){
                if($this->compartement_a[$i] == $this->compartement_b[$j]){
                    $is_in_both = $this->compartement_a[$i];
                    break;
                }
            }*/
    //       echo $sack_arr[];
        }
    }
    
    $cnt++;


    //$result = $result + $sack->get_sum();
}
print_r($sack_arr);
echo $result;

//$sack->print_len();
//$sack->compare();

//TODO 
//Count values of characters returned by compare function


?>