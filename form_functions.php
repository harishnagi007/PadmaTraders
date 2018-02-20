<?php

function getNewUserForm()
{
$newuser="'add_new_user_form'";

echo '
<div id="add-new-user-div-id" class="add-new-user-div">

  <p style="height: 30px; width: 556px; margin: 0; background-color: #337ab7; border-radius: 3px;">
    <span class="form-text">Add New User</span>
  </p>

  <form id="add_new_user_form" action="save_new_user.php" onsubmit="return validateAndSubmit('.$newuser.');" method="post"><!--add new user form-->

      <table cellspacing="0" cellpadding="0" width="98%" border="0" style="border-spacing: 0px; text-align: left;">
        <tr>

          <td>
            <div id="user_divid1" class="form-err-div">Length to be between 3 and 20</div>
            <span class="reddot">*</span>
            <input id="user_id1" class="add-new-user-input-box" name="name" type="text" placeholder="Name" title="Enter User Name" maxlength="20" onkeypress="return isCharKey(event);" autocomplete="off" />
          </td>

          <td>
            <div id="user_divid2" class="form-err-div">Length to be between 3 and 20</div>
            <span class="reddot">*</span>
            <input id="user_id2" class="add-new-user-input-box" name="loginid" type="text" placeholder="Login ID" title="Enter Login ID" maxlength="20" onkeypress="return isLoginKey(event);" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td>
            <div id="user_divid3" class="form-err-div">Length to be between 3 and 15</div>
            <span class="reddot">*</span>
            <input id="user_id3" class="add-new-user-input-box" name="password" type="password" placeholder="Password" title="Enter Password" maxlength="15" onkeypress="return isSpaceKey(event);" autocomplete="off" />
          </td>

          <td>
            <div id="user_divid4" class="form-err-div">Length to be between 3 and 15</div>
            <span class="reddot">*</span>
            <input id="user_id4" class="add-new-user-input-box" name="repassword" type="password" placeholder="Confirm Password" title="Retype Password to Confirm" maxlength="15" onkeypress="return isSpaceKey(event);" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td>
            <div id="user_divid5" class="form-err-div">Select User type</div>
            <span class="reddot">*</span>
            <select id="user_id5" class="add-new-user-select-box" name="usertype" title="Select User Type" > 
              <option value="" disabled selected>Select User Type</option>
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select>
          </td>

          <td>
            <div id="user_divid6" class="form-err-div">Select Status</div>
            <span class="reddot">*</span>
            <select id="user_id6" class="add-new-user-select-box" name="status" title="Select Status" > 
              <option value="" disabled selected>Select Status</option>
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </td>

        </tr>
      </table>

        <input type="hidden" id="uid" name="uid" value="-1">
        <input type="hidden" id="uidupdate" name="uidupdate" value="0">
        <input type="hidden" id="uspno" name="uspno" value="1">
        <input class="login-input-btn" style="margin: 20px 0 0 170px" type="submit" value="Save"><!--submit button-->
        <input class="login-input-btn" style="margin: 20px 0 0 10px; width: 70px;" type="button" value="Cancel" onclick="cancelfade('.$newuser.');"><!--submit button-->
        <input class="login-input-btn" style="margin: 20px 0 0 10px" type="button" value="Reset" onclick="resetfade('.$newuser.');">

  </form> 
</div>';
}

function getNewEmployeeForm()
{
$newemployee="'add_new_employee_form'";

$uploadimage="'emp_select_img'";
$aadharfile="'emp_aadhar_file'";
$panfile="'emp_pan_file'";
$passfile="'emp_pass_file'";
$otherfile="'emp_other_file'";

echo '
<div id="add-new-employee-div-id" class="add-new-employee-div">

  <p style="height: 30px; width: 1092px; margin:0; background-color: #337ab7; border-radius: 3px;">
    <span class="form-text">Add New Employee</span>
  </p>

  <form id="add_new_employee_form" action="save_new_employee.php" enctype="multipart/form-data" onsubmit="return validateAndSubmit('.$newemployee.');" method="post"><!--add new employee form-->

      <table cellspacing="0" cellpadding="0" width="98%" border="0" style="border-spacing: 0px; text-align: left;">
        <tr>

          <td rowspan="2">
            <div id="emp_dividimg" style="color: #4CAF50; margin-left: 20px; visibility: visible;">Select Employee Photograph</div>
            <div class="add-new-employee-image-box" title="Select Employee Photograph" >
              <!--p id="text">&nbsp;Select Employee Photograph</p-->
              <input type="image" id="emp_img" src="" value="" style="width: 200px; height: 180px; border:0; border-radius: 10px; display: block; pointer-events: none" />
            </div>
            <input id="emp_select_img" class="" name="empphotofile" style="margin: 3px 0 0 20px; width: 180px; /*outline: none;*/ cursor: pointer;" type="file" onclick="" accept=".jpg,.jpeg,.png,.gif" onchange="validateFileType('.$uploadimage.',this)" />
            <span id="clear5" onclick="clearfile('.$uploadimage.');" style="opacity: 0.8; cursor: pointer; margin: 0 0 0 15px; display: inline-block;" title="Clear Photograph"><img src="images/clear.png" alt="clear" style="height: 18px; width: 18px;"></span>
          </td>

          <td>
            <div id="emp_divid1" class="form-err-div">Length to be between 3 and 20</div>
            <span class="reddot">*</span>
            <input id="emp_id1" class="add-new-employee-input-box" name="firstname" type="text" placeholder="First Name" title="Enter First Name" maxlength="20" onkeypress="return isCharKey1(event);" autocomplete="off" />
          </td>

          <td>
            <div id="emp_divid2" class="form-err-div">Length to be between 3 and 20</div>
            <span class="reddot">*</span>
            <input id="emp_id2" class="add-new-employee-input-box" name="lastname" type="text" placeholder="Last Name" title="Enter Last Name" maxlength="20" onkeypress="return isCharKey1(event);" autocomplete="off" />
          </td>

          <td>
            <div id="emp_divid3" class="form-err-div">Enter Age</div>
            <span class="reddot">*</span>
            <input id="emp_id3" class="add-new-employee-input-box" style="width: 80px;" name="age" type="text" placeholder="Age" title="Enter Age" onkeypress="return isNumberKey(event);" maxlength="3" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td style="vertical-align:baseline;">
            <div id="emp_divid4" class="form-err-div">Number to be between 8 and 12</div>
            <span class="reddot">*</span>
            <input id="emp_id4" class="add-new-employee-input-box" name="cno1" type="text" placeholder="Contact Number 1" title="Enter Contact Number" onkeypress="return isNumberKey(event);" maxlength="12" autocomplete="off" />
          </td>

          <td style="vertical-align:baseline;">
            <div id="emp_divid5" class="form-err-div">Number to be between 8 and 12</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <input id="emp_id5" class="add-new-employee-input-box" name="cno2" type="text" placeholder="Contact Number 2" title="Enter Contact Number" onkeypress="return isNumberKey(event);" maxlength="12" autocomplete="off" />
          </td>

          <td style="vertical-align:baseline;">
            <div id="emp_divid6" class="form-err-div">Number to be between 8 and 12</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <input id="emp_id6" class="add-new-employee-input-box" name="cno3" type="text" placeholder="Contact Number 3" title="Enter Contact Number" onkeypress="return isNumberKey(event);" maxlength="12" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td>
            <div id="emp_divid7" class="form-err-div">Enter Local Address</div>
            <span class="reddot">*</span>
            <textarea id="emp_id7" class="" type="textarea" name="localaddr" placeholder="Local Address" maxlength="200" title="Enter Local Address" onkeypress="return isAddress(event);" autocomplete="off" ></textarea>
          </td>

          <td>
            <div id="emp_divid8" class="form-err-div">Enter Village Address</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <textarea id="emp_id8" class="" type="textarea" name="villageaddr" placeholder="Village Address" maxlength="200" title="Enter Village Address" onkeypress="return isAddress(event);" autocomplete="off" ></textarea>
          </td>

          <td>
            <div id="emp_divid10" class="form-err-div">Enter Aadhar Card Number</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <input id="emp_id10" class="add-new-employee-input-box" name="aadhar" type="text" placeholder="Aadhar Card Number" title="Enter Aadhar Card Number" onkeypress="return isNumberKey(event);" maxlength="12" autocomplete="off" />
          </td>

          <td>
            <div id="emp_divid11" class="form-err-div">Enter PAN card Number</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <input id="emp_id11" class="add-new-employee-input-box" name="pan" type="text" placeholder="PAN card Number" title="Enter PAN card Number" onkeypress="return isPanKey(event);" maxlength="10" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td style="vertical-align:baseline;">
            <div id="emp_divid12" class="form-err-div">Select Active Status</div>
            <span class="reddot">*</span>
            <select id="emp_id12" class="add-new-user-select-box" name="activestatus" title="Select Active Status" > 
              <option value="" disabled selected>Select Active Status</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </td>

          <td style="vertical-align:baseline;">
            <div id="emp_divid9" style="color: #4CAF50; margin-left: 20px; visibility: visible;">Select Date of Joining</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <!--input id="emp_id4" type="date" class="add-new-employee-input-box" name="doj" value="date(d-m-Y)"-->
            <input id="emp_id9" type="text" class="month_and_year_option add-new-employee-input-box" name="doj" value="'.date('d-M-Y').'" readonly title="Select Date of Joining" autocomplete="off" />
                  <script>
                          $(function()
                          {
                            $(".month_and_year_option").datepicker(
                            {
                              changeMonth: true,
                              changeYear: true,
                              dateFormat : "dd-M-yy",
                              yearRange: "-100:+0",
                              yearRange: "1990:+20"
                            });
                          });
                  </script>
          </td>

          <td style="vertical-align:baseline;"> 
            <div id="emp_divuploadaadhar" style="color: #4CAF50; margin-left: 20px; visibility: visible;">Upload Aadhar Card</div>
            <input id="emp_aadhar_file" class="" name="aadharfile" style="margin: 5px 0 0 20px; width: 180px; /*outline: none;*/ cursor: pointer;" type="file" onclick="" accept=".jpg,.jpeg,.pdf" onchange="validateFileType('.$aadharfile.',this)" />
            
            <span id="clear1" onclick="clearfile('.$aadharfile.');" style="opacity: 0.8; cursor: pointer; margin: 0 0 0 15px; display: inline-block;" title="Clear Aadhar"><img src="images/clear.png" alt="clear" style="height: 18px; width: 18px;"></span>
            <a id="aadharid" href="" target="_blank" style="margin: 0 0 0 5px; display: none;" title="Download Aadhar"><img src="images/download.png" alt="download" style="height: 18px; width: 18px;"></a>

            <div id="emp_divuploadpan" style="color: #4CAF50; margin-left: 20px; visibility: visible;">Upload PAN Card</div>
            <input id="emp_pan_file" class="" name="panfile" style="margin: 5px 0 0 20px; width: 180px; /*outline: none;*/ cursor: pointer;" type="file" onclick="" accept=".jpg,.jpeg,.pdf" onchange="validateFileType('.$panfile.',this)" />

            <span id="clear2" onclick="clearfile('.$panfile.');" style="opacity: 0.8; cursor: pointer; margin: 0 0 0 15px; display: inline-block;" title="Clear PAN"><img src="images/clear.png" alt="clear" style="height: 18px; width: 18px;"></span>
            <a id="panid" href="" target="_blank" style="margin: 0 0 0 5px; display: none;" title="Download PAN"><img src="images/download.png" alt="download" style="height: 18px; width: 18px;"></a>
          </td>

          <td style="vertical-align:baseline;"> 
            <div id="emp_divuploadpass" style="color: #4CAF50; margin-left: 20px; visibility: visible;">Upload Passport</div>
            <input id="emp_pass_file" class="" name="passfile" style="margin: 5px 0 0 20px; width: 180px; /*outline: none;*/ cursor: pointer;" type="file" onclick="" accept=".jpg,.jpeg,.pdf" onchange="validateFileType('.$passfile.',this)" />

            <span id="clear3" onclick="clearfile('.$passfile.');" style="opacity: 0.8; cursor: pointer; margin: 0 0 0 15px; display: inline-block;" title="Clear Passport"><img src="images/clear.png" alt="clear" style="height: 18px; width: 18px;"></span>
            <a id="passid" href="" target="_blank" style="margin: 0 0 0 5px; display: none;" title="Download Passport"><img src="images/download.png" alt="download" style="height: 18px; width: 18px;"></a>

            <div id="emp_divuploadother" style="color: #4CAF50; margin-left: 20px; visibility: visible;">Upload Other Doc</div>
            <input id="emp_other_file" class="" name="otherfile" style="margin: 5px 0 0 20px; width: 180px; /*outline: none;*/ cursor: pointer;" type="file" onclick="" accept=".jpg,.jpeg,.pdf" onchange="validateFileType('.$otherfile.',this)" />

            <span id="clear4" onclick="clearfile('.$otherfile.');" style="opacity: 0.8; cursor: pointer; margin: 0 0 0 15px; display: inline-block;" title="Clear Other"><img src="images/clear.png" alt="clear" style="height: 18px; width: 18px;"></span>
            <a id="otherid" href="" target="_blank" style="margin: 0 0 0 5px; display: none;" title="Download Other"><img src="images/download.png" alt="download" style="height: 18px; width: 18px;"></a>
          </td>
        
        </tr>
      </table>

        <input type="hidden" id="imagesrc" name="imagesrc" value="">
        <input type="hidden" id="aadharsrc" name="aadharsrc" value="">
        <input type="hidden" id="pansrc" name="pansrc" value="">
        <input type="hidden" id="passsrc" name="passsrc" value="">
        <input type="hidden" id="othersrc" name="othersrc" value="">

        <input type="hidden" id="eid" name="eid" value="-1">
        <input type="hidden" id="eidupdate" name="eidupdate" value="0">
        <input type="hidden" id="emppno" name="emppno" value="1">
        <input class="login-input-btn" style="margin: 0 0 0 320px;" type="submit" value="Save"><!--submit button-->
        <input class="login-input-btn" style="margin: 0 0 0 10px; width: 70px;" type="button" value="Cancel" onclick="cancelfade('.$newemployee.');"><!--cancel button-->
        <input class="login-input-btn" style="margin: 0 0 0 10px;" type="button" value="Reset" onclick="resetfade('.$newemployee.');">

  </form> 
</div>';
}

function getNewClientForm()
{
$newclient="'add_new_client_form'";

echo '
<div id="add-new-client-div-id" class="add-new-client-div">

  <p style="height: 30px; width: 290px; margin:0; background-color: #337ab7; border-radius: 3px;">
    <span class="form-text">Add New Customer</span>
  </p>

  <form id="add_new_client_form" action="save_new_client.php" onsubmit="return validateAndSubmit('.$newclient.');" method="post"><!--add new client form-->

      <table cellspacing="0" cellpadding="0" width="98%" border="0" style="border-spacing: 0px; text-align: left;">
        <tr>

          <td>
            <div id="client_divid1" class="form-err-div">Length to be between 3 and 30</div>
            <span class="reddot">*</span>
            <input id="client_id1" class="add-new-client-input-box" name="companyname" type="text" placeholder="Company Name" title="Enter Company Name" maxlength="30" onkeypress="return isCharKey(event);" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td>
            <div id="client_divid2" class="form-err-div">Enter Billing Address</div>
            <span class="reddot">*</span>
            <textarea id="client_id2" class="" type="textarea" name="billingaddr" placeholder="Billing Address" maxlength="200" title="Enter Billing Address" onkeypress="return isAddress(event);" autocomplete="off" ></textarea>
          </td>

        </tr>
        <tr>

          <td>
            <div id="client_divid3" class="form-err-div">Enter GST Number</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <input id="client_id3" class="add-new-client-input-box" name="gstno" type="text" placeholder="GST Number" title="Enter GST Number" onkeypress="return isPanKey(event);" maxlength="15" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td>
            <div id="client_divid4" class="form-err-div">Enter PAN card Number</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <input id="client_id4" class="add-new-client-input-box" name="panno" type="text" placeholder="PAN card Number" title="Enter PAN card Number" onkeypress="return isPanKey(event);" maxlength="10" autocomplete="off" />
          </td>

        </tr>
      </table>

      <input type="hidden" id="cid" name="cid" value="-1">
      <input type="hidden" id="cidupdate" name="cidupdate" value="0">
      <input type="hidden" id="clientpno" name="clientpno" value="1">
      <input class="login-input-btn" style="margin: 10px 0 0 35px" type="submit" value="Save"><!--submit button-->
      <input class="login-input-btn" style="margin: 10px 0 0 10px; width: 70px;" type="button" value="Cancel" onclick="cancelfade('.$newclient.');"><!--submit button-->
      <input class="login-input-btn" style="margin: 10px 0 0 10px" type="button" value="Reset" onclick="resetfade('.$newclient.');">

  </form> 
</div>';
}


function getNewContactPersonForm()
{
$newcontactperson="'add_new_contact_person_form'";

if(isset($_GET['clientd'])&&(isset($_GET['cid'])))
{
  $clientd=base64_decode($_GET['clientd']);
  $cid=base64_decode($_GET['cid']);
}

echo '
<div id="add-new-contact-person-div-id" class="add-new-contact-person-div">

  <p style="height: 30px; width: 285px; margin:0; background-color: #337ab7; border-radius: 3px;">
    <span class="form-text">Add New Contact Person</span>
  </p>

  <form id="add_new_contact_person_form" action="save_new_contact_person.php" onsubmit="return validateAndSubmit('.$newcontactperson.');" method="post"><!--add new contact person form-->

      <table cellspacing="0" cellpadding="0" width="98%" border="0" style="border-spacing: 0px; text-align: left;">
        <tr>

          <td>
            <div id="cp_divid1" class="form-err-div">Length to be between 3 and 20</div>
            <span class="reddot">*</span>
            <input id="cp_id1" class="add-new-contact-person-input-box" name="contactpersonname" type="text" placeholder="Contact Person Name" title="Enter Contact Person Name" maxlength="20" onkeypress="return isCharKey(event);" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td>
            <div id="cp_divid2" class="form-err-div">Number to be between 8 and 12</div>
            <span class="reddot">*</span>
            <input id="cp_id2" class="add-new-contact-person-input-box" name="cno1" type="text" placeholder="Contact Number 1" title="Enter Contact Number" onkeypress="return isNumberKey(event);" maxlength="12" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td>
            <div id="cp_divid3" class="form-err-div">Number to be between 8 and 12</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <input id="cp_id3" class="add-new-contact-person-input-box" name="cno2" type="text" placeholder="Contact Number 2" title="Enter Contact Number" onkeypress="return isNumberKey(event);" maxlength="12" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td>
            <div id="cp_divid4" class="form-err-div">Enter Email-ID</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <input id="cp_id4" class="add-new-contact-person-input-box" name="email" type="text" placeholder="Email-ID" title="Enter Email-ID" maxlength="40" onkeypress="return isEmail(event);" autocomplete="off" />
          </td>

        </tr>
      </table>

      <input type="hidden" id="cid" name="cid" value="'.$cid.'">
      <input type="hidden" id="cpid" name="cpid" value="-1">
      <input type="hidden" id="cppno" name="cppno" value="1">
      <input type="hidden" id="cpidupdate" name="cpidupdate" value="0">
      <input class="login-input-btn" style="margin: 15px 0 0 35px" type="submit" value="Save"><!--submit button-->
      <input class="login-input-btn" style="margin: 15px 0 0 10px; width: 70px;" type="button" value="Cancel" onclick="cancelfade('.$newcontactperson.');"><!--submit button-->
      <input class="login-input-btn" style="margin: 15px 0 0 10px" type="button" value="Reset" onclick="resetfade('.$newcontactperson.');">

  </form> 
</div>';
}

function getCreateNewCompanyEmailList()
{
$newcompanylistid="'create_new_company_email_list_form'";
//getList();
//exit();

echo '
<div id="create-new-company-email-list-div-id" class="create-new-company-email-list-div">

  <p style="height: 30px; width: 560px; margin: 0; background-color: #337ab7; border-radius: 3px;">
    <span class="form-text">Create New Company Email List</span>
  </p>

  <form id="create_new_company_email_list_form" action="save_new_company_list.php" onsubmit="return validateAndSubmit('.$newcompanylistid.');"method="post"><!-- form-->

      <table cellspacing="0" cellpadding="0" width="98%" border="0" style="border-spacing: 0px; text-align: left;">
        <tr>

          <td td colspan="2">
            <div id="cmlist_divid1" class="form-err-div">Length to be between 3 and 30</div>
            <span class="reddot">*</span>
            <input id="cmlist_id1" style="width: 510px;" class="create-new-company-email-list-input-box" name="companylistname" type="text" placeholder="Company Name" title="Enter Company Name" maxlength="30" onkeypress="return isCharKey(event);" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td colspan="2">
            <div id="cmlist_divid2" class="form-err-div">Enter Local Address</div>
            <span class="reddot">*</span>
            <textarea id="cmlist_id2" class="" style="width: 510px;" type="textarea" name="compaddr" placeholder="Company Address" maxlength="200" title="Enter Company Address" onkeypress="return isAddress(event);" autocomplete="off" ></textarea>
          </td>

        </tr>
        <tr>

          <td>
            <div id="cmlist_divid3" class="form-err-div">Length to be between 2 and 25</div>
            <span class="reddot">*</span>
            <input id="cmlist_id3" class="create-new-company-email-list-input-box" name="city" type="text" placeholder="City" title="Enter City" maxlength="25" onkeypress="return isCharKey1(event);" autocomplete="off" />
          </td>

          <td>
            <div id="cmlist_divid4" class="form-err-div">Length to be between 2 and 25</div>
            <span class="reddot">*</span>
            <input id="cmlist_id4" class="create-new-company-email-list-input-box" name="state" type="text" placeholder="State" title="Enter State" maxlength="25" onkeypress="return isCharKey1(event);" autocomplete="off" />
          </td>

        </tr>
        <tr>        

          <td style="vertical-align:baseline;">
            <div id="cmlist_divid5" class="form-err-div">Enter Pincode</div>
            <span class="reddot">*</span>
            <input id="cmlist_id5" class="create-new-company-email-list-input-box" name="pincode" type="text" placeholder="Pincode" title="Enter Pincode" onkeypress="return isNumberKey(event);" maxlength="6" autocomplete="off" />
          </td>
  
          <td>
            <div id="cmlist_divid6" class="form-err-div">Select Country</div>
            <span class="reddot">*</span>
              <select id="cmlist_id6" class="create-new-company-email-list-select-box" name="country" title="Select Country"> 
                <option value="0" disabled selected>Select Country</option>
                <option value="IN">INDIA</option>
                <option value="US">USA</option>
              </select>
          </td>

        </tr>
        <tr>

          <td rowspan="2">
            <div id="cmlist_divid7" class="form-err-div">Enter Subscription Message</div>
            <span class="reddot">*</span>
            <textarea id="cmlist_id7" class="" style="height:110px;" type="textarea" name="subsmsg" placeholder="Write a short reminder about how the recipient joined your list." maxlength="200" title="Enter Subscription Message" onkeypress="return isCharKey(event);" autocomplete="off" ></textarea>
          </td>

          <td>
            <div id="cmlist_divid8" class="form-err-div">Length to be between 3 and 30</div>
            <span class="reddot">*</span>
            <input id="cmlist_id8" class="create-new-company-email-list-input-box" name="fromname" type="text" placeholder="From Name" title="Enter Your Name" maxlength="30" onkeypress="return isCharKey(event);" autocomplete="off" />
          </td>

        </tr>
        <tr>

          <td>
            <div id="cmlist_divid9" class="form-err-div">Enter Email-ID</div>
            <span class="reddot">*</span>
            <input id="cmlist_id9" class="add-new-email-to-list-input-box" name="fromemail" type="text" placeholder="From Email-ID" title="Enter Your Email-ID" maxlength="40" onkeypress="return isEmail(event);" autocomplete="off" />
          </td>

        </tr>
      </table>

        <input type="hidden" id="cmlid" name="cmlid" value="-1">
        <input type="hidden" id="cmlidupdate" name="cmlidupdate" value="0">
        <input class="login-input-btn" style="margin: 20px 0 0 170px;" type="submit" value="Save"><!--submit button-->
        <input class="login-input-btn" style="margin: 20px 0 0 10px; width: 70px;" type="button" value="Cancel" onclick="cancelfade('.$newcompanylistid.');"><!--submit button-->
        <input class="login-input-btn" style="margin: 20px 0 0 10px;" type="button" value="Reset" onclick="resetfade('.$newcompanylistid.');">

  </form> 
</div>';
}

function getAddNewEmailToList()
{
$newemailid="'add_new_email_to_list_form'";
$listname="'listname'";
//getList();
//exit();

echo '
<div id="add-new-email-to-list-div-id" class="add-new-email-to-list-div">

  <p style="height: 30px; width: 280px; margin: 0; background-color: #337ab7; border-radius: 3px;">
    <span class="form-text">Add New Email-ID To List</span>
  </p>

  <form id="add_new_email_to_list_form" action="save_new_email_to_list.php" onsubmit="return validateAndSubmit('.$newemailid.');" method="post"><!--add new user form-->

      <table cellspacing="0" cellpadding="0" width="98%" border="0" style="border-spacing: 0px; text-align: left;">
        <tr>

          <td>
            <div id="emlist_divid1" class="form-err-div">Select User type</div>
            <span class="reddot">*</span>
              <select id="emlist_id1" class="add-new-email-to-list-select-box" name="list_id" title="Select List to add Email-ID in." 
              onchange="document.getElementById('.$listname.').value=this.options[this.selectedIndex].innerText;"> 
                <option value="0" disabled selected>Select List</option>';
                echo getList();
              echo' 
              </select>
          </td>

        </tr>
        <tr>

          <td>
            <div id="emlist_divid2" class="form-err-div">Length to be between 3 and 20</div>
            <span class="reddot">*</span>
            <input id="emlist_id2" class="add-new-email-to-list-input-box" name="firstname" type="text" placeholder="First Name" title="Enter First Name" maxlength="20" onkeypress="return isCharKey1(event);" autocomplete="off" />
          </td>

        </tr>
        <tr>          

          <td>
            <div id="emlist_divid3" class="form-err-div">Length to be between 3 and 20</div>
            <span class="reddot">*</span>
            <input id="emlist_id3" class="add-new-email-to-list-input-box" name="lastname" type="text" placeholder="Last Name" title="Enter Last Name" maxlength="20" onkeypress="return isCharKey1(event);" autocomplete="off" />
          </td>
  
        <tr>
        </tr>

          <td>
            <div id="emlist_divid4" class="form-err-div">Enter Email-ID</div>
            <span class="reddot">*</span>
            <input id="emlist_id4" class="add-new-email-to-list-input-box" name="email" type="text" placeholder="Email-ID" title="Enter Email-ID" maxlength="40" onkeypress="return isEmail(event);" autocomplete="off" />
          </td>

        </tr>
      </table>

        <input type="hidden" id="elid" name="elid" value="-1">
        <input type="hidden" id="elidupdate" name="elidupdate" value="0">
        <input type="hidden" id="listname" name="listname" value="">
        <input class="login-input-btn" style="margin: 20px 0 0 35px" type="submit" value="Save"><!--submit button-->
        <input class="login-input-btn" style="margin: 20px 0 0 10px; width: 70px;" type="button" value="Cancel" onclick="cancelfade('.$newemailid.');"><!--submit button-->
        <input class="login-input-btn" style="margin: 20px 0 0 10px" type="button" value="Reset" onclick="resetfade('.$newemailid.');">

  </form> 
</div>';
}

function getSendBulkEmail()
{
$sendbulkemail="'send_bulk_email_form'";
$listname="'smlistname'";
//getTemplate();
//getList();
//exit();

echo '
<div id="send-bulk-email-div-id" class="send-bulk-email-div">

  <p style="height: 30px; width: 550px; margin: 0; background-color: #337ab7; border-radius: 3px;">
    <span class="form-text">Send Bulk Email</span>
  </p>

  <form id="send_bulk_email_form" action="send_bulk_email.php" onsubmit="return validateAndSubmit('.$sendbulkemail.');" method="post">

      <table cellspacing="0" cellpadding="0" width="98%" border="0" style="border-spacing: 0px; text-align: left;">
        <tr>

          <td>
            <div id="sm_divid1" class="form-err-div">Length to be between 3 and 30</div>
            <span class="reddot">*</span>
            <input id="sm_id1" class="send-bulk-email-input-box" name="fromname" type="text" placeholder="From Name" title="Enter Your Name" maxlength="30" onkeypress="return isCharKey(event);" autocomplete="off" />
          </td>

          <td>
            <div id="sm_divid2" class="form-err-div">Enter Email-ID</div>
            <span class="reddot">*</span>
            <input id="sm_id2" class="send-bulk-email-input-box" name="fromemail" type="text" placeholder="From Email-ID" title="Enter Your Email-ID" maxlength="40" onkeypress="return isEmail(event);" autocomplete="off" />
          </td>

        </tr>   
        <tr>

          <td colspan="2">
            <div id="sm_divid3" class="form-err-div">Enter Subject</div>
            <span class="reddot">*</span>
            <textarea id="sm_id3" class="" style="width: 505px; height: 70px;" type="textarea" name="subject" placeholder="Subject" maxlength="100" title="Enter Email Subject" onkeypress="return isAddress(event);" autocomplete="off" ></textarea>
          </td>

        </tr>
        <tr>

          <td colspan="2">
            <div id="sm_divid6" class="form-err-div">Enter Subject</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <textarea id="sm_id6" class="" style="width: 505px; height: 200px;" type="textarea" name="message" placeholder="Message" maxlength="200" title="Enter Email Message" onkeypress="return isAddress(event);" autocomplete="off" ></textarea>
          </td>

        </tr>        
        <tr>

          <td>
            <div id="sm_divid4" class="form-err-div">Select List</div>
            <span class="reddot">*</span>
              <select id="sm_id4" class="send-bulk-email-select-box" name="list_id" title="Select List to send email to" onchange="document.getElementById('.$listname.').value=this.options[this.selectedIndex].innerText;"> 
                <option value="0" disabled selected>Select List</option>';
                echo getList();
              echo' 
              </select>
          </td>

          <td>
            <div id="sm_divid5" class="form-err-div">Select Template</div>
            <span class="reddot">*</span>
              <select id="sm_id5" class="send-bulk-email-select-box" name="temp_id" title="Select Template" > 
                <option value="0" disabled selected>Select Template</option>';
                echo getTemplate();
              echo' 
              </select>
          </td>

        </tr>
      </table>

        <input type="hidden" id="smid" name="smid" value="-1">
        <input type="hidden" id="smidupdate" name="smidupdate" value="0">
        <input type="hidden" id="smlistname" name="smlistname" value="">
        <input class="login-input-btn" style="margin: 20px 0 0 170px" type="submit" value="Send"><!--submit button-->
        <input class="login-input-btn" style="margin: 20px 0 0 10px; width: 70px;" type="button" value="Cancel" onclick="cancelfade('.$sendbulkemail.');"><!--submit button-->
        <input class="login-input-btn" style="margin: 20px 0 0 10px" type="button" value="Reset" onclick="resetfade('.$sendbulkemail.');">

  </form> 
</div>';
}

function getSendEmail()
{
$sendemail="'send_email_form'";
$listname="'semlistname'";
$attachfile="'attach_file'";

//getTemplate();
//getList();
//exit();

echo '
<div id="send-email-div-id" class="send-email-div">

  <p style="height: 30px; width: 550px; margin: 0; background-color: #337ab7; border-radius: 3px;">
    <span class="form-text">Send Email</span>
  </p>

  <form id="send_email_form" action="send_email.php" enctype="multipart/form-data" onsubmit="return validateAndSubmit('.$sendemail.');" method="post">

      <table cellspacing="0" cellpadding="0" width="98%" border="0" style="border-spacing: 0px; text-align: left;">
        <tr>

          <td>
            <div id="sem_divid1" class="form-err-div">Length to be between 3 and 30</div>
            <span class="reddot">*</span>
            <input id="sem_id1" class="send-email-input-box" name="fromname" type="text" placeholder="From Name" title="Enter From Name" maxlength="30" onkeypress="return isCharKey(event);" autocomplete="off" value="Newmat.in"/>
          </td>

          <td>
            <div id="sem_divid2" class="form-err-div">Enter Email-ID</div>
            <span class="reddot">*</span>
            <input id="sem_id2" class="send-email-input-box" name="fromemail" type="text" placeholder="From Email-ID" title="Enter From Email-ID" maxlength="40" onkeypress="return isEmail(event);" autocomplete="off" value="hello@newmat.in"/>
          </td>

        </tr>   
        <tr>

          <td>
            <div id="sem_divid3" class="form-err-div">Length to be between 3 and 30</div>
            <span class="reddot">*</span>
            <input id="sem_id3" class="send-email-input-box" name="toname" type="text" placeholder="First & Last name" title="Enter To Name" maxlength="30" onkeypress="return isCharKey(event);" autocomplete="off" />
          </td>

          <td>
            <div id="sem_divid4" class="form-err-div">Enter Email-ID</div>
            <span class="reddot">*</span>
            <input id="sem_id4" class="send-email-input-box" name="toemail" type="text" placeholder="To Email-ID" title="Enter To Email-ID" maxlength="40" onkeypress="return isEmail(event);" autocomplete="off" />
          </td>

        </tr>         
        <tr>

          <td colspan="2">
            <div id="sem_divid5" class="form-err-div">Enter Subject</div>
            <span class="reddot">*</span>
            <textarea id="sem_id5" class="" style="width: 505px; height: 70px;" type="textarea" name="subject" placeholder="Subject" maxlength="100" title="Enter Email Subject" onkeypress="return isAddress(event);" autocomplete="off"></textarea>
          </td>

        </tr>
        <tr>

          <td colspan="2">
            <div id="sem_divid6" class="form-err-div">Enter Content</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <textarea id="sem_id6" class="" style="width: 505px; height: 140px;" type="textarea" name="content" placeholder="Message" maxlength="200" title="Enter Email Message" onkeypress="return isAddress(event);" autocomplete="off"></textarea>
          </td>

        </tr>        
        <tr>

          <td>
            <div id="sem_divid7" class="form-err-div">Select Template</div>
            <span class="reddot" style="visibility: hidden;">*</span>
              <select id="sem_id7" class="send-email-select-box" name="template_name" title="Select Template" > 
                <option value="0" disabled selected>Select Template</option>';
                echo getMandrillTemplate();
              echo' 
              </select>
          </td>

          <td style="vertical-align: middle;">
            <div id="sem_addatch" style="color: #4CAF50; margin-left: 20px; visibility: visible;">Add Attachment</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <input id="attach_file" class="" name="attachmentfile" style="margin: 5px 0 0 5px; width: 200px; /*outline: none;*/ cursor: pointer;" type="file" onclick="" accept=".ppt, .pptx, .pdf" onchange="validateFileType('.$attachfile.',this)" />

            <span id="clearfile" onclick="clearfile('.$attachfile.');" style="opacity: 0.8; cursor: pointer; margin: 0 0 0 5px; display: inline-block;" title="Clear File"><img src="images/clear.png" alt="clear" style="height: 18px; width: 18px;"></span>
          </td>

        </tr>
      </table>

        <input type="hidden" id="semid" name="semid" value="-1">
        <input type="hidden" id="semidupdate" name="semidupdate" value="0">
        <input type="hidden" id="semlistname" name="semlistname" value="">
        <input class="login-input-btn" style="margin: 15px 0 0 170px" type="submit" value="Send"><!--submit button-->
        <input class="login-input-btn" style="margin: 15px 0 0 10px; width: 70px;" type="button" value="Cancel" onclick="cancelfade('.$sendemail.');"><!--submit button-->
        <input class="login-input-btn" style="margin: 15px 0 0 10px" type="button" value="Reset" onclick="resetfade('.$sendemail.');">

  </form> 
</div>';
}

function getNewProjectForm()
{
$newproject="'add_new_project_form'";

echo '
<div id="add-new-project-div-id" class="add-new-project-div">

  <p style="height: 30px; width: 815; margin: 0; background-color: #337ab7; border-radius: 3px;">
    <span class="form-text">Add New Project</span>
  </p>

  <form id="add_new_project_form" action="save_new_project1.php" onsubmit="return validateAndSubmit('.$newproject.');" method="post"><!--add new project form-->

      <table cellspacing="0" cellpadding="0" width="98%" border="0" style="border-spacing: 0px; text-align: left;">
        <tr>

          <td>
            <div id="project_divid1" class="form-err-div">Length to be between 3 and 20</div>
            <span class="reddot">*</span>
            <input id="project_id1" class="add-new-project-input-box" name="name" type="text" placeholder="Project Name" title="Enter Project Name" maxlength="30" onkeypress="return isCharKey(event);" autocomplete="off" />
          </td>

          <td>
            <div id="project_divid2" class="form-err-div">Select User type</div>
            <span class="reddot">*</span>
            <select id="project_id2" class="add-new-project-select-box" name="empname" title="Select Available Employee" > 
              <option value="0" disabled selected>Select Employee</option>';
                echo getAvailableEmployee();
              echo' 
              </select>
          </td>

          <td>
            <div id="project_divid3" class="form-err-div">Select User type</div>
            <span class="reddot">*</span>
            <select id="project_id3" class="add-new-project-select-box" name="projecttype" title="Select Project Type" > 
              <option value="" disabled selected>Select Project Type</option>
              <option value="Fresh">Fresh Installation</option>
              <option value="Paid Maintenance">Paid Maintenance</option>
              <option value="Free Maintenance">Free Maintenance</option>
            </select>
          </td>

        </tr>
        <tr>

          <td colspan="3">
            <div id="project_divid4" class="form-err-div">Project Address</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <textarea id="project_id4" class="" style="width: 762px;" type="textarea" name="projectaddr" placeholder="Project Address" maxlength="200" title="Enter Project Address" onkeypress="return isAddress(event);" autocomplete="off" ></textarea>
          </td>

        </tr>
        <tr>

          <td style="vertical-align:baseline;">
            <div id="project_divid5" style="color: #4CAF50; margin-left: 20px; visibility: visible;">Select Start Date</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <input id="project_id5" type="text" class="month_and_year_option add-new-project-input-box" name="startdate" value="'.date('d-M-Y').'" readonly title="Start Date" autocomplete="off" />
                  <script>
                          $(function()
                          {
                            $(".month_and_year_option").datepicker(
                            {
                              changeMonth: true,
                              changeYear: true,
                              dateFormat : "dd-M-yy",
                              yearRange: "-100:+0",
                              yearRange: "1990:+20"
                            });
                          });
                  </script>
          </td>

          <td style="vertical-align:baseline;">
            <div id="project_divid6" style="color: #4CAF50; margin-left: 20px; visibility: visible;">Select End Date</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <input id="project_id6" type="text" class="month_and_year_option add-new-project-input-box" name="enddate" value="'.date('d-M-Y').'" readonly title="Start Date" autocomplete="off" />
                  <script>
                          $(function()
                          {
                            $(".month_and_year_option").datepicker(
                            {
                              changeMonth: true,
                              changeYear: true,
                              dateFormat : "dd-M-yy",
                              yearRange: "-100:+0",
                              yearRange: "1990:+20"
                            });
                          });
                  </script>
          </td>

          <td style="vertical-align:baseline;">
            <div id="project_divid7" class="form-err-div">Select Project Status</div>
            <span class="reddot">*</span>
            <select id="project_id7" class="add-new-project-select-box" name="projectstatus" title="Select Project Status" > 
              <option value="" disabled selected>Select Project Status</option>
              <option value="Admin">Started</option>
              <option value="User">In Progress</option>
              <option value="User">Completed</option>
              <option value="User">Closed</option>
            </select>
          </td>

        </tr>
        <tr>

          <td colspan="3">
            <div id="project_divid8" class="form-err-div">Remarks (If Any)</div>
            <span class="reddot" style="visibility: hidden;">*</span>
            <textarea id="project_id8" class="" style="width: 762px;" type="textarea" name="localaddr" placeholder="Remarks (If Any)" maxlength="200" title="Remarks (If Any)" onkeypress="return isAddress(event);" autocomplete="off" ></textarea>
          </td>

        </tr>
      </table>

        <input type="hidden" id="projid" name="projid" value="-1">
        <input type="hidden" id="projidupdate" name="projidupdate" value="0">
        <input type="hidden" id="projpno" name="projpno" value="1">
        <input class="login-input-btn" style="margin: 15px 0 0 300px" type="submit" value="Save"><!--submit button-->
        <input class="login-input-btn" style="margin: 15px 0 0 10px; width: 70px;" type="button" value="Cancel" onclick="cancelfade('.$newproject.');"><!--cancel button-->
        <input class="login-input-btn" style="margin: 15px 0 0 10px" type="button" value="Reset" onclick="resetfade('.$newproject.');">

  </form> 
</div>';
}













/*all lists*/

function getUserList()
{
$userlist="'user-list-div-id'";
$newuser="'add_new_user_form'";

$printmsg=getMsg();
$pageno=array();
$pageno=getPagination('user-list-div-id');

$query="WITH LIMIT AS
        ( 
        select ROW_NUMBER() OVER (ORDER BY id DESC) As '#',
        id,name,loginid,password,usertype,status,CONVERT(char(11), createdon ,106)  as createdon,createdby=(select name from padma_login c where c.id=p.CREATEDBY) 
        from padma_login p where id!=1
        ) 
        select * from LIMIT WHERE # BETWEEN ".$pageno[0]." AND ".$pageno[1];

echo '
<div id="user-list-div-id" class="user-list-div">

  <div style="width: 100%; height: 72px; margin: 0;">

    <p style="height: 30px; width: 100%; margin:0; background-color: #337ab7; border-radius: 3px;">
      <span class="form-text">User List</span>
      <span onclick="cancelfade('.$userlist.');" title="Close" style="float: right; cursor: pointer;">
        <img src="images/close.png" alt="close" class="span-text">
      </span>
    </p>

    <div style="float: right; width: 250px;">
      <input class="login-input-btn" style="float: right; margin: 5px 15px 5px 10px; width: 68px;" type="button" value="Export" onclick="export('.$newuser.');">
      <input class="login-input-btn" style="float: right; margin: 5px 0 5px 0; width: 130px;" type="button" value="Add New User" onclick="displayfade('.$newuser.');">
    </div>' ;

echo $printmsg;

echo $pageno[2];

  echo '
  </div>

  <table cellspacing="0" cellpadding="0" width="100%" border="0" style="border-spacing: 0px; text-align: left;">
    <thead style="margin-left: 100px; background-color: #337ab7; line-height: 35px; color: white; font-size: 13px;">
      <tr>
        <th width=30 style="padding-left: 5px">#</th>
        <th width=320>Name</th> 
        <th width=200>LoginID</th>
        <th width=90>Usertype</th>
        <th width=80>Status</th> 
        <th width=130>Created On</th> 
        <th width=130>Created By</th> 
        <th width=>Action</th>
      </tr>
    </thead>
  </table>
  <table class="demotable" cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0px; text-align: left;">';

$conn=db_conn();

if($conn)
{

  $result=mssql_query($query);
  $i=0;

  if(mssql_num_rows($result)>0)
  {
    while($row=mssql_fetch_assoc($result)) 
    {
      //echo '<tr><td colspan="8" style="padding: 4px;"></td></tr>';
      if($i%2==0)
        echo '<tr class="odd">';
      else
        echo '<tr class="even">';

      echo '<td width=30 class="tabledata" style="padding-left: 6px;">'.$row["#"].'</td>';
      echo '<td style="display: none;">'.$row["id"].'</td>';
      echo '<td width=330 class="tabledata">'.$row["name"].'</td>';
      echo '<td width=200 class="tabledata">'.$row["loginid"].'</td>';
      echo '<td width=70 class="tabledata">'.$row["usertype"].'</td>';
      echo '<td width=93 class="tabledata">';
      if($row["status"]==1)
        echo '<span style="background-color: #DFF2BF; color: green; padding: 0 13px 0 13px; border: 1px solid green;">Active</span>';
      else
        echo '<span style="background-color: #FFBABA; color: red; padding: 0 7px 0 7px; border: 1px solid red;">Inactive</span>';
      echo '</td>';
      echo '<td width=140 class="tabledata">'.$row["createdon"].'</td>';
      echo '<td width=125 class="tabledata">'.$row["createdby"].'</td>';

      $uid="'".$row["id"]."'";
      $name="'".$row["name"]."'";
      $loginid="'".$row["loginid"]."'";
      $password="'".base64_decode($row["password"])."'";
      $usertype="'".$row["usertype"]."'";
      $status=$row["status"];

      $update="1";

      echo '<td width=67 class="tabledata" style="border-right: 1px solid black;"><input type="button" class="editimagebtn" title="Edit" value="" onclick="displayusereditbox('.$newuser.','.$uid.','.$name.','.$loginid.','.$password.','.$usertype.','.$status.','.$update.');"</td>';

      /*echo '<td width=52 class="tabledata" style="border-right: 1px solid black;"><input type="button" title="View '.str_replace("'","",strtoupper($name)).' Details" class="viewimagebtn" disabled></td>';*/

      echo '</tr>';
      //echo 'this contains data: '.$result;
      $i++;
    }
  }
  else
  {
    //echo 'this contains no data: '.$result;
  }
  mssql_close($conn);
}
else
{
  die("db error: ".mssql_get_last_message());
}

echo '</table>'.$pageno[2].'</div>';

}

function getEmployeeList()
{
$emplist="'emp-list-div-id'";
$empdetail="'emp-detail-div-id'";
$newemployee="'add_new_employee_form'";

$printmsg=getMsg($msg);
$pageno=array();
$pageno=getPagination('emp-list-div-id');

$query="WITH LIMIT AS
          ( 
          select ROW_NUMBER() OVER (ORDER BY id DESC) As '#',
          id,firstname,lastname,FIRSTNAME+' '+LASTNAME as name,age,cno1,cno2,cno3,localaddr,villageaddr,
          CONVERT(char(11), DOJ ,106) as doj,aadhar,pan,activestatus,photopath,aadharpath,panpath,passportpath,otherpath
          from padma_employee
          ) 
          select * from LIMIT WHERE # BETWEEN ".$pageno[0]." AND ".$pageno[1];

echo '
<div id="emp-list-div-id" class="emp-list-div">

  <div style="width: 100%; height: 72px; margin: 0;">

    <p style="height: 30px; width: 100%; margin:0; background-color: #337ab7; border-radius: 3px;">
      <span class="form-text">Employee List</span>
      <span onclick="cancelfade('.$emplist.');" title="Close" style="float: right; cursor: pointer;">
        <img src="images/close.png" alt="close" class="span-text">
      </span>
    </p>

    <div style="float: right; width: 270px;">
      <input class="login-input-btn" style="float: right; margin: 5px 15px 5px 10px; width: 68px;" type="button" value="Export" onclick="export('.$newemployee.');">
      <input class="login-input-btn" style="float: right; margin: 5px 0 5px 0; width: 167px;" type="button" value="Add New Employee" onclick="displayfade('.$newemployee.');">
    </div>';

echo $printmsg;

echo $pageno[2];

  echo '
  </div>

  <table cellspacing="0" cellpadding="0" width="100%" border="0" style="border-spacing: 0px; text-align: left; ">
    <thead style="margin-left: 100px; ; background-color: #337ab7; line-height: 35px; color: white; font-size: 13px;">
      <tr>
        <th width=30 style="padding-left: 5px">#</th>
        <th width=305>Name</th> 
        <th width=65>Age</th>
        <th width=125>Phone #1</th>
        <!--th width=120>Phone #2</th>
        <th width=120>Phone #3</th-->
        <!--th width=280>Local Address</th-->
        <!--th width=140>Village Addr</th-->
        <th width=100>DOJ</th>
        <th width=120>Aadhar</th>
        <th width=100>PAN</th> 
        <th width=100>Active</th>
        <th width=100>Action</th>
      </tr>
    </thead>
  </table>
  <table class="demotable" cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0px; text-align: left;">';

$conn=db_conn();

if($conn)
{
  $result=mssql_query($query);
  $i=0;

  if(mssql_num_rows($result)>0)
  {
    while($row=mssql_fetch_assoc($result)) 
    {
      //echo '<tr><td colspan="8" style="padding: 4px;"></td></tr>';
      if($i%2==0)
        echo '<tr class="odd">';
      else
        echo '<tr class="even">';

      echo '<td width=30 class="tabledata" style="padding-left: 6px;">'.$row["#"].'</td>';
      echo '<td style="display: none;">'.$row["id"].'</td>';
      echo '<td style="display: none;">'.$row["firstname"].'</td>';
      echo '<td style="display: none;">'.$row["lastname"].'</td>';
      echo '<td width=320 class="tabledata">'.$row["name"].'</td>';
      echo '<td width=50 class="tabledata">'.$row["age"].'</td>';
      echo '<td width=120 class="tabledata">'.$row["cno1"].'</td>';
      /*echo '<td width=120 class="tabledata">'; 
      if($row["cno2"]==0)
        echo '<span>--/--</span>';
      else
        echo $row["cno2"];
      echo '</td>'; 
      echo '<td width=120 class="tabledata">';
      if($row["cno3"]==0)
        echo '<span>--/--</span>';
      else
        echo $row["cno3"];
      echo '</td>'; */
      //echo '<td width=300 class="tabledata">'.$row["localaddr"].'</td>';
      /*echo '<td width=140 class="tabledata">';
      if($row["villageaddr"]==null)
        echo '<span>--/--</span>';
      else
        echo $row["villageaddr"];
      echo '</td>'; */
      echo '<td width=105 class="tabledata">'.$row["doj"].'</td>';

      echo '<td width=120 class="tabledata">';
      if($row["aadhar"]==0)
        echo '<span>--/--</span>';
      else
        echo $row["aadhar"];
      echo '</td>';

      echo '<td width=120 class="tabledata">';
      if($row["pan"]==null||$row["pan"]=="")
        echo '<span>--/--</span>';
      else
        echo $row["pan"];
      echo '</td>';

      echo '<td width=100 class="tabledata">';
      if($row["activestatus"]==1)
        echo '<span style="background-color: #DFF2BF; color: green; padding: 0 10px 0 10px; border: 1px solid green;">Yes</span>';
      else
        echo '<span style="background-color: #FFBABA; color: red; padding: 0 7px 0 7px; border: 1px solid red;">No</span>';
      echo '</td>';
      
      $eid="'".$row["id"]."'";
      $firstname="'".$row["firstname"]."'";
      $lastname="'".$row["lastname"]."'";
      $age="'".$row["age"]."'";
      $cno1=$row["cno1"];
      $cno2=$row["cno2"]?$row["cno2"]:"''";
      $cno3=$row["cno3"]?$row["cno3"]:"''";
      $localaddr="'".$row["localaddr"]."'";
      $villageaddr="'".$row["villageaddr"]."'";
      $doj="'".str_replace(' ', '-', $row["doj"])."'";
      $aadhar=$row["aadhar"]?$row["aadhar"]:"''";
      $pan=$row["pan"]?"'".$row["pan"]."'":"''";
      $activestatus=$row["activestatus"];

      $photopath="'".base64_decode($row["photopath"])."'";
      $aadharpath="'".base64_decode($row["aadharpath"])."'";
      $panpath="'".base64_decode($row["panpath"])."'";
      $passportpath="'".base64_decode($row["passportpath"])."'";
      $otherpath="'".base64_decode($row["otherpath"])."'";

      $update="1";

      echo '<td width=30 class="tabledata"><input type="button" title="Edit" class="editimagebtn" value="" onclick="displayempeditbox('.$newemployee.','.$eid.','.$firstname.','.$lastname.','.$age.','.$cno1.','.$cno2.','.$cno3.','.$localaddr.','.$villageaddr.','.$doj.','.$aadhar.','.$pan.','.$activestatus.','.$photopath.','.$aadharpath.','.$panpath.','.$passportpath.','.$otherpath.','.$update.');"></td>';

      $empdurl="'?empd=".base64_encode("getEmployeeDetails")."&eid=".base64_encode(str_replace("'","",$eid))."'";

      echo '<td width=60 class="tabledata" style="border-right: 1px solid black;"><input type="button" title="View '.str_replace("'","",strtoupper($firstname)).' Details" class="viewimagebtn" onclick="viewdetailbox('.$empdetail.','.$empdurl.');"></td>';

      echo '</tr>';
      //echo 'this contains data: '.$result;
      $i++;
    }
  }
  else
  {
    //echo 'this contains no data: '.$result;
  }
  mssql_close($conn);
}
else
{
  die("db error: ".mssql_get_last_message());
}

echo '</table>'.$pageno[2].'</div>';

}

function getClientList()
{
$clientlist="'client-list-div-id'";
$clientdetail="'client-detail-div-id'";
$newclient="'add_new_client_form'";

$printmsg=getMsg($msg);
$pageno=array();
$pageno=getPagination('client-list-div-id');

$query="WITH LIMIT AS
        ( 
        select ROW_NUMBER() OVER (ORDER BY id DESC) As '#',
        id,companyname,billingaddr,gstno,panno
        from padma_client
        ) 
        select * from LIMIT WHERE # BETWEEN ".$pageno[0]." AND ".$pageno[1];

echo '
<div id="client-list-div-id" class="client-list-div">

  <div style="width: 100%; height: 72px; margin: 0;">

    <p style="height: 30px; width: 100%; margin:0; background-color: #337ab7; border-radius: 3px;">
      <span class="form-text">Customer List</span>
      <span onclick="cancelfade('.$clientlist.');" title="Close" style="float: right; cursor: pointer;">
        <img src="images/close.png" alt="close" class="span-text">
      </span>
    </p>

    <div style="float: right; width: 270px;">
      <input class="login-input-btn" style="float: right; margin: 5px 15px 5px 10px; width: 68px;" type="button" value="Export" onclick="export('.$newclient.');">
      <input class="login-input-btn" style="float: right; margin: 5px 0 5px 0; width: 167px;" type="button" value="Add New Customer" onclick="displayfade('.$newclient.');">
    </div>';

echo $printmsg;

echo $pageno[2];

  echo '
  </div> 

  <table cellspacing="0" cellpadding="0" width="100%" border="0" style="border-spacing: 0px; text-align: left; ">
    <thead style="margin-left: 100px; ; background-color: #337ab7; line-height: 35px; color: white; font-size: 13px;">

      <tr>
        <th width=20 style="padding-left: 5px">#</th>
        <th width=300>Company Name</th> 
        <th width=120>GST No.</th>
        <th width=100>PAN</th> 
        <th width=100>Action</th>
      </tr>

    </thead>
  </table>
  <table class="demotable" cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0px; text-align: left;">';

$conn=db_conn();

if($conn)
{
  $result=mssql_query($query);
  $i=0;

  if(mssql_num_rows($result)>0)
  {
    while($row=mssql_fetch_assoc($result)) 
    {
      //echo '<tr><td colspan="8" style="padding: 4px;"></td></tr>';
      if($i%2==0)
        echo '<tr class="odd">';
      else
        echo '<tr class="even">';

      echo '<td width=45 class="tabledata" style="padding-left: 6px;">'.$row["#"].'</td>';
      echo '<td style="display: none;">'.$row["id"].'</td>';
      echo '<td width=460 class="tabledata">'.$row["companyname"].'</td>';
   
      echo '<td width=210 class="tabledata">';
      if($row["gstno"]==null||$row["gstno"]=="")
        echo '<span>--/--</span>';
      else
        echo $row["gstno"];
      echo '</td>';

      echo '<td width=190 class="tabledata">';
      if($row["panno"]==null||$row["panno"]=="")
        echo '<span>--/--</span>';
      else
        echo $row["panno"];
      echo '</td>';

      $cid="'".$row["id"]."'";
      $companyname="'".$row["companyname"]."'";
      $billingaddr="'".$row["billingaddr"]."'";
      $gstno="'".$row["gstno"]."'";
      $panno="'".$row["panno"]."'";

      $update="1";

      echo '<td width=30 class="tabledata"><input type="button" class="editimagebtn" title="Edit" value="" onclick="displayclienteditbox('.$newclient.','.$cid.','.$companyname.','.$billingaddr.','.$gstno.','.$panno.','.$update.');"</td>';

      $clientdurl="'?clientd=".base64_encode("getClientDetails")."&page=".base64_encode(1)."&cid=".base64_encode(str_replace("'","",$cid))."'";

      echo '<td width=120 class="tabledata" style="border-right: 1px solid black;"><input type="button" title="View '.str_replace("'","",strtoupper($companyname)).' Details" class="viewimagebtn" onclick="viewdetailbox('.$clientdetail.','.$clientdurl.');"></td>';

      echo '</tr>';
      //echo 'this contains data: '.$result;
      $i++;
    }
  }
  else
  {
    //echo 'this contains no data: '.$result;
  }
  mssql_close($conn);
}
else
{
  die("db error: ".mssql_get_last_message());
}

echo '</table>'.$pageno[2].'</div>';

}

function getProjectList()
{
$emplist="'emp-list-div-id'";
$empdetail="'emp-detail-div-id'";
$newproject="'add_new_project_form'";

$printmsg=getMsg($msg);
$pageno=array();
$pageno=getPagination('emp-list-div-id');

$query="WITH LIMIT AS
          ( 
          select ROW_NUMBER() OVER (ORDER BY id DESC) As '#',
          id,firstname,lastname,FIRSTNAME+' '+LASTNAME as name,age,cno1,cno2,cno3,localaddr,villageaddr,
          CONVERT(char(11), DOJ ,106) as doj,aadhar,pan,activestatus,photopath,aadharpath,panpath,passportpath,otherpath
          from padma_employee
          ) 
          select * from LIMIT WHERE # BETWEEN ".$pageno[0]." AND ".$pageno[1];

echo '
<div id="emp-list-div-id" class="emp-list-div">

  <div style="width: 100%; height: 72px; margin: 0;">

    <p style="height: 30px; width: 100%; margin:0; background-color: #337ab7; border-radius: 3px;">
      <span class="form-text">Employee List</span>
      <span onclick="cancelfade('.$emplist.');" title="Close" style="float: right; cursor: pointer;">
        <img src="images/close.png" alt="close" class="span-text">
      </span>
    </p>

    <div style="float: right; width: 270px;">
      <input class="login-input-btn" style="float: right; margin: 5px 15px 5px 10px; width: 68px;" type="button" value="Export" onclick="export('.$newemployee.');">
      <input class="login-input-btn" style="float: right; margin: 5px 0 5px 0; width: 135px;" type="button" value="Add New Project" onclick="displayfade('.$newproject.');">
    </div>';

echo $printmsg;

echo $pageno[2];

  echo '
  </div>

  <table cellspacing="0" cellpadding="0" width="100%" border="0" style="border-spacing: 0px; text-align: left; ">
    <thead style="margin-left: 100px; ; background-color: #337ab7; line-height: 35px; color: white; font-size: 13px;">
      <tr>
        <th width=30 style="padding-left: 5px">#</th>
        <th width=305>Name</th> 
        <th width=65>Age</th>
        <th width=125>Phone #1</th>
        <!--th width=120>Phone #2</th>
        <th width=120>Phone #3</th-->
        <!--th width=280>Local Address</th-->
        <!--th width=140>Village Addr</th-->
        <th width=100>DOJ</th>
        <th width=120>Aadhar</th>
        <th width=100>PAN</th> 
        <th width=100>Active</th>
        <th width=100>Action</th>
      </tr>
    </thead>
  </table>
  <table class="demotable" cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0px; text-align: left;">';

$conn=db_conn();

if($conn)
{
  $result=mssql_query($query);
  $i=0;

  if(mssql_num_rows($result)>0)
  {
    while($row=mssql_fetch_assoc($result)) 
    {
      //echo '<tr><td colspan="8" style="padding: 4px;"></td></tr>';
      if($i%2==0)
        echo '<tr class="odd">';
      else
        echo '<tr class="even">';

      echo '<td width=30 class="tabledata" style="padding-left: 6px;">'.$row["#"].'</td>';
      echo '<td style="display: none;">'.$row["id"].'</td>';
      echo '<td style="display: none;">'.$row["firstname"].'</td>';
      echo '<td style="display: none;">'.$row["lastname"].'</td>';
      echo '<td width=320 class="tabledata">'.$row["name"].'</td>';
      echo '<td width=50 class="tabledata">'.$row["age"].'</td>';
      echo '<td width=120 class="tabledata">'.$row["cno1"].'</td>';
      /*echo '<td width=120 class="tabledata">'; 
      if($row["cno2"]==0)
        echo '<span>--/--</span>';
      else
        echo $row["cno2"];
      echo '</td>'; 
      echo '<td width=120 class="tabledata">';
      if($row["cno3"]==0)
        echo '<span>--/--</span>';
      else
        echo $row["cno3"];
      echo '</td>'; */
      //echo '<td width=300 class="tabledata">'.$row["localaddr"].'</td>';
      /*echo '<td width=140 class="tabledata">';
      if($row["villageaddr"]==null)
        echo '<span>--/--</span>';
      else
        echo $row["villageaddr"];
      echo '</td>'; */
      echo '<td width=105 class="tabledata">'.$row["doj"].'</td>';

      echo '<td width=120 class="tabledata">';
      if($row["aadhar"]==0)
        echo '<span>--/--</span>';
      else
        echo $row["aadhar"];
      echo '</td>';

      echo '<td width=120 class="tabledata">';
      if($row["pan"]==null||$row["pan"]=="")
        echo '<span>--/--</span>';
      else
        echo $row["pan"];
      echo '</td>';

      echo '<td width=100 class="tabledata">';
      if($row["activestatus"]==1)
        echo '<span style="background-color: #DFF2BF; color: green; padding: 0 10px 0 10px; border: 1px solid green;">Yes</span>';
      else
        echo '<span style="background-color: #FFBABA; color: red; padding: 0 7px 0 7px; border: 1px solid red;">No</span>';
      echo '</td>';
      
      $eid="'".$row["id"]."'";
      $firstname="'".$row["firstname"]."'";
      $lastname="'".$row["lastname"]."'";
      $age="'".$row["age"]."'";
      $cno1=$row["cno1"];
      $cno2=$row["cno2"]?$row["cno2"]:"''";
      $cno3=$row["cno3"]?$row["cno3"]:"''";
      $localaddr="'".$row["localaddr"]."'";
      $villageaddr="'".$row["villageaddr"]."'";
      $doj="'".str_replace(' ', '-', $row["doj"])."'";
      $aadhar=$row["aadhar"]?$row["aadhar"]:"''";
      $pan=$row["pan"]?"'".$row["pan"]."'":"''";
      $activestatus=$row["activestatus"];

      $photopath="'".base64_decode($row["photopath"])."'";
      $aadharpath="'".base64_decode($row["aadharpath"])."'";
      $panpath="'".base64_decode($row["panpath"])."'";
      $passportpath="'".base64_decode($row["passportpath"])."'";
      $otherpath="'".base64_decode($row["otherpath"])."'";

      $update="1";

      echo '<td width=30 class="tabledata"><input type="button" title="Edit" class="editimagebtn" value="" onclick="displayempeditbox('.$newemployee.','.$eid.','.$firstname.','.$lastname.','.$age.','.$cno1.','.$cno2.','.$cno3.','.$localaddr.','.$villageaddr.','.$doj.','.$aadhar.','.$pan.','.$activestatus.','.$photopath.','.$aadharpath.','.$panpath.','.$passportpath.','.$otherpath.','.$update.');"></td>';

      $empdurl="'?empd=".base64_encode("getEmployeeDetails")."&eid=".base64_encode(str_replace("'","",$eid))."'";

      echo '<td width=60 class="tabledata" style="border-right: 1px solid black;"><input type="button" title="View '.str_replace("'","",strtoupper($firstname)).' Details" class="viewimagebtn" onclick="viewdetailbox('.$empdetail.','.$empdurl.');"></td>';

      echo '</tr>';
      //echo 'this contains data: '.$result;
      $i++;
    }
  }
  else
  {
    //echo 'this contains no data: '.$result;
  }
  mssql_close($conn);
}
else
{
  die("db error: ".mssql_get_last_message());
}

echo '</table>'.$pageno[2].'</div>';

}












/* all details*/

function getEmployeeDetails()
{
$empdetail="'emp-detail-div-id'";
$urlvalue="'?emp=".base64_encode('getEmployeeList')."&page=".base64_encode($_SESSION['val'])."'";

if(isset($_GET['empd'])&&(isset($_GET['eid'])))
{
  $empd=base64_decode($_GET['empd']);
  $eid=base64_decode($_GET['eid']);
}

echo '
<div id="emp-detail-div-id" class="emp-detail-div">

  <p style="height: 30px; width: 100%; margin:0; background-color: #337ab7; border-radius: 3px;">
    <span class="form-text">Employee Detail</span>
    <span onclick="cancelfade('.$empdetail.','.$urlvalue.');" title="Close" style="float: right; cursor: pointer;">
      <img src="images/close.png" alt="close" class="span-text">
    </span>
  </p>';

echo '<table class="empviewtable" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; text-align: left; ">';

$conn=db_conn();

if($conn)
{
  $query="select *,CONVERT(char(11), DOJ ,106) as DOJ from padma_employee where id=".str_replace("'","",$eid);

  $result=mssql_query($query);

  if(mssql_num_rows($result)>0)
  {
    $row=mssql_fetch_assoc($result);
    extract($row);


$stat=$cno2=$cno3=$vaddr=$aadhar=$pan=$apath=$ppath=$papath=$othpath="";

    if($ACTIVESTATUS==1)
        $stat='<span style="background-color: #DFF2BF; color: green; padding: 0 10px 0 10px; border: 1px solid green;">Yes</span>';
    else if($ACTIVESTATUS==0)
        $stat='<span style="background-color: #FFBABA; color: red; padding: 0 7px 0 7px; border: 1px solid red;">No</span>';

    if($CNO2==0)
      $cno2='<span>--/--</span>';
    else
      $cno2=$CNO2;

    if($CNO3==0)
      $cno3='<span>--/--</span>';
    else
      $cno3=$CNO3;

    if($VILLAGEADDR==null)
      $vaddr='<span>--/--</span>';
    else
      $vaddr=$VILLAGEADDR;

    if($AADHAR==0)
      $aadhar='<span>--/--</span>';
    else
      $aadhar=$AADHAR;

    if($PAN==null)
      $pan='<span>--/--</span>';
    else
      $pan=$PAN;

    if(base64_decode($AADHARPATH)==null)
      $apath="hidden";
    else
      $apath="visibile";

    if(base64_decode($PANPATH)==null)
      $ppath="hidden";
    else
      $ppath="visibile";

    if(base64_decode($PASSPORTPATH)==null)
      $papath="hidden";
    else
      $papath="visibile";

    if(base64_decode($OTHERPATH)==null)
      $othpath="hidden";
    else
      $othpath="visibile";

    echo '
      <tr>

          <td rowspan="2" style="border-left: 0;">
            <div class="add-new-employee-image-box" title="Employee Photograph" style="margin-bottom: 5px;">
              <input type="image" src="'.base64_decode($PHOTOPATH).'" style="width: 200px; height: 180px; border:0; border-radius: 10px; display: block; pointer-events: none" value="" />
            </div>
          </td>

          <td style="vertical-align: baseline;">
            <div style="width: 200px;">
              <label style="color: #337ab7; margin-left: 5px;">Name:</label><br>
              <div style="color: black; margin-left: 5px;">'.$FIRSTNAME.' '.$LASTNAME.'</div>
            </div>
          </td>

          <td style="vertical-align: baseline;">
            <div style="width: 200px;">
              <label style="color: #337ab7; margin-left: 5px;">Age:</label>
              <div style="color: black; margin-left: 5px;">'.$AGE.'</div>
            </div>
          </td>

          <td style="vertical-align: baseline; border-right: 0;">
            <div style="width: 200px;">
              <label style="color: #337ab7; margin-left: 5px;">Active:</label>
              <div style="color: black; margin-left: 5px;">'.$stat.'</div>
            </div>
          </td>

      </tr>
      <tr>

          <td style="vertical-align: baseline; border-right: 0;">
            <div style="width: 200px;">
              <label style="color: #337ab7; margin-left: 5px;">Contact No.1:</label>
              <div style="color: black; margin-left: 5px;">'.$CNO1.'</div>
            </div>
          </td>

          <td style="vertical-align: baseline; border-right: 0;">
            <div style="width: 200px;">
              <label style="color: #337ab7; margin-left: 5px;">Contact No.2:</label>
              <div style="color: black; margin-left: 5px;">'.$cno2.'</div>
            </div>
          </td>

          <td style="vertical-align: baseline; border-right: 0;">
            <div style="width: 200px;">
              <label style="color: #337ab7; margin-left: 5px;">Contact No.3:</label>
              <div style="color: black; margin-left: 5px;">'.$cno3.'</div>
            </div>
          </td>

      </tr>
      <tr>

          <td colspan="2">
            <div style="width: 546px; height: 100px; word-wrap: break-word; overflow: auto;">
              <label style="color: #337ab7; margin-left: 5px;">Local Address:</label>
              <div style="color: black; margin-left: 5px;">'.$LOCALADDR.'</div>
            </div>
          </td>

          <td colspan="2" style="vertical-align: baseline; border-right: 0;">
            <div style="width: 546px; height: 100px; word-wrap: break-word; overflow: auto;">
              <label style="color: #337ab7; margin-left: 5px;">Village Address:</label>
              <div style="color: black; margin-left: 5px;">'.$vaddr.'</div>
            </div>
          </td>

      </tr>
      <tr>

          <td>
            <label style="color: #337ab7; margin-left: 5px;">Date of Joining:</label>
            <div style="color: black; margin-left: 5px;">'.$DOJ.'</div>
          </td>

          <td>
            <label style="color: #337ab7; margin-left: 5px;">Aadhar Card No.</label>
            <div style="color: black; margin-left: 5px;">'.$aadhar.'</div>
          </td>

          <td colspan="2" style="border-right: 0;">
            <label style="color: #337ab7; margin-left: 5px;">PAN Card No.</label>
            <div style="color: black; margin-left: 5px;">'.$pan.'</div>
          </td>

      </tr>
      <tr>

          <td style="vertical-align: baseline;">
            <div style="color: #337ab7; margin-left: 5px;">Aadhar Card</div>
            <div style="color: black; margin-left: 5px;">
              <a href="'.base64_decode($AADHARPATH).'" target="_blank" style="margin-left: 5px; visibility:'.$apath.';" title="View Aadhar Card"><img src="images/download.png" alt="download" style="height: 18px; width: 18px;"></a>
            </div>
          </td>

          <td style="vertical-align: baseline;"> 
            <label style="color: #337ab7; margin-left: 5px;">PAN Card</label>
            <div style="color: black; margin-left: 5px;">
              <a href="'.base64_decode($PANPATH).'" target="_blank" style="margin-left: 5px; visibility:'.$ppath.';"" title="View PAN Card"><img src="images/download.png" alt="download" style="height: 18px; width: 18px;"></a>
            </div>  
          </td>

          <td style="vertical-align: baseline;"> 
            <label style="color: #337ab7; margin-left: 5px;">Passport</label>
            <div style="color: black; margin-left: 5px;">
              <a href="'.base64_decode($PASSPORTPATH).'" target="_blank" style="margin-left: 5px; visibility:'.$papath.';" title="View Passport"><img src="images/download.png" alt="download" style="height: 18px; width: 18px;"></a>
            </div>
          </td>

          <td style="vertical-align: baseline; border-right: 0;">
            <label style="color: #337ab7; margin-left: 5px;">Other</label>
            <div style="color: black; margin-left: 5px;">
              <a href="'.base64_decode($OTHERPATH).'" target="_blank" style="margin-left: 5px; visibility:'.$othpath.';" title="View Other Doc"><img src="images/download.png" alt="download" style="height: 18px; width: 18px;"></a>
            </div>
          </td>

      </tr>';
    
  }
  else
  {
    //echo 'this contains no data: '.$result;
  }
  mssql_close($conn);
}
else
{
  die("db error: ".mssql_get_last_message());
}

echo '
  </table>

</div>';

}

function getClientDetails()
{
$clientdetail="'client-detail-div-id'";
$urlvalue="'?client=".base64_encode('getClientList')."&page=".base64_encode($_SESSION['val'])."'";

$newcontactperson="'add_new_contact_person_form'";

if(isset($_GET['clientd'])&&(isset($_GET['cid'])))
{
  $clientd=base64_decode($_GET['clientd']);
  $cid=base64_decode($_GET['cid']); 
}

$printmsg=getMsg($msg);

echo '
<div id="client-detail-div-id" class="client-detail-div">

  <p style="height: 30px; width: 100%; margin:0; background-color: #337ab7; border-radius: 3px;">
    <span class="form-text">Customer Detail</span>
    <span onclick="cancelfade('.$clientdetail.','.$urlvalue.');" title="Close" style="float: right; cursor: pointer;">
      <img src="images/close.png" alt="close" class="span-text">
    </span>
  </p>';

echo '<table class="clientviewtable" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; text-align: left;">';

$conn=db_conn();

if($conn)
{
  $query="select * from padma_client where id=".str_replace("'","",$cid);

  $result=mssql_query($query);

  if(mssql_num_rows($result)>0)
  {
    $row=mssql_fetch_assoc($result);
    extract($row);

    $gstno=$panno="";

    if($GSTNO==null)
      $gstno='<span>--/--</span>';
    else
      $gstno=$GSTNO;

    if($PANNO==null)
      $panno='<span>--/--</span>';
    else
      $panno=$PANNO;

    echo '
      <tr>

          <td style="vertical-align: baseline; border-left: 0;">
            <div style="width: 200px; height: 50px;">
              <label style="color: #337ab7; margin-left: 5px;">Company Name:</label><br>
              <div style="color: black; margin-left: 5px;">'.$COMPANYNAME.'</div>
            </div>
          </td>

          <td style="vertical-align: baseline;">
            <div style="width: 200px;">
              <label style="color: #337ab7; margin-left: 5px;">GST No.:</label>
              <div style="color: black; margin-left: 5px;">'.$gstno.'</div>
            </div>
          </td>

          <td style="vertical-align: baseline; border-right: 0;">
            <div style="width: 200px;">
              <label style="color: #337ab7; margin-left: 5px;">PAN No.:</label>
              <div style="color: black; margin-left: 5px;">'.$panno.'</div>
            </div>
          </td>

      </tr>
      <tr>

          <td colspan="3" style="vertical-align: baseline; border-right: 0;">
            <div style="width: 1079px; height: 100px; word-wrap: break-word; overflow: auto;">
              <label style="color: #337ab7; margin-left: 5px;">Billing Address:</label>
              <div style="color: black; margin-left: 5px;">'.$BILLINGADDR.'</div>
            </div>
          </td>

      </tr>';
    
  }
  else
  {
    //echo 'this contains no data: '.$result;
  }
  mssql_close($conn); 
}
else
{
  die("db error: ".mssql_get_last_message());
}

$tab1="contact-person-list-div-id";

$pageno=array();
$pageno=getPagination('contact-person-list-div-id',$cid);

echo '
  </table>

  <div style="width: 100%; margin: 0;">

    <div style="float: right; width: 320px;">
      <input class="login-input-btn" style="float: right; margin: 5px 15px 5px 10px; width: 68px;" type="button" value="Export" onclick="export('.$newcontactperson.');">
      <input class="login-input-btn" style="float: right; margin: 5px 0 5px 0; width: 210px;" type="button" value="Add New Contact Person" onclick="displayfade('.$newcontactperson.');">
    </div>';

echo $printmsg;

echo $pageno[2];

 echo' 
 </div>

  <div class="tab" style="width: 99.80%;">
    <button class="tablinks" onclick="openCity(event,'.$tab1.')">Contact Person</button>
  </div>

  <table cellspacing="0" cellpadding="0" width="100%" border="0" style="border-spacing: 0px; text-align: left; ">
    <thead style="margin-left: 100px; ; background-color: #337ab7; line-height: 35px; color: white; font-size: 13px;">

      <tr>
        <th width=40 style="padding-left: 5px">#</th>
        <th width=590>Name</th> 
        <th width=160>Phone #1</th>
        <th width=160>Phone #2</th>
        <th width=200>Email-ID</th>
        <th width=175>Action</th>
      </tr>

    </thead>
  </table>

  <div id="contact-person-list-div-id" class="contact-person-list-div">

  <table class="cpdemotable" cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0px; text-align: left;">';

$conn=db_conn();

if($conn)
{
  $query="WITH LIMIT AS
        ( 
        select ROW_NUMBER() OVER (ORDER BY id DESC) As '#',
        id,contactpersonname,cno1,cno2,email,cid
        from padma_contactperson
        where cid=".$cid."
        ) 
        select * from LIMIT WHERE # BETWEEN ".$pageno[0]." AND ".$pageno[1];

  $result=mssql_query($query);
  $i=0;

  if(mssql_num_rows($result)>0)
  {
    while($row=mssql_fetch_assoc($result)) 
    {
      //echo '<tr><td colspan="8" style="padding: 4px;"></td></tr>';
      if($i%2==0)
        echo '<tr class="odd">';
      else
        echo '<tr class="even">';

      echo '<td width=40 class="tabledata" style="padding-left: 6px;">'.$row["#"].'</td>';
      echo '<td style="display: none;">'.$row["id"].'</td>';
      echo '<td width=450 class="tabledata">'.$row["contactpersonname"].'</td>';
      echo '<td width=135 class="tabledata">'.$row["cno1"].'</td>';
   
      echo '<td width=135 class="tabledata">';
      if($row["cno2"]==0)
        echo '<span>--/--</span>';
      else
        echo $row["cno2"];
      echo '</td>';

      echo '<td width=180 class="tabledata">';
      if($row["email"]==null)
        echo '<span>--/--</span>';
      else
        echo $row["email"];
      echo '</td>';

      $cpid="'".$row["id"]."'";
      $contactpersonname="'".$row["contactpersonname"]."'";
      $cno1=$row["cno1"];
      $cno2=$row["cno2"]?$row["cno2"]:"''";
      $email="'".$row["email"]."'";
      $email="'".$row["email"]."'";

      $update="1";

      echo '<td width=115 class="tabledata" style="border-right: 1px solid black;"><input type="button" class="editimagebtn" title="Edit" value="" onclick="displaycpeditbox('.$newcontactperson.','.$cpid.','.$contactpersonname.','.$cno1.','.$cno2.','.$email.','.$cid.','.$update.');"</td>';

      echo '</tr>';
      //echo 'this contains data: '.$result;
      $i++;
    }
  }
  else
  {
    //echo 'this contains no data: '.$result;
  }
  mssql_close($conn);
}
else
{
  die("db error: ".mssql_get_last_message());
}

echo '</table>
  </div>';

echo $pageno[2];

echo '</div>';
}



?>

