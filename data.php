<?php
function calculo_idade($data)
{
    $dia = date('d');
    $mes = date('m');
    $ano = date('Y');
    
    $nascimento = explode('-', $data);
    $dianasc = ($nascimento[2]);
    $mesnasc = ($nascimento[1]);
    $anonasc = ($nascimento[0]);
    
 
    $idade = $ano - $anonasc; 
    if ($mes < $mesnasc) 
    {
        $idade--;
        return $idade;
    } elseif ($mes == $mesnasc && $dia <= $dianasc)
    {
        $idade--;
        return $idade;
    } else 
    {
        return $idade;
    }
}
