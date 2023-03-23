
<!DOCTYPE HTML>
<html>
 <head>
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
        <title>Thank you</title>
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
 <div class=" w-full">
 <div >
 
 <?php
 session_start();
$host = "127.0.0.1";
$username = "root";
$password = "root";


try
{
    $conn = new PDO("mysql:host=$host;dbname=survey", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
 }
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

 if (isset($_POST['states'])) {
 if (!empty($_SESSION['post'])){
 if (empty($_POST['address1'])
 || empty($_POST['city'])
 || empty($_POST['pin'])
 || empty($_POST['states'])){ 
 // Setting error for page 3.
 $_SESSION['error_page3'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: page3_form.php"); // Redirecting to third page.
 } else {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 } 
 extract($_SESSION['post']); // Function to extract array.


 $sql = "INSERT INTO mpage (names,email,contact,passwords,religion,nationality,gender,qualification,experience,address1,address2,city,pin,states) 
 
 VALUES('$names',
 '$email',
 '$contact',
 '$passwords',
 '$religion',
 '$nationality',
 '$gender',
 '$qualification',
 '$experience',
 '$address1',
 '$address2',
 '$city',
 '$pin',
 '$states') ";

 $conn->query($sql);

$sql = "SELECT user_id, names, email FROM mpage";
$result = $conn->query($sql);
 


//  if ($sql) {
   
//   echo"<div> Thank You" .$names."</div>";

  
//  } else {
//  echo '<p><span>Form Submission Failed..!!</span></p>';
//  } 

 unset($_SESSION['post']); // Destroying session.
 }

 } else {
 header("location: index.php"); // Redirecting to first page.
 }
 } else {
 header("location: index.php"); // Redirecting to first page.
 }

 $sql = "SELECT user_id, names, email,contact FROM mpage ORDER BY user_id DESC LIMIT 5";

$result = $conn->query($sql);
 ?>

<div class="bg-white  md:max-w-screen-lg w-full mx-auto mt-[30px] md:rounded-md p-5 flex  drop-shadow-2xl  h-[725px] blocko flex-col justify-between">

<img src="https://i.ibb.co/RczHTK4/Screenshot-2023-03-21-201912-removebg-preview.png" alt="Screenshot-2023-03-21-201912-removebg-preview" class="mx-auto w-[100px] mb-[20px] mt-1 "  >
<?php
echo "<p class='md:text-5xl text-3xl font-bold text-center'>Thank You "
.$names." for completing the survey!</p>"

?>

<p class="text-2xl">Recent Survey Completers</p>

<?php        
echo "<table  class='h-[100px] w-full robotox'>
<tr class='border'>
<th class='border-r pl-2'>Name</th>
<th class='border-r pl-2'>Email</th>
<th class='border-r pl-2'>Contact</th>
";
// h-[550px]'>";
if ($result->rowCount() > 0 ) {
    // output data of each row
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr class='border'>
        <th class='border-r pl-2'>".$row['names']."</th>
        <th  class='border-r pl-2'>".$row['email']."</th>
        <th  class='border-r pl-2'>".$row['contact']."</th>
    </tr>";
        



    }

} else {
    echo "0 results";
}


echo "</table>";
?>
<img src="https://i.ibb.co/QrKf1pp/Rajdhani-Medium.png" alt="Rajdhani-Medium"  class="object-contain rounded-md">   
              
 </div>






 </div>
 </div>
 </body>
</html>
