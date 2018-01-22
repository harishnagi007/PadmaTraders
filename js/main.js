
/*window.onscroll = function() 
                  {
                    myFunction();
                  };
var sticky=document.getElementById("index-main-nav-id").offsetTop;

function myFunction() 
{
  if (window.pageYOffset>=sticky) 
  {
    document.getElementById("index-main-nav-id").classList.add("index-scroll-menu")
    document.getElementById("index-main-content-id").style.paddingTop="60px";
  } 
  else 
  {
    document.getElementById("index-main-content-id").style.paddingTop="16px";
    document.getElementById("index-main-nav-id").classList.remove("index-scroll-menu");
  }
}*/

$(document).click(function(e) 
{//alert("asd");  
    if($('#user-menu-id:visible').length!=0)
    {
      //alert("visible");
      if(e.target.id!="mid" || e.target.id!="user-menu-id" ) 
        $('#user-menu-id').hide(200);
        //$("#user-menu-id").css("display", "none");
    }              
    else if($('#user-menu-id:visible').length==0)
    {
      //alert("not visible");
      if(e.target.id=="mid" || e.target.id=="user-menu-id" ) 
        $('#user-menu-id').show(200);
        //$("#user-menu-id").css("display", "block");
    }

    if($('#sidebar-sub-menu-id:visible').length!=0)
    {
      if(e.target.id=="aaid")   
      {
        $('#sidebar-sub-menu-id').hide(200);
        /*$('#iid').removeClass('fa fa-angle-down');
        $('#iid').addClass('fa fa-angle-left');*/
      }
    }              
    else if($('#sidebar-sub-menu-id:visible').length==0)
    {
      if(e.target.id=="aaid") 
      {
        $('#sidebar-sub-menu-id').show(200);
        $('#sidebar-sub-menu-id1').hide(200);
        /*$('#iid').removeClass('fa fa-angle-left');
        $('#iid').addClass('fa fa-angle-down');*/
      }
    }

    if($('#sidebar-sub-menu-id1:visible').length!=0)
    {
      if(e.target.id=="sid") 
        $('#sidebar-sub-menu-id1').hide(200);
    }              
    else if($('#sidebar-sub-menu-id1:visible').length==0)
    {
      if(e.target.id=="sid") 
      {
        $('#sidebar-sub-menu-id1').show(200);
        $('#sidebar-sub-menu-id').hide(200);
      }
    }
});

function clickme()
{
/*  if(document.getElementById("user-menu-id").style.display=="block")
    document.getElementById("user-menu-id").style.display="none";
  else
    document.getElementById("user-menu-id").style.display="block";*/  
}

function callme()
{
  if(document.getElementById("lastlogin").innerHTML=="")
    document.getElementById("lastlogin").innerHTML=myvar;
  else
    document.getElementById("lastlogin").innerHTML="";
}

function validateAndSubmit(formname)
{
  /*user form validation*/
  if(formname=="add_new_user_form")
  {
    if(document.getElementById("user_id1").value=="")
    {
      document.getElementById("user_divid1").style.visibility="visible";
      document.getElementById("user_divid1").innerHTML="Enter User Name";
      document.getElementById("user_id1").focus();
      return false;
    }
    else if((document.getElementById("user_id1").value).length<3)
    {
      document.getElementById("user_divid1").style.visibility="visible";
      document.getElementById("user_divid1").innerHTML="Length to be between 3 and 20";
      document.getElementById("user_id1").focus();
      return false;
    }
    else
      document.getElementById("user_divid1").style.visibility="hidden";

    if(document.getElementById("user_id2").value=="")
    {
      document.getElementById("user_divid2").style.visibility="visible";
      document.getElementById("user_divid2").innerHTML="Enter LoginID";
      document.getElementById("user_id2").focus();
      return false;
    }
    else if((document.getElementById("user_id2").value).length<3)
    {
      document.getElementById("user_divid2").style.visibility="visible";
      document.getElementById("user_divid2").innerHTML="Length to be between 3 and 20";
      document.getElementById("user_id2").focus();
      return false;
    }
    else
      document.getElementById("user_divid2").style.visibility="hidden";

    if(document.getElementById("user_id3").value=="")
    {
      document.getElementById("user_divid3").style.visibility="visible";
      document.getElementById("user_divid3").innerHTML="Enter Password";
      document.getElementById("user_id3").focus();
      return false;
    }
    else if((document.getElementById("user_id3").value).length<3)
    {
      document.getElementById("user_divid3").style.visibility="visible";
      document.getElementById("user_divid3").innerHTML="Length to be between 3 and 15";
      document.getElementById("user_id3").focus();
      return false;
    }
    else
      document.getElementById("user_divid3").style.visibility="hidden";

    if(document.getElementById("user_id4").value=="")
    {
      document.getElementById("user_divid4").style.visibility="visible";
      document.getElementById("user_divid4").innerHTML="Retype Password";
      document.getElementById("user_id4").focus();
      return false; 
    }
    else if((document.getElementById("user_id4").value).length<3)
    {
      document.getElementById("user_divid4").style.visibility="visible";
      document.getElementById("user_divid4").innerHTML="Length to be between 3 and 15";
      document.getElementById("user_id4").focus();
      return false;
    }
    else if((document.getElementById("user_id3").value)!=(document.getElementById("user_id4").value))
    {
      document.getElementById("user_divid4").style.visibility="visible";
      document.getElementById("user_divid4").innerHTML="Password not matching";
      document.getElementById("user_id4").focus();
      return false;
    }
    else
      document.getElementById("user_divid4").style.visibility="hidden";

    if((document.getElementById("user_id5")).selectedIndex==0)
    {
      document.getElementById("user_divid5").style.visibility="visible";
      document.getElementById("user_divid5").innerHTML="Select User type";
      document.getElementById("user_id5").focus();
      return false;
    }
    else
      document.getElementById("user_divid5").style.visibility="hidden";

    if((document.getElementById("user_id6")).selectedIndex==0)
    {
      document.getElementById("user_divid6").style.visibility="visible";
      document.getElementById("user_divid6").innerHTML="Select Status";
      document.getElementById("user_id6").focus();
      return false;
    }
    else
      document.getElementById("user_divid6").style.visibility="hidden";

    //submit the form if all validated
    //document.getElementById('add_new_user_form').submit();
    return;
  }




  /*employee form validation*/
  if(formname=="add_new_employee_form")
  {
    /*if(document.getElementById("emp_select_img").files.length==0)
    {
      document.getElementById("emp_dividimg").style.visibility="visible";
      document.getElementById("emp_dividimg").innerHTML="Select Employee Photograph";
      document.getElementById("emp_select_img").focus();
      return false;
    }
    else
      document.getElementById("emp_dividimg").style.visibility="hidden";*/

    if(document.getElementById("emp_id1").value=="")
    {
      document.getElementById("emp_divid1").style.visibility="visible";
      document.getElementById("emp_divid1").innerHTML="Enter Employee First Name";
      document.getElementById("emp_id1").focus();
      return false;
    }
    else if((document.getElementById("emp_id1").value).length<3)
    {
      document.getElementById("emp_divid1").style.visibility="visible";
      document.getElementById("emp_divid1").innerHTML="Length to be between 3 and 20";
      document.getElementById("emp_id1").focus();
      return false;
    }
    else
      document.getElementById("emp_divid1").style.visibility="hidden";

    if(document.getElementById("emp_id2").value=="")
    {
      document.getElementById("emp_divid2").style.visibility="visible";
      document.getElementById("emp_divid2").innerHTML="Enter Employee Last Name";
      document.getElementById("emp_id2").focus();
      return false;
    }
    else if((document.getElementById("emp_id2").value).length<3)
    {
      document.getElementById("emp_divid2").style.visibility="visible";
      document.getElementById("emp_divid2").innerHTML="Length to be between 3 and 20";
      document.getElementById("emp_id2").focus();
      return false;
    }
    else
      document.getElementById("emp_divid2").style.visibility="hidden";

    if(document.getElementById("emp_id3").value=="")
    {
      document.getElementById("emp_divid3").style.visibility="visible";
      document.getElementById("emp_divid3").innerHTML="Enter Employee Age";
      document.getElementById("emp_id3").focus();
      return false;
    }
    else if((document.getElementById("emp_id3").value)>100)
    {
      document.getElementById("emp_divid3").style.visibility="visible";
      document.getElementById("emp_divid3").innerHTML="Enter Valid age (1-100)";
      document.getElementById("emp_id3").focus();
      return false;
    }
    else
      document.getElementById("emp_divid3").style.visibility="hidden";

    if(document.getElementById("emp_id4").value=="")
    {
      document.getElementById("emp_divid4").style.visibility="visible";
      document.getElementById("emp_divid4").innerHTML="Enter Contact Number";
      document.getElementById("emp_id4").focus();
      return false;
    }
    else if(((document.getElementById("emp_id4").value).length<8)||(document.getElementById("emp_id4").value).length>12)
    {
      document.getElementById("emp_divid4").style.visibility="visible";
      document.getElementById("emp_divid4").innerHTML="Number length between 8 to 12";
      document.getElementById("emp_id4").focus();
      return false;
    }
    else
      document.getElementById("emp_divid4").style.visibility="hidden";

    if(document.getElementById("emp_id5").value!="")
    {
      if(((document.getElementById("emp_id5").value).length<8)||(document.getElementById("emp_id5").value).length>12)
      {
        document.getElementById("emp_divid5").style.visibility="visible";
        document.getElementById("emp_divid5").innerHTML="Number length between 8 to 12";
        document.getElementById("emp_id5").focus();
        return false;
      }
      else
        document.getElementById("emp_divid5").style.visibility="hidden";
    }
    else
      document.getElementById("emp_divid5").style.visibility="hidden";

    if(document.getElementById("emp_id6").value!="")
    {
      if(((document.getElementById("emp_id6").value).length<8)||(document.getElementById("emp_id6").value).length>12)
      {
        document.getElementById("emp_divid6").style.visibility="visible";
        document.getElementById("emp_divid6").innerHTML="Number length between 8 to 12";
        document.getElementById("emp_id6").focus();
        return false;
      }
      else
        document.getElementById("emp_divid6").style.visibility="hidden";
    }
    else
      document.getElementById("emp_divid6").style.visibility="hidden";

    if(document.getElementById("emp_id7").value=="")
    {
      document.getElementById("emp_divid7").style.visibility="visible";
      document.getElementById("emp_divid7").innerHTML="Enter Local Address";
      document.getElementById("emp_id7").focus();
      return false;
    }
    else
      document.getElementById("emp_divid7").style.visibility="hidden";

    if(document.getElementById("emp_id10").value!="")
    {
      if((document.getElementById("emp_id10").value).length<12) 
      {
        document.getElementById("emp_divid10").style.visibility="visible";
        document.getElementById("emp_divid10").innerHTML="Length cannot be less than 12";
        document.getElementById("emp_id10").focus();
        return false;
      }
      else
        document.getElementById("emp_divid10").style.visibility="hidden";
    }
    else
      document.getElementById("emp_divid10").style.visibility="hidden";

    if(document.getElementById("emp_id11").value!="")
    {
      if((document.getElementById("emp_id11").value).length<10) 
      {
        document.getElementById("emp_divid11").style.visibility="visible";
        document.getElementById("emp_divid11").innerHTML="Length cannot be less than 10";
        document.getElementById("emp_id11").focus();
        return false;
      }
      else
        document.getElementById("emp_divid11").style.visibility="hidden";
    }
    else
      document.getElementById("emp_divid11").style.visibility="hidden";

    if((document.getElementById("emp_id12")).selectedIndex==0)
    {
      document.getElementById("emp_divid12").style.visibility="visible";
      document.getElementById("emp_divid12").innerHTML="Select Status";
      document.getElementById("emp_id12").focus();
      return false;
    }
    else
      document.getElementById("emp_divid12").style.visibility="hidden";

    return;
  }



/*client form validation*/
  if(formname=="add_new_client_form")
  {
    if(document.getElementById("client_id1").value=="")
    {
      document.getElementById("client_divid1").style.visibility="visible";
      document.getElementById("client_divid1").innerHTML="Enter Company Name";
      document.getElementById("client_id1").focus();
      return false;
    }
    else if((document.getElementById("client_id1").value).length<3)
    {
      document.getElementById("client_divid1").style.visibility="visible";
      document.getElementById("client_divid1").innerHTML="Length to be between 3 and 30";
      document.getElementById("client_id1").focus();
      return false;
    }
    else
      document.getElementById("client_divid1").style.visibility="hidden";

    if(document.getElementById("client_id2").value=="")
    {
      document.getElementById("client_divid2").style.visibility="visible";
      document.getElementById("client_divid2").innerHTML="Enter Billing Address";
      document.getElementById("client_id2").focus();
      return false;
    }
    else
      document.getElementById("client_divid2").style.visibility="hidden";

    if(document.getElementById("client_id3").value!="")
    {
      if((document.getElementById("client_id3").value).length<15) 
      {
        document.getElementById("client_divid3").style.visibility="visible";
        document.getElementById("client_divid3").innerHTML="Length cannot be less than 15";
        document.getElementById("client_id3").focus();
        return false;
      }
      else
        document.getElementById("client_divid3").style.visibility="hidden";
    }
    else
      document.getElementById("client_divid3").style.visibility="hidden";

    if(document.getElementById("client_id4").value!="")
    {
      if((document.getElementById("client_id4").value).length<10) 
      {
        document.getElementById("client_divid4").style.visibility="visible";
        document.getElementById("client_divid4").innerHTML="Length cannot be less than 10";
        document.getElementById("client_id4").focus();
        return false;
      }
      else
        document.getElementById("client_divid4").style.visibility="hidden";
    }
    else
      document.getElementById("client_divid4").style.visibility="hidden";
    
    return;
  }


/*contact person form validation*/
  if(formname=="add_new_contact_person_form")
  {
    if(document.getElementById("cp_id1").value=="")
    {
      document.getElementById("cp_divid1").style.visibility="visible";
      document.getElementById("cp_divid1").innerHTML="Enter Contact Person Name";
      document.getElementById("cp_id1").focus();
      return false;
    }
    else if((document.getElementById("cp_id1").value).length<3)
    {
      document.getElementById("cp_divid1").style.visibility="visible";
      document.getElementById("cp_divid1").innerHTML="Length to be between 3 and 20";
      document.getElementById("cp_id1").focus();
      return false;
    }
    else
      document.getElementById("cp_divid1").style.visibility="hidden";

    if(document.getElementById("cp_id2").value=="")
    {
      document.getElementById("cp_divid2").style.visibility="visible";
      document.getElementById("cp_divid2").innerHTML="Enter Contact Number";
      document.getElementById("cp_id2").focus();
      return false;
    }
    else if(((document.getElementById("cp_id2").value).length<8)||(document.getElementById("cp_id2").value).length>12)
    {
      document.getElementById("cp_divid2").style.visibility="visible";
      document.getElementById("cp_divid2").innerHTML="Number length between 8 to 12";
      document.getElementById("cp_id2").focus();
      return false;
    }
    else
      document.getElementById("cp_divid2").style.visibility="hidden";

    if(document.getElementById("cp_id3").value!="")
    {
      if(((document.getElementById("cp_id3").value).length<8)||(document.getElementById("cp_id3").value).length>12)
      {
        document.getElementById("cp_divid3").style.visibility="visible";
        document.getElementById("cp_divid3").innerHTML="Number length between 8 to 12";
        document.getElementById("cp_id3").focus();
        return false;
      }
      else
        document.getElementById("cp_divid3").style.visibility="hidden";
    }
    else
      document.getElementById("cp_divid3").style.visibility="hidden";

    
    var reg= /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-])+\.([A-Za-z]{2,4})$/;

    if(document.getElementById("cp_id4").value!="")
    {
      if(reg.test(document.getElementById("cp_id4").value)==false)
      {
        document.getElementById("cp_divid4").style.visibility="visible";
        document.getElementById("cp_divid4").innerHTML="Enter Valid Email-ID";
        document.getElementById("cp_id4").focus();
        return false;
      }
      else
        document.getElementById("cp_divid4").style.visibility="hidden";
    }
    else
        document.getElementById("cp_divid4").style.visibility="hidden";
  
    return;
  }


/*email to list form validation*/
  if(formname=="add_new_email_to_list_form")
  {
    if((document.getElementById("emlist_id1")).selectedIndex==0)
    {
      document.getElementById("emlist_divid1").style.visibility="visible";
      document.getElementById("emlist_divid1").innerHTML="Select List";
      document.getElementById("emlist_id1").focus();
      return false;
    }
    else
      document.getElementById("emlist_divid1").style.visibility="hidden";

    if(document.getElementById("emlist_id2").value=="")
    {
      document.getElementById("emlist_divid2").style.visibility="visible";
      document.getElementById("emlist_divid2").innerHTML="Enter Firstname";
      document.getElementById("emlist_id2").focus();
      return false;
    }
    else if((document.getElementById("emlist_id2").value).length<3)
    {
      document.getElementById("emlist_divid2").style.visibility="visible";
      document.getElementById("emlist_divid2").innerHTML="Length to be between 3 and 20";
      document.getElementById("emlist_id2").focus();
      return false;
    }
    else
      document.getElementById("emlist_divid2").style.visibility="hidden";

    if(document.getElementById("emlist_id3").value=="")
    {
      document.getElementById("emlist_divid3").style.visibility="visible";
      document.getElementById("emlist_divid3").innerHTML="Enter Lastname";
      document.getElementById("emlist_id3").focus();
      return false;
    }
    else if((document.getElementById("emlist_id3").value).length<3)
    {
      document.getElementById("emlist_divid3").style.visibility="visible";
      document.getElementById("emlist_divid3").innerHTML="Length to be between 3 and 20";
      document.getElementById("emlist_id3").focus();
      return false;
    }
    else
      document.getElementById("emlist_divid3").style.visibility="hidden";
    
    var reg= /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-])+\.([A-Za-z]{2,4})$/;

    if(document.getElementById("emlist_id4").value=="")
    {
      document.getElementById("emlist_divid4").style.visibility="visible";
      document.getElementById("emlist_divid4").innerHTML="Enter Email-ID";
      document.getElementById("emlist_id4").focus();
      return false;
    }
    else if(reg.test(document.getElementById("emlist_id4").value)==false)
    {
      document.getElementById("emlist_divid4").style.visibility="visible";
      document.getElementById("emlist_divid4").innerHTML="Enter Valid Email-ID";
      document.getElementById("emlist_id4").focus();
      return false;
    }
    else
        document.getElementById("emlist_divid4").style.visibility="hidden";
  
    return;
  }

}










function displayfade(formname)
{
  if(formname=="add_new_user_form")
  {
    document.getElementById("add-new-user-div-id").style.display="block";
    document.getElementById("add_new_user_form").reset();
    document.getElementById("fade").style.display="block";

    return;
  }

  if(formname=="add_new_employee_form")
  {
    document.getElementById("add-new-employee-div-id").style.display="block";
    document.getElementById("add_new_employee_form").reset();

    document.getElementById("emp_img").src="";

    document.getElementById("imagesrc").value="";
    document.getElementById("aadharsrc").value="";
    document.getElementById("pansrc").value="";
    document.getElementById("passsrc").value="";
    document.getElementById("othersrc").value="";

    document.getElementById("aadharid").href="";
    document.getElementById("aadharid").style.display="none";

    document.getElementById("panid").href="";
    document.getElementById("panid").style.display="none";

    document.getElementById("passid").href="";
    document.getElementById("passid").style.display="none";

    document.getElementById("otherid").href="";
    document.getElementById("otherid").style.display="none";

    document.getElementById("fade").style.display="block";

    return;
  }

  if(formname=="add_new_client_form")
  {
    document.getElementById("add-new-client-div-id").style.display="block";
    document.getElementById("add_new_client_form").reset();
    document.getElementById("fade").style.display="block";

    return;
  }

  if(formname=="add_new_contact_person_form")
  {
    document.getElementById("add-new-contact-person-div-id").style.display="block";
    document.getElementById("add_new_contact_person_form").reset();
    document.getElementById("fade").style.display="block";

    return;
  }

  if(formname=="add_new_email_to_list_form")
  {
    document.getElementById("add-new-email-to-list-div-id").style.display="block";
    document.getElementById("add_new_email_to_list_form").reset();
    document.getElementById("fade").style.display="block";

    return;
  }
  /*
  if(formname=="user-list-div-id")
  {
    document.getElementById("user-list-div-id").style.display="block";
    document.getElementById("emp-list-div-id").style.display="none";
    //document.getElementById("add_new_employee_form").reset();
    document.getElementById("fade").style.display="none";
    return;
  }

  if(formname=="emp-list-div-id")
  {
    document.getElementById("emp-list-div-id").style.display="block";
    document.getElementById("user-list-div-id").style.display="none";
    //document.getElementById("add_new_employee_form").reset();
    document.getElementById("fade").style.display="none";
    return;
  }*/
}
 
function cancelfade(formname,urlvalue)
{
  if(formname=="add_new_user_form")
  {
    document.getElementById("add-new-user-div-id").style.display="none";
    document.getElementById("add_new_user_form").reset();
    document.getElementById("fade").style.display="none";

    document.getElementById("user_divid1").style.visibility="hidden";
    document.getElementById("user_divid2").style.visibility="hidden";
    document.getElementById("user_divid3").style.visibility="hidden";
    document.getElementById("user_divid4").style.visibility="hidden";
    document.getElementById("user_divid5").style.visibility="hidden";
    document.getElementById("user_divid6").style.visibility="hidden";

    document.getElementById("uidupdate").value=0;
    document.getElementById("uid").value=-1; 

    document.getElementById("imagesrc").value="";
    document.getElementById("aadharsrc").value="";
    document.getElementById("pansrc").value="";
    document.getElementById("passsrc").value="";
    document.getElementById("othersrc").value="";
    return;
  }

  if(formname=="add_new_employee_form")
  {
    document.getElementById("add-new-employee-div-id").style.display="none";
    document.getElementById("add_new_employee_form").reset();
    document.getElementById("fade").style.display="none";
  
    document.getElementById("emp_divid1").style.visibility="hidden";
    document.getElementById("emp_divid2").style.visibility="hidden";
    document.getElementById("emp_divid3").style.visibility="hidden";
    document.getElementById("emp_divid4").style.visibility="hidden";
    document.getElementById("emp_divid5").style.visibility="hidden";
    document.getElementById("emp_divid6").style.visibility="hidden";
    document.getElementById("emp_divid7").style.visibility="hidden";
    document.getElementById("emp_divid10").style.visibility="hidden";
    document.getElementById("emp_divid11").style.visibility="hidden";
    document.getElementById("emp_divid12").style.visibility="hidden";

    document.getElementById("eidupdate").value=0;
    document.getElementById("eid").value=-1;

    document.getElementById("emp_img").src="";
    
    document.getElementById("imagesrc").value="";
    document.getElementById("aadharsrc").value="";
    document.getElementById("pansrc").value="";
    document.getElementById("passsrc").value="";
    document.getElementById("othersrc").value="";
    
    document.getElementById("aadharid").href="";
    document.getElementById("aadharid").style.display="none";

    document.getElementById("panid").href="";
    document.getElementById("panid").style.display="none";

    document.getElementById("passid").href="";
    document.getElementById("passid").style.display="none";

    document.getElementById("otherid").href="";
    document.getElementById("otherid").style.display="none";

    return;
  }

  if(formname=="add_new_client_form")
  {
    document.getElementById("add-new-client-div-id").style.display="none";
    document.getElementById("add_new_client_form").reset();
    document.getElementById("fade").style.display="none";

    document.getElementById("client_divid1").style.visibility="hidden";
    document.getElementById("client_divid2").style.visibility="hidden";
    document.getElementById("client_divid3").style.visibility="hidden";
    document.getElementById("client_divid4").style.visibility="hidden";

    document.getElementById("cidupdate").value=0;
    document.getElementById("cid").value=-1;

    return;
  }

  if(formname=="add_new_contact_person_form")
  {
    document.getElementById("add-new-contact-person-div-id").style.display="none";
    document.getElementById("add_new_contact_person_form").reset();
    document.getElementById("fade").style.display="none";

    document.getElementById("cp_divid1").style.visibility="hidden";
    document.getElementById("cp_divid2").style.visibility="hidden";
    document.getElementById("cp_divid3").style.visibility="hidden";
    document.getElementById("cp_divid4").style.visibility="hidden";

    document.getElementById("cpidupdate").value=0;
    document.getElementById("cpid").value=-1;
    document.getElementById("cid").value=-1;

    return;
  }

  if(formname=="add_new_email_to_list_form")
  {
    document.getElementById("add-new-email-to-list-div-id").style.display="none";
    document.getElementById("add_new_email_to_list_form").reset();
    document.getElementById("fade").style.display="none";

    document.getElementById("emlist_divid1").style.visibility="hidden";
    document.getElementById("emlist_divid2").style.visibility="hidden";
    document.getElementById("emlist_divid3").style.visibility="hidden";
    document.getElementById("emlist_divid4").style.visibility="hidden";

    /*document.getElementById("cpidupdate").value=0;
    document.getElementById("cpid").value=-1;
    document.getElementById("cid").value=-1;*/

    return;
  }

  if(formname=="user-list-div-id")
  {
    document.location.href="./index.php";
    //document.getElementById("user-list-div-id").style.display="none";
    //document.getElementById("fade").style.display="none";
    return;
  }

  if(formname=="emp-list-div-id")
  {
    document.location.href="./index.php";
    //document.getElementById("emp-list-div-id").style.display="none";
    //document.getElementById("fade").style.display="none";
    return;
  }

  if(formname=="client-list-div-id")
  {
    document.location.href="./index.php";
    //document.getElementById("emp-list-div-id").style.display="none";
    //document.getElementById("fade").style.display="none";
    return;
  }

  if(formname=="emp-detail-div-id")
  {
    document.location.href="./index.php?emp="+urlvalue;
    //document.getElementById("emp-list-div-id").style.display="none";
    //document.getElementById("fade").style.display="none";
    return;
  }

  if(formname=="client-detail-div-id")
  {
    document.location.href="./index.php?client="+urlvalue;
    //document.getElementById("emp-list-div-id").style.display="none";
    //document.getElementById("fade").style.display="none";
    return;
  }
}

function resetfade(formname)
{
  if(formname=="add_new_user_form")
  {
    document.getElementById("add_new_user_form").reset();
    //document.getElementById("add-new-user-div-id").style.display="none";
    //document.getElementById("fade").style.display="none";

    document.getElementById("user_divid1").style.visibility="hidden";
    document.getElementById("user_divid2").style.visibility="hidden";
    document.getElementById("user_divid3").style.visibility="hidden";
    document.getElementById("user_divid4").style.visibility="hidden";
    document.getElementById("user_divid5").style.visibility="hidden";
    document.getElementById("user_divid6").style.visibility="hidden";
    return;
  }

  if(formname=="add_new_employee_form")
  {
    document.getElementById("add_new_employee_form").reset();
    //document.getElementById("add-new-employee-div-id").style.display="none";
    //document.getElementById("fade").style.display="none";
  
    document.getElementById("emp_divid1").style.visibility="hidden";
    document.getElementById("emp_divid2").style.visibility="hidden";
    document.getElementById("emp_divid3").style.visibility="hidden";
    document.getElementById("emp_divid4").style.visibility="hidden";
    document.getElementById("emp_divid5").style.visibility="hidden";
    document.getElementById("emp_divid6").style.visibility="hidden";
    document.getElementById("emp_divid7").style.visibility="hidden";
    document.getElementById("emp_divid10").style.visibility="hidden";
    document.getElementById("emp_divid11").style.visibility="hidden";
    document.getElementById("emp_divid12").style.visibility="hidden";

    document.getElementById("emp_img").src="";
    
    document.getElementById("imagesrc").value="";
    document.getElementById("aadharsrc").value="";
    document.getElementById("pansrc").value="";
    document.getElementById("passsrc").value="";
    document.getElementById("othersrc").value="";
    
    document.getElementById("aadharid").href="";
    document.getElementById("aadharid").style.display="none";

    document.getElementById("panid").href="";
    document.getElementById("panid").style.display="none";

    document.getElementById("passid").href="";
    document.getElementById("passid").style.display="none";

    document.getElementById("otherid").href="";
    document.getElementById("otherid").style.display="none";

    return;
  }

  if(formname=="add_new_client_form")
  {
    document.getElementById("add_new_client_form").reset();
  
    document.getElementById("client_divid1").style.visibility="hidden";
    document.getElementById("client_divid2").style.visibility="hidden";
    document.getElementById("client_divid3").style.visibility="hidden";
    document.getElementById("client_divid4").style.visibility="hidden";

    return;
  }

  if(formname=="add_new_contact_person_form")
  {
    document.getElementById("add_new_contact_person_form").reset();

    document.getElementById("cp_divid1").style.visibility="hidden";
    document.getElementById("cp_divid2").style.visibility="hidden";
    document.getElementById("cp_divid3").style.visibility="hidden";
    document.getElementById("cp_divid4").style.visibility="hidden";

    /*document.getElementById("cpidupdate").value=0;
    document.getElementById("cpid").value=-1;
    document.getElementById("cid").value=-1;*/

    return;
  }

  if(formname=="add_new_email_to_list_form")
  {
    document.getElementById("add_new_email_to_list_form").reset();

    document.getElementById("emlist_divid1").style.visibility="hidden";
    document.getElementById("emlist_divid2").style.visibility="hidden";
    document.getElementById("emlist_divid3").style.visibility="hidden";
    document.getElementById("emlist_divid4").style.visibility="hidden";

    /*document.getElementById("cpidupdate").value=0;
    document.getElementById("cpid").value=-1;
    document.getElementById("cid").value=-1;*/

    return;
  }
}










function displayusereditbox(formname,userid,name,loginid,password,usertype,status,update)
{
  if(formname=="add_new_user_form")
  {
    document.getElementById("add-new-user-div-id").style.display="block";
    document.getElementById("add_new_user_form").reset();

    document.getElementById("uidupdate").value=update;
    document.getElementById("uid").value=userid;
    document.getElementById("user_id1").value=name;
    document.getElementById("user_id2").value=loginid;
    document.getElementById("user_id3").value=password;
    document.getElementById("user_id4").value=password;
    document.getElementById("user_id5").value=usertype;
    document.getElementById("user_id6").value=status;

    document.getElementById("fade").style.display="block";
    return;
  }
}

function displayempeditbox(formname,empid,firstname,lastname,age,cno1,cno2,cno3,localaddr,villageaddr,doj,
                aadhar,pan,activestatus,photopath,aadharpath,panpath,passportpath,otherpath,update)
{
  if(formname=="add_new_employee_form")
  {
    document.getElementById("add-new-employee-div-id").style.display="block";
    document.getElementById("add_new_employee_form").reset();

    document.getElementById("eidupdate").value=update;
    document.getElementById("eid").value=empid;
    document.getElementById("emp_id1").value=firstname;
    document.getElementById("emp_id2").value=lastname;
    document.getElementById("emp_id3").value=age;
    document.getElementById("emp_id4").value=cno1;
    document.getElementById("emp_id5").value=cno2;
    document.getElementById("emp_id6").value=cno3;
    document.getElementById("emp_id7").value=localaddr;
    document.getElementById("emp_id8").value=villageaddr;
    document.getElementById("emp_id9").value=doj;
    document.getElementById("emp_id10").value=aadhar;
    document.getElementById("emp_id11").value=pan;
    document.getElementById("emp_id12").value=activestatus;

    document.getElementById("emp_img").src=photopath;

    document.getElementById("imagesrc").value=photopath;
    document.getElementById("aadharsrc").value=aadharpath;
    document.getElementById("pansrc").value=panpath;
    document.getElementById("passsrc").value=passportpath;
    document.getElementById("othersrc").value=otherpath;

    if(aadharpath!="")
    {
      document.getElementById("aadharid").href=aadharpath;
      document.getElementById("aadharid").style.display="inline-block";
    }

    if(panpath!="")
    {
      document.getElementById("panid").href=panpath;
      document.getElementById("panid").style.display="inline-block";
    }

    if(passportpath!="")
    {
      document.getElementById("passid").href=passportpath;
      document.getElementById("passid").style.display="inline-block";
    }

    if(otherpath!="")
    {
      document.getElementById("otherid").href=otherpath;
      document.getElementById("otherid").style.display="inline-block";
    }

    document.getElementById("fade").style.display="block";
    return;
  }
}

function displayclienteditbox(formname,clientid,companyname,billingaddr,gstno,panno,update)
{
  if(formname=="add_new_client_form")
  {
    document.getElementById("add-new-client-div-id").style.display="block";
    document.getElementById("add_new_client_form").reset();

    document.getElementById("cidupdate").value=update;
    document.getElementById("cid").value=clientid;
    document.getElementById("client_id1").value=companyname;
    document.getElementById("client_id2").value=billingaddr;
    document.getElementById("client_id3").value=gstno;
    document.getElementById("client_id4").value=panno;

    document.getElementById("fade").style.display="block";
    return;
  }
}

function displaycpeditbox(formname,cpid,contactpersonname,cno1,cno2,email,cid,update)
{
  if(formname=="add_new_contact_person_form")
  {
    document.getElementById("add-new-contact-person-div-id").style.display="block";
    document.getElementById("add_new_contact_person_form").reset();

    document.getElementById("cpidupdate").value=update;
    document.getElementById("cpid").value=cpid;
    document.getElementById("cp_id1").value=contactpersonname;
    document.getElementById("cp_id2").value=cno1;
    document.getElementById("cp_id3").value=cno2;
    document.getElementById("cp_id4").value=email;
    document.getElementById("cid").value=cid;

    document.getElementById("fade").style.display="block";
    return;
  }
}











function viewdetailbox(formname,url)
{
  if(formname=="emp-detail-div-id")
  {
    document.location.href="./index.php?"+url;
    return;
  }

  if(formname=="client-detail-div-id")
  {
    //alert(url);
    document.location.href="./index.php?"+url;
    return;
  }
}










function isNumberKey(evt)
{
  var charcode=(evt.which) ? evt.which : evt.keyCode;
  if (charcode>31 && (charcode<48)||(charcode>57))
    return false;
  return true;
} 

function isCharKey(evt)
{
  var charcode=(evt.which) ? evt.which : evt.keyCode;
  if ((charcode > 64 && charcode < 91) || (charcode > 96 && charcode < 123) || charcode == 8 || charcode == 13 || charcode == 32 || charcode == 9)
    return true;
  else
    return false;
} 

function isCharKey1(evt)
{
  var charcode=(evt.which) ? evt.which : evt.keyCode;
  if ((charcode > 64 && charcode < 91) || (charcode > 96 && charcode < 123) || charcode == 8 || charcode == 13 || charcode == 9)
    return true;
  else
    return false;
}

function isAddress(evt)
{
  var charcode=(evt.which) ? evt.which : evt.keyCode;
  if ((charcode > 64 && charcode < 91) || (charcode > 96 && charcode < 123) || charcode == 8 || charcode == 13 || charcode == 9 || charcode == 32 || charcode == 40 || charcode == 41 || (charcode>47)&&(charcode<60))
    return true;
  else
    return false;
}

function isSpaceKey(evt)
{
  if(document.getElementById("err-id").style.display=="block")
    document.getElementById("err-id").style.display="none";

  var charcode=(evt.which) ? evt.which : evt.keyCode;
  if (charcode != 32 && charcode != 34 && charcode != 39 && charcode != 47 && charcode != 92 && charcode != 96)
    return true;
  else
    return false;
}

function isLoginKey(evt)
{
  if(document.getElementById("err-id").style.display=="block")
    document.getElementById("err-id").style.display="none";

  var charcode=(evt.which) ? evt.which : evt.keyCode;
   if ((charcode > 64 && charcode < 91) || (charcode > 96 && charcode < 123) || (charcode>47)&&(charcode<58) || charcode == 8 || charcode == 13 || charcode == 9  || charcode == 36 || charcode == 35 || charcode == 45 || charcode == 64 || charcode == 95)
    return true;
  else
    return false;
}

function isPanKey(evt)
{
  var charcode=(evt.which) ? evt.which : evt.keyCode;
  if ((charcode > 64 && charcode < 91) || (charcode > 96 && charcode < 123) || (charcode > 47 && charcode < 58)|| charcode == 8 || charcode == 13 || charcode == 9)
    return true;
  else
    return false;
} 

function isEmail(evt)
{
  var charcode=(evt.which) ? evt.which : evt.keyCode;
  if (charcode != 32)
    return true;
  else
    return false;
} 










function validateFileType(filetype,e)
{
  if(filetype=="emp_select_img")
  {
    //document.getElementById("emp_img").style.display="none";
    document.getElementById("emp_img").src="";
    //document.getElementById("text").style.display="block";

    var filename=document.getElementById("emp_select_img").value;
    var lastindex=filename.lastIndexOf(".")+1;
    var extfile=filename.substr(lastindex, filename.length).toLowerCase();
    var size=((document.getElementById("emp_select_img").files[0].size)/1024);

    if(!(extfile=="jpg" || extfile=="jpeg" || extfile=="png" || extfile=="gif"))
    {
      document.getElementById("emp_select_img").value="";
      document.getElementById("emp_img").src="";
      alert("Only .jpg/.jpeg/.gif/.png files are allowed!");
    }
    else if(size>(500))
    {
      document.getElementById("emp_select_img").value="";
      document.getElementById("emp_img").src="";
      alert("Select image file below 500 KB");
    }
    else
    {
      if(e.files&&e.files[0]) 
      {
        //document.getElementById("text").style.display="none";
        document.getElementById("emp_img").style.display="block";
        document.getElementById("emp_img").src=URL.createObjectURL(e.files[0]); 
      }
    }
  }
  else if(filetype=="emp_aadhar_file")
  {
    var filename=document.getElementById("emp_aadhar_file").value;
    var lastindex=filename.lastIndexOf(".")+1;
    var extfile=filename.substr(lastindex, filename.length).toLowerCase();
    var size=(((document.getElementById("emp_aadhar_file").files[0].size)/1024)/1024);

    if(!(extfile=="jpg" || extfile=="jpeg" || extfile=="pdf"))
    {
      document.getElementById("emp_aadhar_file").value="";
      alert("Only .jpg/.jpeg/.pdf files are allowed!");
    }
    else if(size>(1))
    {
      document.getElementById("emp_aadhar_file").value="";
      alert("Select file below 1 MB");
    } 
  }
  else if(filetype=="emp_pan_file")
  {
    var filename=document.getElementById("emp_pan_file").value;
    var lastindex=filename.lastIndexOf(".")+1;
    var extfile=filename.substr(lastindex, filename.length).toLowerCase();
    var size=(((document.getElementById("emp_pan_file").files[0].size)/1024)/1024);

    if(!(extfile=="jpg" || extfile=="jpeg" || extfile=="pdf"))
    {
      document.getElementById("emp_pan_file").value="";
      alert("Only .jpg/.jpeg/.pdf files are allowed!");
    }
    else if(size>(1))
    {
      document.getElementById("emp_pan_file").value="";
      alert("Select file below 1 MB");
    } 
  }
  else if(filetype=="emp_pass_file")
  {
    var filename=document.getElementById("emp_pass_file").value;
    var lastindex=filename.lastIndexOf(".")+1;
    var extfile=filename.substr(lastindex, filename.length).toLowerCase();
    var size=(((document.getElementById("emp_pass_file").files[0].size)/1024)/1024);

    if(!(extfile=="jpg" || extfile=="jpeg" || extfile=="pdf"))
    {
      document.getElementById("emp_pass_file").value="";
      alert("Only .jpg/.jpeg/.pdf files are allowed!");
    }
    else if(size>(1))
    {
      document.getElementById("emp_pass_file").value="";
      alert("Select file below 1 MB");
    } 
  }
  else if(filetype=="emp_other_file")
  {
    var filename=document.getElementById("emp_other_file").value;
    var lastindex=filename.lastIndexOf(".")+1;
    var extfile=filename.substr(lastindex, filename.length).toLowerCase();
    var size=(((document.getElementById("emp_other_file").files[0].size)/1024)/1024);

    if(!(extfile=="jpg" || extfile=="jpeg" || extfile=="pdf"))
    {
      document.getElementById("emp_other_file").value="";
      alert("Only .jpg/.jpeg/.pdf files are allowed!");
    }
    else if(size>(1))
    {
      document.getElementById("emp_other_file").value="";
      alert("Select file below 1 MB");
    } 
  }

}

function clearfile(filename)
{
  if(filename=="emp_select_img")
  {
    document.getElementById("emp_select_img").value="";

    if(document.getElementById("imagesrc").value!="")
      document.getElementById("emp_img").src=document.getElementById("imagesrc").value;
    else
      document.getElementById("emp_img").src="";
  }
  else if(filename=="emp_aadhar_file")
  {
    document.getElementById("emp_aadhar_file").value="";
  }
  else if(filename=="emp_pan_file")
  {
    document.getElementById("emp_pan_file").value="";
  }
  else if(filename=="emp_pass_file")
  {
    document.getElementById("emp_pass_file").value="";
  }
  else if(filename=="emp_other_file")
  {
    document.getElementById("emp_other_file").value="";
  }
}


