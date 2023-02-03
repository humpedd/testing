<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Home</title>
  <link
    href="./style.css"
    rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body class="bg-white center">

<!-- ADMIN USER -->
  <div  class="modal" id="myModal1">
    <div class="div-block-4 w-clearfix">
      <span class="close1">&times;</span>
      <div class="mt-85 px-100 w-form">
      <form id="registration" action=THESIS_SUBMIT_ADMIN_LOGIN.php method="POST">
          <div>
            <label for="AdminID">ADMIN ID</label>
            <br>
            <input type="text" class="mb-2 full-field" name="AdminID" value=""/>
          </div>
          <div>
            <label for="AdminPass" class="text-label">PASSWORD</label>
            <br>
            <input type="password" class="mb-1 full-field"  name="AdminPass" id="AdminPassl" />
          </div>
          <br>
          <input type="submit" value="Submit" class="button mt-1 w-button no-border" />
        </form>
      </div>
    </div>
  </div>
<!-- REGULAR USER -->
  <div class="modal" id="myModal3">
    <div class="div-block-4 w-clearfix">
      <span class="close3">&times;</span>
      <div class="mt-85 px-100 w-clearfix w-form">
      <form id="registration" action=THESIS_SUBMIT_REG_LOGIN.php method="POST">
          <div>
            <label for="EMPLOYEE_ID">USER ID</label>
            <br>
            <input type="text" class="mb-2 full-field" name="EMPLOYEE_ID" value=""/>
          </div>
          <div>
            <label for="EMPLOYEE_PASSWORD" class="text-label">PASSWORD</label>
            <br>
            <input type="password" class="mb-1 full-field"  name="EMPLOYEE_PASSWORD" value="" />
          </div>
          <br>
          <input type="submit" value="Submit" class="button mt-1 w-button no-border" />
      <!-- CHANGE PASSWORD -->
        </form>
        <form id="registration" action=test_changePass.php method="POST">
            <input type="submit" value="Reset Password" class="button mt-1 w-button no-border" />
          </form>
      </div>
    </div>
  </div>
  <div class="block-weighted p-2 content-hcenter bg-light box mt-5">
    <button data-w-id="f9ff6491-f08a-df1e-420c-16bceb9445ee" id="myBtn1"
       class="weight-30 bg-white content-center link w-inline-block no-border"><img
        src="https://uploads-ssl.webflow.com/63562e045ee93e1be0a16354/63943a318bad1a9015074683_4918935_guard_protect_protection_safety_security_icon.png"
        loading="lazy" alt="Icon" class="width-30 my-1" />
      <h1 class="h4">Admin</h1>
  </button>
    <a data-w-id="7e9cbb9b-96d6-8c24-58fc-e234254125fa" id="myBtn2"
      href="./THESIS_ADD_REGULAR_ACC.php"
      class="weight-30 bg-white content-center link mx-2 w-inline-block no-border"><img
        src="https://uploads-ssl.webflow.com/63562e045ee93e1be0a16354/6394368ed2ca39a7d2f981f6_216487_add_user_icon.png"
        loading="lazy" alt="Icon" class="width-30 my-1" />
      <h1 class="h4">Register</h1>
</a>
    <button data-w-id="53636997-1bed-3c16-d8bd-bd9b96a87a1f" id="myBtn3"
      class="weight-30 bg-white content-center link w-inline-block no-border"><img
        src="https://uploads-ssl.webflow.com/63562e045ee93e1be0a16354/6394368e2ca72aa54c9f3ea0_216496_user_icon.png"
        loading="lazy" alt="Icon" class="width-30 my-1" />
      <h1 class="h4">Regular User</h1>
</button>
  </div>
  <script>
    
    var modal1 = 
    document.getElementById("myModal1");
    var modal3 = 
    document.getElementById("myModal3");

    var btn1 =
    document.getElementById("myBtn1");
    var btn3 =
    document.getElementById("myBtn3");

    var span1 = 
    document.getElementsByClassName("close1")[0];
    var span3 = 
    document.getElementsByClassName("close3")[0];

    btn1.onclick = function() {
      modal1.style.display = "block";
    }
    btn3.onclick = function() {
      modal3.style.display = "block";
    }
    span1.onclick = function() {
      modal1.style.display = "none";
    }
    span3.onclick = function() {
      modal3.style.display = "none";
    }
  </script>

</body>

</html>
