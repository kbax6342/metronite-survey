<?php
session_start(); // Session starts here.
?><!DOCTYPE HTML>
<html>
 <head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=d, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&family=Roboto:ital,wght@0,300;0,500;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .robotox{
            font-family: 'Roboto', sans-serif;
        }

        .rajdhani{
            font-family: 'Rajdhani', sans-serif;
        }
    </style>
 </head>
 <body class="bg-[#737471]">



 <span id="error">
 <!---- Initializing Session for errors --->
 <?php
 if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 unset($_SESSION['error']);
 }
 ?>

 
 </span>
 <div class="bg-white  md:max-w-screen-lg w-full mx-auto mt-[30px] md:rounded-md p-5 flex  drop-shadow-2xl justify-between h-[725px]">
        <div class=" md:w-[50%] w-full mx-auto">
            <img src="https://i.ibb.co/RczHTK4/Screenshot-2023-03-21-201912-removebg-preview.png" alt="Screenshot-2023-03-21-201912-removebg-preview" class="mx-auto w-[100px] mb-[20px] "  >
            <h1 class="text-5xl font-bold uppercase rajdhani text-center ">Metronite</h1>
            <form action="page2_form.php" method="post" class="flex flex-col  my-5">
                <label class="robotox text-base font-medium lg:text-2xl md:text-xl ">Full Name</label>
                <input name="names" type="text" placeholder="" required class="border rounded-md p-2 md:w-[90%] robotox mb-3">
                <label class="robotox text-base font-medium lg:text-2xl md:text-xl">Email </label>
                <input name="email" type="email" placeholder="Ex-anderson@gmail.com" required  class="border rounded-md p-2 md:w-[90%] w-[100%] mb-3">
                <label class="robotox text-base font-medium lg:text-2xl md:text-xl">Contact </label>
                <input name="contact" type="text" placeholder="10-digit number" required  class="border rounded-md p-2 md:w-[90%] w-[100%] mb-3">
                <label class="robotox text-base font-medium lg:text-2xl md:text-xl">Password </label>
                <input name="passwords" type="Password" placeholder="*****"   class="border rounded-md p-2 md:w-[90%] w-[100%] mb-3"/>
                <label class="robotox text-base font-medium lg:text-2xl md:text-xl">Re-enter Password </label>
                <input name="confirm" type="password" placeholder="*****"  class="border rounded-md p-2 md:w-[90%] w-[100%] mb-3">
                <div class="flex mx-auto pt-5 justify-around md:w-[300px] w-full">
                    <input type="reset" value="Reset" class="bg-black text-white robotox w-[100px] p-3 rounded-md"/>
                    <input type="submit" value="Next" class="bg-black text-white robotox w-[100px] p-3 rounded-md"/>
                </div>
               
                </form>
        </div>
        <div class="md:flex justify-end hidden">
            <img src="https://images.pexels.com/photos/9595073/pexels-photo-9595073.jpeg?auto=compress&cs=tinysrgb&w=400" alt="" class="rounded-lg h-auto ">
        </div>
        
    </div>
 </div>
 </div>
 </body>
</html>