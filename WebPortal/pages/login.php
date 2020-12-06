<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/WebPortal/style/login.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src= "https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script src= "https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script src= "https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="/WebPortal/scripts/JS.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>

 <script>
   function onSubmit(token) {
     document.getElementById("loginForm").submit();
   }
 </script>
<?php
 include('../php/register.php') ; ?>
</head>
<body>

<div class="topnav" id="myTopnav">

  <a href="logout.php">Logout</a>
  <a href="login.php">Login/Register</a>
  <a href="about.php">About</a>
  <a href="results.php">Auction Results</a>
  <a href="catologue.php" class="active">Catologue</a>

  <a id = "siteName" href="catologue.php">Car Auction Web Portal</a>



  <a href="javascript:void(0);" class="icon" onclick="responsiveNav()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div id = "container">

<div id= "pageHeader">
  <h2 id ="pageTitle">Login Page</h2>
  <p id = "pageDesc">Login in below or click here to register</p>
  <hr class = "divider">


</div>
<div id= "loginForm">
    <form class="modal-content animate" action="" method="post">
      <div class="container">
        <label for="uname"><b>Email:</b></label>
        <input type="text" placeholder="Enter Email" name="loginpassword" required>
        <label for="psw"><b>Password:</b></label>
        <input type="password" placeholder="Enter Password" name="loginusername" required>
        <button class="g-recaptcha"
        data-sitekey="reCAPTCHA_site_key"
        data-callback='onSubmit'
        data-action='submit' type="submit" name = "loginSubmit">Login</button>
        <p id ="showRegister" onclick= showRegister() align="center"> <u>Register an account</u></p>
      <P></p>
        <di
      </div>


    </div>

<div id = "registerContainer">
  <h2 id ="pageTitle">Register Page</h2>
  <p id = "pageDesc">Register an account below:</p>
    <hr class = "divider">
    <div class = "modal-content animate">
<div id ="registerForm">

  <div id="app">

  </div>
  <p id ="showRegister" onclick= showLogin() align="center"> <u>Login for an account</u></p>

</div>
</div>
</div>

<script type="text/babel">


class BasicForm extends React.Component {

  constructor(props) {
    super(props);

    this.state = {
      name2: '',
      phoneNo: '',
      username: '',
      password: '',
      passwordConfirm: ''

    };

    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleChange(e) {
    e.target.classList.add('active');

    this.setState({
      [e.target.name]: e.target.value
    });

    this.showInputError(e.target.name);
  }

  handleSubmit(e) {
    e.preventDefault();
    console.log(e);

    console.log('component state', JSON.stringify(this.state));

    if (!this.showFormErrors()) {
      console.log('form is invalid: do not submit');
    } else {
      console.log('form is valid: submit');
    }
  }

  showFormErrors() {
    const inputs = document.querySelectorAll('input');
    let isFormValid = true;

    inputs.forEach(input => {
      input.classList.add('active');

      const isInputValid = this.showInputError(input.name);
      console.log(input.name);
      console.log(isInputValid);

      if (!isInputValid) {
        isFormValid = false;
      }
    });



    return isFormValid;
  }

  showInputError(refName) {

    const validity = this.refs[refName].validity;
    const label = document.getElementById(`${refName}Label`).textContent;
    const error = document.getElementById(`${refName}Error`);
    const isPassword = refName.indexOf('password') !== -1;
    const isPasswordConfirm = refName === 'passwordConfirm';
    const isPhone = refName === 'phoneNo';
    const isName = refName === 'name2';
    const isUSer = refName === 'username2';




    if (isPasswordConfirm) {
      if (this.refs.password.value !== this.refs.passwordConfirm.value) {
        this.refs.passwordConfirm.setCustomValidity('Passwords do not match');
      } else {
        this.refs.passwordConfirm.setCustomValidity('');
      }
    }

    if (isName){
      if (hasNumber(this.refs.name2.value)){
        this.refs.name2.setCustomValidity('Name cannot contain numbers');
      } else  {
          this.refs.name2.setCustomValidity('');
      }

    }

    if (isPhone) {
      if (!isNumeric(this.refs.phoneNo.value)){
        this.refs.phoneNo.setCustomValidity('Phone number cannot contain letters');
      } else  {
          this.refs.phoneNo.setCustomValidity('');
      }

    }

    function isNumeric(n) {
      return !isNaN(parseFloat(n)) && isFinite(n);
    }

    function hasNumber(myString) {
      return /\d/.test(myString);
    }


    if (!validity.valid) {
      if (validity.valueMissing) {
        error.textContent = `${label} is a required field`;
      } else if (validity.typeMismatch) {
        error.textContent = `${label} should be a valid email address`;
      } else if (isPassword && validity.patternMismatch) {
        error.textContent = `${label} should be longer than 4 characters`;
      } else if (isPasswordConfirm && validity.customError) {
        error.textContent = 'Passwords do not match';
      } else if (isName && validity.customError) {
        error.textContent =  `${label} should not include numbers`;
      } else if (isPhone && validity.customError){
        error.textContent =  `${label} number should not include letters`;
      }



      return false;

    }

    error.textContent = '';
    return true;
  }

  render() {
    return (
      <form novalidate action="" method="post">
        <div className="form-group">
          <label id="usernameLabel">Email:</label>
          <input className="form-control" id = "emailInput"
            type="email"
            name="username"
            placeholder="example@email.com"
            ref="username"
            value={ this.state.username }
            onChange={ this.handleChange }
            required />
          <div className="error" id="usernameError" />
        </div>
        <div className="form-group">
          <label id="name2Label">Name</label>
          <input className="form-control"
            type="text"
            placeholder="John Doe"
            name="name2"
            ref="name2"
            value={ this.state.name2 }
            onChange={ this.handleChange }
            required />
          <div className="error" id="name2Error" />
        </div>
        <div className="form-group">
          <label id="phoneNoLabel">Phone</label>
          <input className="form-control"
            type="text"
            name="phoneNo"
            ref="phoneNo"
            placeholder="075086574343"
            value={ this.state.phoneNo }
            onChange={ this.handleChange }
            required />
          <div className="error" id="phoneNoError" />
        </div>
        <div className="form-group">
          <label id="passwordLabel">Password</label>
          <input className="form-control"
            type="password"
            placeholder="********"
            name="password"
            ref="password"
            value={ this.state.password }
            onChange={ this.handleChange }
            pattern=".{5,}"
            required />
          <div className="error" id="passwordError" />
        </div>
        <div className="form-group">
          <label id="passwordConfirmLabel">Confirm Password</label>
          <input className="form-control"
            type="password"
            placeholder="********"
            name="passwordConfirm"
            ref="passwordConfirm"
            value={ this.state.passwordConfirm }
            onChange={ this.handleChange }
            required />
          <div className="error" id="passwordConfirmError" />
        </div>


         <input name="submit" id = "sub" type="submit" value="Register"/>
         <div class="error">
          <?php foreach ($errors as $error) : ?>
            <p><?php echo htmlspecialchars($error) ?></p>
          <?php endforeach ?>
         </div>

      </form>
    );
  }
}

class App extends React.Component {
  render() {
    return (
      <div className="container">
        <BasicForm />
      </div>
    );
  }
}

ReactDOM.render(<App />, document.getElementById('app'));

</script>

</div>

</body>
