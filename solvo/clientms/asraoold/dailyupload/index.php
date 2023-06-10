<h1> Grooming Session </h1>
<h1> Date:- <?php echo date('d-m-Y') ?> </h1>
<div class="wrapper">
<form action="upload.php" method="post" enctype="multipart/form-data">
  <label for="image">Upload Image:</label>
  <input type="file" name="image" id="image"><br>
  <label for="date">Date:</label>
  <input type="date" name="date" id="date"><br>
  <label for="location">Location:</label>
  <input type="text" name="location" id="location"><br>
  <input type="submit" value="Upload">
</form>
</div>
<a href='../dashboard.php'><button>Go Back to Dashboard</button></a>

<style>
 button{
    background-color: #0077cc;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
  
}


<style>

body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
      font-size: 16px;
    }
    
    h1 {
      text-align: center;
      font-size: 36px;
      margin-bottom: 50px;
    }
    
    .wrapper {
      display: flex;
      justify-content: center;
      padding: 50px;
    }
    
    form label {
      display: block;
      margin-bottom: 10px;
    }
    
    form input[type="file"] {
      margin-bottom: 20px;
    }
    
    form input[type="submit"] {
      background-color: #0077cc;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    
    form input[type="submit"]:hover {
      background-color: #005ca3;
    }
</style>