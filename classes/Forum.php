<?php

class Forum {


    public static function generateSlug($str){
        $slug = mb_strtolower($str);
        $slug = preg_replace('/(â|á|â)/','a',$slug);
        $slug = preg_replace('/(ê|é)/','e',$slug);
        $slug = preg_replace('/(í)/','i',$slug);
        $slug = preg_replace('/(ó|ô)/','o',$slug);
        $slug = preg_replace('/(ú)/','u',$slug);
        $slug = preg_replace('/(?|\/|!|#)/','',$slug);
        $slug = preg_replace('/( )/','-', $slug);
        $slug = strtolower($slug);

        return $slug;
    }

    public static function upload_img($file,$dir){
        if($file['name'] != ''){
            if($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png' || $file['type'] == 'image/webp'){
                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $newName = substr($file['name'],0,-5) . uniqid() . '.' . $extension;
                move_uploaded_file($file['tmp_name'], $dir . $newName);
                return $newName;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function deletarFoto($foto){
        @unlink('imgs/' . $foto);
        
    }


}

?>