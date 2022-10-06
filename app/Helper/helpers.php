<?php

function notif(){

	if (session('notif')) {
		echo '<div class="alert alert-';
		if (session('notif_type')) {
			echo session('notif_type')." ";
		}else{
			echo 'success ';
		}
		echo 'alert-dismissible fade show" role="alert">';
		echo session('notif');
		echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
	}

}

function delete_storage($location){  
  if(\Storage::exists($location)){
    return \Storage::delete($location);
  }else{
	  return false;
  }
} 


function create_slug($text, string $divider = '-'){
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}


function role_diizinkan($string){
    $string_array = explode("|",$string);
    $role = session('level');
    if (!in_array($role, $string_array)) {
        abort(404);
    }
}

function kelola_artikel(){
  if (@session('kelola_artikel') == false) {
    abort(404);
  }
}