<?php

class Rucksack{
    public $contents_len;
    public $compartement_a = [];
    public $compartement_b = [];

    

    public function __construct($content)
    {
        $this->contents_len = strlen($content);
        $this->split($content, $this->contents_len);
        $this->compute_value($this->compare());
    }
    public function init_array(){
        //vytvo5en9 pole s pismeny a jejich hodnotami
    }
    //just for testing
    public function print_len(){
        echo "Lenght of string is {$this->contents_len}\n";
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
    public function compare(){
        $is_in_both = 0;

        for($i = 0; $i < $this->contents_len/2; $i++){
            for($j = 0; $j < $this->contents_len/2; $j++){
                if($this->compartement_a[$i] == $this->compartement_b[$j]){
                    $is_in_both = $this->compartement_a[$i];
                    break;
                }
            }
        }
        return $is_in_both;
    }
    public function compute_value($char){
        echo "{$char}\n";
    }



}

$sack = new Rucksack("CrZsJsPPZsGzwwsLwLmpwMDw");
//$sack->print_len();
//$sack->compare();

//TODO 
//Count values of characters returned by compare function


?>