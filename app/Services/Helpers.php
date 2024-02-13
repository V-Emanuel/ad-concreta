<?php

namespace App\Services;

trait Helpers
{
    public function removerAcentos($string) {
        // Remove acentos da string
        $string = preg_replace('/[áàãâä]/ui', 'a', $string);
        $string = preg_replace('/[éèêë]/ui', 'e', $string);
        $string = preg_replace('/[íìîï]/ui', 'i', $string);
        $string = preg_replace('/[óòõôö]/ui', 'o', $string);
        $string = preg_replace('/[úùûü]/ui', 'u', $string);
        $string = preg_replace('/[ç]/ui', 'c', $string);
    
        return $string;
    }
    
    public function removerCaracteresEspeciais($string) {
        // Remove caracteres especiais e deixa somente letras
        $string = preg_replace('/[^a-zA-Z]/', '', $string);
        return $string;
    }
}
