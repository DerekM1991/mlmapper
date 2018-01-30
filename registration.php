<?php 
session_start();
require_once 'Mysql.php';

if($_POST && !empty($_POST['fName']) &&!empty($_POST['lName']) &&!empty($_POST['cName'])&&!empty($_POST['number']) &&!empty($_POST['Email']) &&!empty($_POST['City']) &&!empty($_POST['state']) &&!empty($_POST['Postal_Code']) &&!empty($_POST['pwd'])) {
  
$mysql = New Mysql();
$mysql->add_User($_POST['fName'], $_POST['lName'], $_POST['cName'], $_POST['number'], $_POST['Email'], $_POST['City'], $_POST['state'], $_POST['Postal_Code'], $_POST['pwd'], $_POST['referral_Code']);
        
    }
        ?>

<html xmlns="http?//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset-utf-8" />
<title>Register for web App</title>
</head>

<body>
  <div id="register">
    <form method="post" action"">
      <h2>Register</h2>
      <?php echo "Please fill in all fields";?>

        <p>
          <label for="fName">First Name:  </label>
          <input type="text" name="fName" required/>
        </p>
        <p>
          <label for="lName">Last Name:  </label>
          <input type="text" name="lName" required/>
        </p>
        <p>
          <label for="company">MLM Company Name: </label>
          <input type ="text" name="cName" required/>
        </p>
        <p>
          <label for="number">Phone Number: </label>
          <input type ="text" name="number" required/>
        </p>
        <p>
          <label for="email">Email: </label>
          <input type ="text" name="Email" required/>
        </p>
        <p>
          <label for="city">City: </label>
          <input type ="text" name="City" required/>
        </p>
        <p>
          <label for="state">State: </label>
          <select name="state" required><?php echo StateDropdown(null, 'mixed'); ?> </select>
        </p>
        <p>
          <label for="Postal_Code">Postal Code:  </label>
          <input type="text" name="Postal_Code" required/>
        </p>

        <p>
          <label for="pwd">Password: </label>
          <input type ="password" name="pwd" required/>
        </p>
        <p>
          <label for="cPwd">Confirm Password: </label>
          <input type ="password" name="cPassword" required/>
        </p>
        <p>
          <label for="referral_Code">Referral Code: </label>
          <input type ="text" name="referral_Code" />
        </p>





        <p>
          <input type="submit" id="submit" value="Finish" name="Finish" >
        </p>
        







      </form>

      

        



<?php

//function for state dropdown selector
        function StateDropdown($post=null, $type='abbrev') {
	$states = array(
		array('AK', 'Alaska'),
		array('AL', 'Alabama'),
		array('AR', 'Arkansas'),
		array('AZ', 'Arizona'),
		array('CA', 'California'),
		array('CO', 'Colorado'),
		array('CT', 'Connecticut'),
		array('DC', 'District of Columbia'),
		array('DE', 'Delaware'),
		array('FL', 'Florida'),
		array('GA', 'Georgia'),
		array('HI', 'Hawaii'),
		array('IA', 'Iowa'),
		array('ID', 'Idaho'),
		array('IL', 'Illinois'),
		array('IN', 'Indiana'),
		array('KS', 'Kansas'),
		array('KY', 'Kentucky'),
		array('LA', 'Louisiana'),
		array('MA', 'Massachusetts'),
		array('MD', 'Maryland'),
		array('ME', 'Maine'),
		array('MI', 'Michigan'),
		array('MN', 'Minnesota'),
		array('MO', 'Missouri'),
		array('MS', 'Mississippi'),
		array('MT', 'Montana'),
		array('NC', 'North Carolina'),
		array('ND', 'North Dakota'),
		array('NE', 'Nebraska'),
		array('NH', 'New Hampshire'),
		array('NJ', 'New Jersey'),
		array('NM', 'New Mexico'),
		array('NV', 'Nevada'),
		array('NY', 'New York'),
		array('OH', 'Ohio'),
		array('OK', 'Oklahoma'),
		array('OR', 'Oregon'),
		array('PA', 'Pennsylvania'),
		array('PR', 'Puerto Rico'),
		array('RI', 'Rhode Island'),
		array('SC', 'South Carolina'),
		array('SD', 'South Dakota'),
		array('TN', 'Tennessee'),
		array('TX', 'Texas'),
		array('UT', 'Utah'),
		array('VA', 'Virginia'),
		array('VT', 'Vermont'),
		array('WA', 'Washington'),
		array('WI', 'Wisconsin'),
		array('WV', 'West Virginia'),
		array('WY', 'Wyoming')
	);

	$options = '<option value=""></option>';

	foreach ($states as $state) {
		if ($type == 'abbrev') {
    	$options .= '<option value="'.$state[0].'" '. check_select($post, $state[0], false) .' >'.$state[0].'</option>'."\n";
    } elseif($type == 'name') {
    	$options .= '<option value="'.$state[1].'" '. check_select($post, $state[1], false) .' >'.$state[1].'</option>'."\n";
    } elseif($type == 'mixed') {
    	$options .= '<option value="'.$state[0].'" '. check_select($post, $state[0], false) .' >'.$state[1].'</option>'."\n";
    }
	}

	echo $options;
}

/**
 * Check Select Element
 *
 * @param string $i, POST value
 * @param string $m, input element's value
 * @param string $e, return=false, echo=true
 * @return string
 */
function check_select($i,$m,$e=true) {
	if ($i != null) {
		if ( $i == $m ) {
			$var = ' selected="selected" ';
		} else {
			$var = '';
		}
	} else {
		$var = '';
	}
	if(!$e) {
		return $var;
	} else {
		echo $var;
	}
}
      ?>
  </div>
</body>
</html>