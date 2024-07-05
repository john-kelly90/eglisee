<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="./assets/fontawesome/css/all.css">

 <style>
 body{
   background-image: url('/images/images/background.webp');
 }
 .btn{

    margin-top: 5px;
    background-color: chocolate;
    color: white;
    width: 220px;
    height: 100px;
    border: 1px solid chocolate;
    border-radius: 10px;
   }
 .marque{
   width: 100%;
   border: 2px solid grey;
   border-bottom-left-radius: 10px ;
   border-bottom-right-radius: 10px ;
   padding: 10px;
   color: chocolate ;
   text-shadow: 0 2px 2px #777;
   
 }
 .loginfo{
   width: 100%;
   height: 100%;
   background-color:white;
   margin:5px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
 }
  .logo{
   float: right;
   margin: 50px;
   width: 390px;
   height: 390px;
   margin-top:5px ;
 }
 .messages{
   margin-top: 30px;
   font-size: 30px;
   color:blue;
 }
 a{
   text-decoration: none;
 }
 .connection{
   margin-left:50px;
 }
 img{
   margin-top: 50px;
   float: right;
   width: 300px;
   height: 300px;
   
 }
@media(max-width:412px){

  .btn{

margin-top: 5px;
background-color: chocolate;
color: white;
width:140px;
height: 65px;
border: 1px solid chocolate;
border-radius: 10px;
}
.marque{
width: 100%;
border: 2px solid grey;
border-bottom-left-radius: 10px ;
border-bottom-right-radius: 10px ;
padding: 10px;
color: chocolate ;
text-shadow: 0 2px 2px #777;

}

.logo{
float: right;
margin: 5px;
width: 50px;
height: 50px;
margin-top:2px ;
margin-right: 2px;
}
.messages{
margin-top: 5px;
font-size: 15px;
color:blue;
}
a{
text-decoration: none;
}
.connection{
margin-left:5px;

}
img{
margin-top: 15px;
float: right;
width: 100px;
height: 150px;

}

}

          
 
 
</style>
</head>
<body>
  
<div class="marque">
 <marquee> <strong><i>BIENVENUE À L'ÉGLISE ADVENTISTE DU 7éme JOUR DE JABE</i></strong>
 </marquee>
</div>
<hr>
<div class="loginfo">
  <div class="logo">
    <img src="./images/images/diva.jpeg" alt="" srcset="">
  </div>
  
    <div class="connection">
    <button class="btn btn-success">
     <i class="fa fa-school" ></i> <a href="admilogin.php">Se connecter en tant qu'administrateur </a>
    </button>
    <br>
    <button class="btn btn-success"><i class="fa fa-user"></i>
      <a href="users/Authentification.php">Se connecter en tant qu'utilisateur </a>
    </button>
    </div>
  </div>
  <br>
</div>
</body>
</html>