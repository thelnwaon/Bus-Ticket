$(function(){

	$("button#print").click(function(){
		$("#hide").hide();
		$(this).hide();
		$("button#hide").hide();
		$("div#hide").hide();
		$("input#hide").hide();
		$("th#hide").hide();
		$("td#hide").hide();
		$("label#hide").hide();
		$("p#hide").hide();
		window.print();
		$(this).show();
		$("th#hide").show();
		$("div#hide").show();
		$("td#hide").show();
		$("label#hide").show();
		$("p#hide").show();
		$("button#hide").show();
		$("input#hide").show();
		$("#hide").show();
	});
	$("tr#twoway").hide();
		$('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                     startDate: '0d',
                     format: 'dd/mm/yyyy',
                });
		$('input#check_twoway').change(function(){
        if ($(this).is(":checked")) {
			$("tr#twoway").show();
		}
		else{
			$("tr#twoway").hide();
		}
		});
		 $("input#check_oneway").prop('checked', true);      
		$("input#check_oneway").change(function(){
			 if ($(this).is(":checked")) {
			$("tr#twoway").hide();
		}
		
		});
		var allseat = "";
		 $('input#seat').change(function() {
		 	var checkthis = $(this);
		 	var name_seat = $(this).attr("name");
		 	var count_seat_booking = $('span#count_seat').text();
		 	var count = $('input#seat:checked').length;
		 	// alert(count + " "+ count_seat_booking);	

		 	 if(checkthis.is(':checked')) {
		 	 	if(count_seat_booking < count){
					alert("ไม่สามารถเลือกได้");
					checkthis.attr('checked', false);
				}else{
					allseat += ","+name_seat;
					
					$("input#seat").val(allseat);
				}
				

					// alert("asdasd");
					
					// $("table#in_booking").append("<tr class='"+name_seat+"'> <td><label for='exampleInputEmail1'>ชื่อ-นามสกุล</label></td> <td> <input type='text' class='form-control' name='in[name]'   required placeholder='ชื่อ-นามสกุล'></td><td><label for='exampleInputPassword1'>Username</label></td><td><input type='text' class='form-control' pattern='.{8,20}' name='in[user]' title='username ควรมีความยาว 8-20 อักษร'  placeholder='username'></td></tr><tr><td><label >รหัสบัตรประชาชน</label></td><td> <input type='text' class='form-control'  name='in[pid]' maxlength='13' placeholder='รหัสบัตรประชาชน'></td><td><label >เบอร์โทรศัพท์</label></td><td> <input type='number' class='form-control' name='in[tel]' required placeholder='เบอร์โทรศัพท์'></td></tr><tr><td></td><td><label><input type='radio' name='in[sex]' value='0'>ชาย</label></td><td><label><input type='radio' name='in[sex]' value='1'>หญิง</label></td></tr><hr><tr height='20px'></tr> ");
				
        } else {
        			
        	// $("table#in_booking").remove("<tr class='"+name_seat+"'> <td><label for='exampleInputEmail1'>ชื่อ-นามสกุล</label></td> <td> <input type='text' class='form-control' name='in[name]'   required placeholder='ชื่อ-นามสกุล'></td><td><label for='exampleInputPassword1'>Username</label></td><td><input type='text' class='form-control' pattern='.{8,20}' name='in[user]' title='username ควรมีความยาว 8-20 อักษร'  placeholder='username'></td></tr><tr><td><label >รหัสบัตรประชาชน</label></td><td> <input type='text' class='form-control'  name='in[pid]' maxlength='13' placeholder='รหัสบัตรประชาชน'></td><td><label >เบอร์โทรศัพท์</label></td><td> <input type='number' class='form-control' name='in[tel]' required placeholder='เบอร์โทรศัพท์'></td></tr><tr><td></td><td><label><input type='radio' name='in[sex]' value='0'>ชาย</label></td><td><label><input type='radio' name='in[sex]' value='1'>หญิง</label></td></tr><hr><tr height='20px'></tr> ");
       	
        }

		 });

		 $.ajax({
			    url: "page/check_time_difference.php",
			    type : "POST",
			    data : {data : "1"},

			    error: function(wtf){
			      alert(wtf);
			    },
			    success: function(respone){
			    	var n = respone.search("แจ้งเตือน :");
			      	// alert(respone);
			      if(n > -1){
			       	alert(respone.substr(3,respone.length));
			       }
			    },
			    timeout: 3000 // sets timeout to 3 seconds
});
		   $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });

});

function logout(){
	var r = confirm('คุณต้องการออกจากระบบหรือไม่');
	if(r){
		location.replace("?p=logout");
	}
}
function back(){
	window.history.back();
}
function del(id){
	var r = confirm('คุณต้องการลบข้อมูลนี้หรือไม่');
	if(r){
		location.replace("?p=del&id="+id);
	}
}
function confirm_booking(id,c){
	var r = confirm('คุณต้องการจองเที่ยวรถนี้หรือไม่');
	if(r){
		location.replace("?p=booking_travel2&id="+id+"&c="+c);
	}
}
function cancel_booking(id,c){
	var r = confirm('คุณต้องการลบข้อมูลนี้หรือไม่');
	if(r){
		location.replace("?p=cancel_booking&id="+id+"&c="+c);
	}
}
function reconfirm(id){
	var r = confirm('ชำระแล้ว');
	if(r){
		location.replace("?p=pass_booking&id="+id);
	}
}
function del_reconfirm(id){
	var r = confirm('ยกเลิกการจองนี้');
	if(r){
		location.replace("?p=del_booking&id="+id);
	}
}
fu