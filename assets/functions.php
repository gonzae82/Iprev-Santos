<?php

function converteValor($valor) {
    // Remove todos os caracteres não numéricos, exceto a vírgula
    $valor = preg_replace('/[^\d,]/', '', $valor);
    
    // Substitui a vírgula por ponto para o formato do MySQL
    $valor = str_replace(',', '.', $valor);

    // Retorna o valor como float
    return (float)$valor;
}