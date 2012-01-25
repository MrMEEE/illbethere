<?php

/* Functions:
 
  userTypeAdd($name, $playing)
  userTypeChangePlaying($id, $playing)
  userTypeRemove($type, $by)
  userTypeGetName($id)
  userTypeGetId($name)
  userTypeIsPlaying($id)

*/


// Create user types...
function userTypeAdd($name, $playing){

  // $name is name of usertype and $playing is a bool which shows if usertype plays games..
 $result = mysql_query("SELECT * FROM usertypes WHERE name='$name'");
 if(mysql_num_rows($result)){
   // Usertype with this name already exists
   return "User type already exists...";
 }else{
   $result = mysql_query("INSERT INTO usertypes SET name='$name',playing='$playing'");
   if (!$result) {
     die('Invalid query: ' . mysql_error());
   }else{
     return "User type ".$name." added..";
   }    

 }
 
}

function userTypeChangePlaying($id, $playing){
 $result = mysql_query("SELECT * FROM usertypes WHERE id='$id'");
 if(mysql_num_rows($result)){
  $result = mysql_query("UPDATE usertypes SET playing='$playing' WHERE id='$id'");
  if (!$result) {
   die('Invalid query: ' . mysql_error());
  }
 }else{
  return "Type with id: ".$id." doesn't exists.."; 
 }

}

// Remove user type..
function userTypeRemove($type, $by){

// $type is the name or id of the type to be removed, $by selects whether type should be removed by id or name..

 if($by == "id"){
    $query = "SELECT * FROM usertypes WHERE id='$type'";
 }elseif($by == "name"){
    $query = "SELECT * FROM usertypes WHERE name='$type'";
 }else{
    return "Invalid identifier should be 'name' or 'id'..";
 }

 $result = mysql_query($query);
 if(mysql_num_rows($result)){
    $query = str_replace("SELECT *", "DELETE", $query);
    $result = mysql_query($query);
    
    return "Usertype removed..";
 }else{
    return "Usertype not found..";
 }
}

function userTypeGetId($name){

 $result = mysql_query("SELECT * FROM usertypes WHERE name='$name'");
 if(mysql_num_rows($result)){
  $type = mysql_fetch_assoc($result);
  return $type['id'];
 }else{
  return "Type with name: ".$name." doesn't exists.."; 
 }

}

function userTypeGetName($id){
  
 $result = mysql_query("SELECT * FROM usertypes WHERE id='$id'");
 if(mysql_num_rows($result)){
  $type = mysql_fetch_assoc($result);  
  return $type['name'];
 }else{
  return "Type with id: ".$id." doesn't exists..";
 }
}

function userTypeIsPlaying($id){

 $result = mysql_query("SELECT * FROM usertypes WHERE id='$id'");
 if(mysql_num_rows($result)){
  $type = mysql_fetch_assoc($result);
  return $type['playing'];
 }else{
  return "Type with id: ".$id." doesn't exists..";
 }

}

?>