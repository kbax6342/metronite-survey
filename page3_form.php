<?php
session_start();
// Checking second page values for empty, If it finds any blank field then redirected to second page.
 if (isset($_POST['gender'])){
 if (empty($_POST['gender'])
 || empty($_POST['nationality'])
 || empty($_POST['religion'])
 || empty($_POST['qualification'])
 || empty($_POST['experience'])){ 
 $_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
 header("location: page2_form.php"); // Redirecting to second page. 
 } else {
 // Fetching all values posted from second page and storing it in variable.
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 }
 }
} else {
 if (empty($_SESSION['error_page3'])) {
 header("location: index.php");// Redirecting to first page.
 }
}
?>
<!DOCTYPE HTML>
<html>
 <head>
 <title>PHP Multi Page Form</title>
 <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=d, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"
            rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>

        <script src="https://kit.fontawesome.com/dd73797671.js"
            crossorigin="anonymous"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
            crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <title>Document</title>
 </head>
 <body style="background-color:
        #737471 ;">
 <div >
 <div >

 <span id="error">
    
 <style>
       @keyframes slideInRight {
        0% {
          transform: translateX(100%);
        }
        100% {
          transform: translateX(0);
        }
      }
      .blocko {
        animation: 1s ease-out 0s 1 slideInRight;
        background: #666;
        padding: 40px;
      }

  
        .robotox{
            font-family: 'Roboto', sans-serif;
        }

        .rajdhani{
            font-family: 'Rajdhani', sans-serif;
        }
  
    

      
 </style>
 <?php
 if (!empty($_SESSION['error_page3'])) {
 echo $_SESSION['error_page3'];
 unset($_SESSION['error_page3']);
 }
 ?>
 </span>
 <div class="bg-white lg:w-[90%] md:w-[90%] w-full mx-auto mt-[30px]
md:rounded-md flex  p-2 drop-shadow-2xl blocko max-w-screen-lg lg:justify-around md:justify-between

h-[725px]">
<img src="https://i.ibb.co/dQCTj0X/Untitled-design-13.png" alt="Untitled-design-13" class="hidden md:block mr-4 object-contain w-[50%]" >

      <form action="page4_form.php" method="post" class="w-full px-4" >
      <img src="https://i.ibb.co/RczHTK4/Screenshot-2023-03-21-201912-removebg-preview.png" alt="Screenshot-2023-03-21-201912-removebg-preview" class="mx-auto w-[100px] mb-[20px] mt-1 "  >
        <p class="text-3xl"> Address:</p>
        <br>
        <div class="flex flex-col">
            <label class="robotox lg:text-2xl">Address Line 1</label>
            <input name="address1" id="address1" type="text"   class="border rounded-md p-1  robotox ">
        </div>

        
        <br>
        <div class="flex flex-col">
            <label class="robotox lg:text-2xl">Address Line 2</label>
            <input name="address2" id="address2" type="text"   class="border rounded-md p-1  robotox  ">
        </div>
   
        <br>
        <div class="flex flex-col">
            <label class="robotox lg:text-2xl">City</label>
            <input name="city" id="city" type="text" size="25" required  class="border rounded-md p-1  robotox mb-4 ">
        </div>
        
       <div class="flex flex-col">
            
        <label class="robotox lg:text-2xl">Pin Code</label>
        <input name="pin" id="pin" type="text" size="10" required  class="border rounded-md p-1  robotox mb-4 ">
       </div>

       <div class="flex flex-col">
        <label class="robotox lg:text-2xl">State </label>
        <input name="states" id="state" type="text" size="30" required  class="border rounded-md p-1  robotox mb-4 ">
       </div>


        

       <div class="flex mx-auto md:justify-around  mt-3  md:w-full w-[50%]">
       <input type="reset" value="Reset" class="bg-black text-white
           robotox w-[100px] p-3 rounded-md md:mr-0 mr-[15%]"/>
       <input type="submit" value="Submit" class="bg-black text-white
           robotox w-[100px] p-3 rounded-md"/>
   </div>
</form>

</div>

 </div> 
 </div>
 </body>
</html>