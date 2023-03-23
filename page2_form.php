<?php
session_start();
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['names'])){
 if (empty($_POST['names'])
 || empty($_POST['email'])
 || empty($_POST['contact'])
 || empty($_POST['passwords'])
 || empty($_POST['confirm'])){ 
 // Setting error message
 $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: index.php"); // Redirecting to first page 
 } else {
 // Sanitizing email field to remove unwanted characters.
 $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
 // After sanitization Validation is performed.
 if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
 // Validating Contact Field using regex.
 if (!preg_match("/^[0-9]{10}$/", $_POST['contact'])){ 
 $_SESSION['error'] = "10 digit contact number is required.";
 header("location: index.php");
 } else {
 if (($_POST['passwords']) === ($_POST['confirm'])) {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 }
 } else {
 $_SESSION['error'] = "Password does not match with Confirm Password.";
 header("location: index.php"); //redirecting to first page
 }
 }
 } else {
 $_SESSION['error'] = "Invalid Email Address";
 header("location: index.php");//redirecting to first page
 }
 }
} else {
 if (empty($_SESSION['error_page2'])) {
 header("location: index.php");//redirecting to first page
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
        <title>Metronite</title>

 <style>
      .robotox{
            font-family: 'Roboto', sans-serif;
        }

        .rajdhani{
            font-family: 'Rajdhani', sans-serif;
        }
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
 </style>
 </head>
 <body class="bg-[#737471]" >
 
 <span id="error">
<?php
// To show error of page 2.
if (!empty($_SESSION['error_page2'])) {
 echo $_SESSION['error_page2'];
 unset($_SESSION['error_page2']);
}
?>
 </span>

 <div class="bg-white  md:max-w-screen-lg w-full mx-auto mt-[30px] md:rounded-md p-5 flex  drop-shadow-2xl justify-between h-[725px] blocko">
            
            <!-- <form action="page3_form.php" method="post" class="flex flex-col my-5 lg:w-[75%] w-full m-5 "> -->
        <form action="page3_form.php" method="post" class="flex flex-col w-full lg:w-[60%]">
                <img src="https://i.ibb.co/QrKf1pp/Rajdhani-Medium.png" alt="Rajdhani-Medium"  class="object-contain rounded-md hidden">

                <img src="https://i.ibb.co/RczHTK4/Screenshot-2023-03-21-201912-removebg-preview.png"

                alt="Screenshot-2023-03-21-201912-removebg-preview" class="mx-auto w-[100px] mb-[20px] mt-1 ">
                <label class="robotox lg:text-2xl text-lg">Religion</label>
                <input name="religion" id="religion" type="text" class="border rounded-md p-1 robotox mb-4 ">

                <label class="lg:text-2xl mb-0 robotox text-lg">Nationality </label>
                <input name="nationality" id="nationality" type="text" class="border rounded-md p-1  robotox mt-0 mb-4">

                <div class="flex  flex-col justify-between ">
                    <div class="min-w-[65%] mb-3">
                        <label class="robotox lg:text-2xl">Gender</label>
                        <input type="radio" name="gender" value="male" 
                            class="ml-5 mr-2"> <span class="text-lg">Male</span> 
                        <input type="radio" name="gender" value="female"
                            class="ml-5 mr-2"> <span class="text-lg">Female</span> 
                    </div>


                  

                    <div class="flex flex-col w-full">
                        <label class="robotox lg:text-2xl ">Qualification </label>
                        <select name="qualification" class="border rounded-md p-3 robotox mt-0 mb-4">
                            <option value="diploma" class=" border">Diploma </option>
                            <option value="bachelors" class=" border">Bachelors </option>
                            <option value="masters" class=" border">Masters </option>
                            <option value="postgraduation" value="">Doctorate
                            </option>
                            <option value="other" value="">Other </option>
                        </select>

                        <label class="robotox lg:text-2xl ">Experience </label>
                        <select name="experience" class="border rounded-md p-3  robotox mt-0 mb-4">

                            <option value="fresher" value="">Fresher </option>
                            <option value="less" value="">Less Than 2 year
                            </option>
                            <option value="more" value="">More Than 2 year</option>
                        </select>
                    </div>
                    
                </div>

                    <div class="flex mx-auto  md:justify-around  mt-3
                   md:w-[500px] ">
                        <input type="reset" value="Reset" class="bg-black text-white
                            robotox w-[100px] p-3 rounded-md md:mr-0 mr-[15%]"/>
                        <input type="submit" value="Next" class="bg-black text-white
                            robotox w-[100px] p-3 rounded-md"/>
                    </div>

            </form>

        <img  class="lg:block hidden" src="https://i.ibb.co/YyJkCV4/Untitled-design-12.png" alt="Untitled-design-12">
</div>
 
 </body>
</html>