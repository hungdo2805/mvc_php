
$( document ).ready(function() {
    $('#username').keyup(function(){
        var value = $(this).val();
        $.post("ajax/checkUsername",{username:value},function(data){
           
            if(data.length > 3){
                $('#message_username').html(data);
                $('#btnRegister').attr('disabled',true);
            }
            else{
                $('#message_username').html(data);
                $('#btnRegister').attr('disabled',false);
            }
        })
    })

    $('#name_post').keyup(function(){
        var value = $(this).val();
        $.post("ajax/checkExistNamePost",{namepost:value},function(data){
           
            if(data.length > 3){
                $('#message_namepost').html(data);
                $('#btnCreatePost').attr('disabled',true);
            }
            else{
                $('#message_namepost').html(data);
                $('#btnCreatePost').attr('disabled',false);
            }
        })
    })

 
    $('#form-check-change-password').change(function(){

        var isChecked =  $(this).prop('checked');// true or false
        
        $('#input_password').prop('disabled',!isChecked);

    })
    
   
    $('#table_user').DataTable();

    $('#table_post').DataTable();
});

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {

    dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;

    if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
    } else {
        dropdownContent.style.display = "block";
        }
    });
}

// document.addEventListener('DOMContentLoaded',function(){
    
//     const checkChangeInput = document.getElementById('form-check-change-password');
//     const inputPassword = document.getElementById('input_password');


//     checkChangeInput.change(function(){

//         var isChecked =  $(this).prop('disabled');// true or false
        
//         inputPassword.prop('checked',isChecked);
        
//     })
// });