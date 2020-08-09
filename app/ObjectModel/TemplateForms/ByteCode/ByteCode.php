<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\ObjectModel\TemplateForms\ByteCode;

use App\DataModel\TransactionForm;
use Exception;

/**
 * Description of ByteCodeUnit
 *
 * @author jaredclemence
 */
class ByteCodeUnit {
    public $code;
    public $content;
    
    public function __construct($content) {
        $code = substr($content, 0, 2);
        $length = $this->binaryToInt( substr($content, 2, 8) );
        $content = substr($content, 10, $length);
        $this->setCode( $code );
        $this->setContent( $content );
    }
    
    public function __string() : string {
        $contentLength = strlen( $this->content );
        $byteCode = $this->code . $this->intToBinary($contentLength) . $this->content;
        return $byteCode;
    }
    
    protected function setCode( $code ){ $this->code = $code; }
    protected function setContent( $content ){ $this->content = $content; }
    
    private function binaryToInt( $string ) : int {
        return hexdec( $string );
    }
    
    private function intToBinary( $int, $length = 6 ) : string {
        $string = dechex( $int );
        if( strlen( $string ) > $length ) 
            throw new Exception("ByteCode fails because length of content exceeds length limitation of $length hex characters.");
        while( strlen($string) < $length ){
            $string = "0" . $string;
        }
        return $string;
    }
}
