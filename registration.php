<html xmlns="http?//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset-utf-8" />
<title>Register for web App</title>
</head>

<body>
  <div id="register">
    <form method="post" action"">
      <h2>Register</h2>
        <p>
          <label for="fName">First Name:  </label>
          <input type="text" name="First Name" />
        </p>
        <p>
          <label for="lName">Last Name: </label>
          <input type ="text" name="Last Name" />
        </p>
        <p>
          <label for="email">Email: </label>
          <input type ="text" name="Email" />
        </p>
        <p>
          <label for="city">City: </label>
          <input type ="text" name="City" />
        </p>
        <p>
          <label for="state">State: </label>
          <input type ="text" name="State" />
        </p>

        <p>
          <input type="submit" id="submit" value="Finish" name="Finish" >
        </p>


      </form>
      <?php if(isset($_POST['Finish']))header("Location: test.php");
      ?>
  </div>
</body>
</html>
