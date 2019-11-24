<?php
session_start();
require_once('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Document</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
 crossorigin="anonymous">
</head>

<body>




<br>
<br>
<div class="container">
<button type="button" class="btn btn-sm btn-success" data-toggle="modal" 
data-target="#exampleModal"  >New User</button>
<br><br>
<table class="table table-bordered table-striped">
	<tr>
		<td>No.</td>
		<td>Username</td>
		<td>Password</td>
		<td>Name</td>
		<td>Lastname</td>
		<td>Email</td>
		<td>Status</td>
		<td>SID</td>
		<td>Active</td>
		<td>Update</td>
		<td>Delete</td>
	</tr>
    <tbody class="show-list-data">
        <tr class="list-data">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
            	<button type="button" data-toggle="modal" data-target="#exampleModal" 
                data-user-id=""
                 class="btn btn-sm btn-warning">Update</button>
            </td>
            <td>
            	<button data-user-id="" type="button" class="btn btn-sm btn-danger btn-delete">Delete</button>
            </td>
        </tr>
    </tbody>
</table>



<nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="javascript:void(0);" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="javascript:void(0);"></a></li>
    <li>
      <a href="javascript:void(0);" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New User</h4>
      </div>
      <div class="modal-body">
        <form id="form_user">
          <div class="form-group">
            <label for="user-name" class="control-label">Username:</label>
            <input type="text" class="form-control" id="user-name" name="username" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="user-pass" class="control-label">Password:</label>
            <input type="password" class="form-control" id="user-pass" name="password" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="Name" class="control-label">Name:</label>
            <input type="text" class="form-control" id="Name" name="Name" autocomplete="off">
		  </div>
		  <div class="form-group">
            <label for="Lastname" class="control-label">Lastname:</label>
            <input type="text" class="form-control" id="Lastname" name="Lastname" autocomplete="off">
		  </div>
		  <div class="form-group">
            <label for="Email" class="control-label">Email:</label>
            <input type="text" class="form-control" id="Email" name="Email" autocomplete="off">
		  </div>
		  <div class="form-group">
            <label for="Status" class="control-label">Status:</label>
            <input type="text" class="form-control" id="Status" name="Status" autocomplete="off">
		  </div>
		  <?php 
		  $_SESSION["sid"]= session_id() ;
		  ?>
                             
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning hidden btn-edit" onClick="dataList.editData($('#form_user').serializeArray())" >Edit User</button>
        <button type="button" class="btn btn-primary btn-add" onClick="dataList.addData($('#form_user').serializeArray())">Add User</button>
      </div>
    </div>
  </div>
</div>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
 integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
  crossorigin="anonymous"></script>
<script type="text/javascript">
var dataList = {}
$(function(){
	dataList.getItem = function(chk_user_id){
		return $.post("jsondata.php",{
			action:"item",
			chk_user_id:chk_user_id	
		},function(response){
			if(response != null){
				return response;
			}
			return response;
		});		
	}
	dataList.delItem = function(del_user_id){
		if(confirm("Confirm delete this item?")){
			$.post("jsondata.php",{
				action:"delete",
				del_user_id:del_user_id	
			},function(response){
				if(response != null){
					if(response[0].error!=null || response[0].success!=null){
						var statusText = (response[0].error!=null)?response[0].error:response[0].success;
						alert(statusText);			
					}
					if(response[0].success!=null){
						var indexObj = $(".pagination").find("li.active").index();
						var numDelete = $(".btn-delete").length;
						if(indexObj>1 && numDelete>1){					
							dataList.getList(indexObj-1,null);
						}else{
							dataList.getList(0,true);
						}
					}
				}
			});		
		}
	}	
	dataList.editData = function(dataSend){
		dataSend.push({
			name:"action",
			value:"edit"
		});		
		$.post("jsondata.php",dataSend,function(response){
			console.log(response);
			if(response != null){		
				if(response[0].error!=null || response[0].success!=null){
					var statusText = (response[0].error!=null)?response[0].error:response[0].success;
					$('#exampleModal').modal('toggle')
//					alert(statusText);					
				}
				if(response[0].success!=null){
					var indexObj = $(".pagination").find("li.active").index();
					if(indexObj>0){					
						dataList.getList(indexObj-1,null);
					}					
				}
			}
		});		
	}
	dataList.addData = function(dataSend){
		dataSend.push({
			name:"action",
			value:"add"
		});
		$.post("jsondata.php",dataSend,function(response){
			if(response != null){		
				if(response[0].error!=null || response[0].success!=null){
					var statusText = (response[0].error!=null)?response[0].error:response[0].success;
					$('#exampleModal').modal('toggle')
//					alert(statusText);					
				}
				if(response[0].success!=null){
					$('#form_user')[0].reset();
					dataList.getList(0,true);
				}
			}
		});
	}
	dataList.getList = function(s_page,show_page){
		var haveData = null;
		$.post("jsondata.php",{
			action:'list',
			page:s_page
		},function(response){
			if(response != null && response.data.length > 0){
				$(".pagination").removeClass("hidden");
				$(".show-list-data").removeClass("hidden");						
				var rowData = $(".list-data").clone(true);
				$(".show-list-data").html("");
				var rowListData = "";
				$.each(response.data,function( i , v ){
					rowListData = "";
					rowListData+="<tr class=\"list-data\">";
					rowListData+=$(rowData.find("td:eq(0)").text(response.data[i].item_id).end()
					.find("td:eq(1)").text(response.data[i].Username).end()
					.find("td:eq(2)").text(response.data[i].Name).end()
					.find("td:eq(3)").text(response.data[i].Lastname).end()
					.find("td:eq(4)").text(response.data[i].mem_type).end()
					.find("td:eq(5) > button").attr("data-user-id",response.data[i].UserID).end()
					.find("td:eq(6) > button").attr("data-user-id",response.data[i].UserID).end()).html();	
					rowListData+="</tr>";
					$(".show-list-data").append(rowListData);
				}); // end loop				

				$(".btn-delete").on("click",function(){
					var del_user_id = $(this).data('user-id') // 
					dataList.delItem(del_user_id);
				});		

				if(show_page==true){
					$(".pagination").find("li:first").unbind("click");
					$(".pagination").find("li:last").unbind("click");
					var rowPage = $('<li><a href="javascript:void(0);"></a></li>');
					$(".pagination").find("li:not(:first):not(:last)").remove();
					$(".pagination").find("li").removeClass("active");
					var rowListPage = "";
					for(i = 1; i <= response.allpage; i++){
						rowListPage+="<li>";
						rowListPage+=$(rowPage.find("a").text(i).end()
						.find("a").attr("href","javascript:dataList.getList('"+(i-1)+"',null)").end()).html();		
						rowListPage+="</li>";
						if(i == response.allpage && rowListPage !=""){
							$(".pagination").find("li:eq(0)").after(rowListPage);
							$(".pagination").find("li:eq(1)").addClass("active");
							$(".pagination").find("li:not(':first'):not(':last')").on("click",function(){
								$(".pagination").find("li").removeClass("active");
								$(this).addClass("active");
							});			
							$(".pagination").find("li:first").on("click",function(){
								var indexObj = $(".pagination").find("li.active").prev("li").index();
								if(indexObj>0){					
									$(".pagination").find("li.active").prev("li").triggerHandler("click");
									dataList.getList(indexObj-1,null);
								}
							});
							$(".pagination").find("li:last").on("click",function(){
								var indexObj = $(".pagination").find("li.active").next("li").index();
								if(indexObj<=response.allpage){					
									$(".pagination").find("li.active").next("li").triggerHandler("click");
									dataList.getList(indexObj-1,null);
								}
							});													
						}				
					}
				}
			}
			
		});	
		if(haveData==null){
			$(".show-list-data").addClass("hidden");
			$(".pagination").addClass("hidden");		
		}
	}
	dataList.getList(0,true);
	
	// var global  res.data.length ;
	$('#exampleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var chk_user_id = button.data('user-id') // 
		if(chk_user_id!=null){
			var modal = $(this);
		 
			dataList.getItem(chk_user_id).done(function(res){
				
				if(res != null && res.data.length > 0){
					modal.find('.modal-title').text("Edit User");
					modal.find("#user-id").val(res.data[0].UserID);
					modal.find("#user-name").val(res.data[0].Username);
					modal.find("#user-pass").val(res.data[0].Password);
					modal.find("#user-Name").val(res.data[0].Name);
					modal.find("#user-Lastname").val(res.data[0].Lastname);
					modal.find("#user-type").val(res.data[0].mem_type);
					modal.find(".btn-add").addClass("hidden");
					modal.find(".btn-edit").removeClass("hidden");		  
				} 
			});		  
		}
	});
	
	$('#exampleModal').on('hide.bs.modal', function (event) {
		$('#form_user')[0].reset();				
		var modal = $(this);
		modal.find(".modal-title").text("New User");
		modal.find(".btn-edit").addClass("hidden");
		modal.find(".btn-add").removeClass("hidden");		
	});
	
});
</script>
</body>
</html>