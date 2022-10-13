<?php
session_start();
if(isset($_POST['set'])){
   $bg = $_POST["bg"];
   $bg = str_replace("#","",$bg);
   $color = $_POST["color"];
   $color = str_replace("#","",$color);
   $font = $_POST["font"];
   $font = ucfirst($font);
   $text = $_POST["text"];
   header("Location:index.php?bg=$bg&color=$color&font=$font&text=$text");
}
else if(isset($_POST["save"])){
    $_SESSION["color1"] = $_POST["color"];
    $_SESSION["bg1"] = $_POST["bg"];
    $_SESSION["font"] = $_POST["font"];
    $_SESSION["text"] = $_POST["text"];
    header("Location: index.php");
}
else if(isset($_POST['reset'])){
    unset($_SESSION["color1"]);
    unset($_SESSION["bg1"]);
    unset($_SESSION["font"]);
    unset($_SESSION["text"]);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notepad+-</title>
    <link rel="stylesheet" href="style.css">
    <style>
       #form{
           width: 90%;
           position: relative;
           margin-left: 50%;
           transform: translateX(-50%);
           
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>+-+NOTEPAD+-+</h1>
    <form  method ="post" enctype = "multipart/form-data" id="form">
        <div>
        <label for="bg">Background Color: </label>
      <input type="color" name="bg" id="bg" value="<?php if(isset($_GET["bg"])){ echo "#".$_GET["bg"];}elseif(isset($_SESSION["bg1"])){echo $_SESSION["bg1"];}else{echo "#ffffff";}?>">
    
    <label for="color">Select text color: </label>
      <input type="color" name="color" id="color" value="<?php if(isset($_GET["color"])){ echo "#".$_GET["color"];}elseif(isset($_SESSION["color1"])){echo $_SESSION["color1"];}else{echo "#000000";}?>">
     
    <label for="font">Select font style: </label>
     <select name="font" id="font">
        <option value="<?php if(isset($_GET["font"])){echo $_GET["font"];}elseif(isset($_SESSION["font"])){echo $_SESSION["font"];}else{echo "arial";}?>">
        <?php if(isset($_GET["font"])){echo ucfirst($_GET["font"]);}elseif(isset($_SESSION["font"])){echo ucfirst($_SESSION["font"]);}else{echo "Arial";}?></option>
        <option value="fantasy">Fantasy</option>
        <option value="cursive">Cursive</option>
        <option value="roboto">Roboto</option>
     </select>
     <input type="submit" name = "set" value="Set" id= "set">
     </div>
      <textarea name="text" id="text" placeholder = "Type your text here" cols="50" rows="10" value = "" style = "
      background-color: 
      <?php 
      if(isset($_GET["bg"])){
        echo "#".$_GET["bg"];
        }elseif(isset($_SESSION["bg1"])){ 
          echo $_SESSION["bg1"];
        }else{echo "white";}?>;
        color:
        <?php 
      if(isset($_GET["color"])){
        echo "#".$_GET["color"];
        }elseif(isset($_SESSION["color1"])){ 
          echo $_SESSION["color1"];
        }else{echo "black";}?>;
        font-family:
        <?php 
      if(isset($_GET["font"])){
        echo  $_GET["font"];
        }elseif(isset($_SESSION["font"])){ 
          echo $_SESSION["font"];
        }else{echo "arial";}?>;"><?php if(isset($_GET["text"])){echo $_GET["text"];}elseif(isset($_SESSION["text"])){echo $_SESSION["text"];}?></textarea>
      <input type="submit" name = "save" value="Save" class= "save">
      <input type="submit" name = "reset" value="Reset" id= "submit">
    </form>
    </div>
</body>
</html>
