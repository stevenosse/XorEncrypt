<?php

    class XorEncrypt{
        public function __construct() {
            ;
        }
        
        public function encrypt($in, $key){
            if(strlen($key) == 0){
                throw new InvalidArgumentException(__('Empty security key'));
            }
            
            $output = "";
            $p = 0;
            for($i = 0; $i < strlen($in); $i++){
                $output .= substr($in, $i, 1) xor substr($key, $p, 1);
                ++$p;
                $p >= strlen($key) ? $p = 0 : "";
            }
            
            return base64_encode($output);
        }
        
        public function decrypt($cypher, $key){
            $spos = 0;
            $output = "";
            $out = base64_decode($cypher);
            for($i = 0; $i < strlen($out); $i++){
                $output .= substr($out, $i, 1) xor substr($key, $spos, 1);
                $spos++;
                $spos >= strlen($key) ? $spos = 0 : "";
            }
            
            return base64_encode($output);
        }
    }