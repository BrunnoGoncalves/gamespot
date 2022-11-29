<?php 


function upload_file($arqi, $allowed_ex, $path){
 
   $arqi_nome = $arqi['name'];
   $tmp_name  = $arqi['tmp_name'];
   $error    = $arqi['error'];

if($error==0){

    $arqi_ex=pathinfo($arqi_nome,PATHINFO_EXTENSION);


    $arqi_ex_lc=strtolower($arqi_ex);

    if(in_array($arqi_ex_lc,$allowed_ex)){
$novo_arqi_nome=uniqid('',true).'.'.$arqi_ex_lc ;
$arqi_upload_path='../imagens/'.$path.'/'.$novo_arqi_nome;

move_uploaded_file($tmp_name,$arqi_upload_path);
$sm['status']='success';
$sm['data']=$novo_arqi_nome;
return $sm;
    }else{
        $sm['status']='error';
        $em['data']='Você não pode enviar esse tipo de arquivo';
        return $em;}
}else{

    $em['status']='error';
    $em['data']='Ocorreu um erro durante o envio';
    return $em;
}




}