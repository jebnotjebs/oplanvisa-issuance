$(document).ready(function(){

		brand();
		color();
})


function createOption(title, str){
	return "<option value ='' selected disabled>"+title+"</option>"+str;
}

function createOptionAll(title, str){
	return "<option value ='' selected disabled>"+title+"</option> <option value ='All'>All</option>"+str;
}

var select_holder = [], select_d = [], view = [];

$(document).on('click','#load_ars',function(e){
	e.preventDefault();

	if ($('#brand').val() != null && $('#color').val() != null) 
	{
		filter();
		
	}
	
	else
	{
		swal("Oops", "Please Complete All Fields", {
			buttons: {
				confirm: {
					className : 'btn btn-warning'
				}
			},
		});
	}
})

function brand() {
	$.ajax({
		url:"assets/php/index.php",
		method:"POST",
		data:{
			formula:"brand"
		},
		dataType:"json",
		beforeSend: function(){
			$('.loading_').removeClass('d-none');
		},
		success:function(res){
			
			$('.loading_').addClass('d-none');
			select_d = res;
			console.log("c", res);

			var str ="";
			if (!$.isEmptyObject(select_d)) {
				select_d.forEach((x)=>{
					str += `<option value ='${x.brand}'>${x.brand}</option>`;
				})
			}
			$("#brand").html(createOptionAll('Select Brand', str));
		},
		error : (e) => {
			console.log("ERROR", e)
		} 
	})
}

function color() {
	$.ajax({
		url:"assets/php/index.php",
		method:"POST",
		data:{
			formula:"color"
		},
		dataType:"json",
		beforeSend: function(){
			$('.loading_').removeClass('d-none');
		},
		success:function(res){
			
			$('.loading_').addClass('d-none');
			select_d = res;
			console.log("c", res);

			var str ="";
			if (!$.isEmptyObject(select_d)) {
				select_d.forEach((x)=>{
					str += `<option value ='${x.color}'>${x.color}</option>`;
				})
			}
			$("#color").html(createOptionAll('Select color', str));
		},
		error : (e) => {
			console.log("ERROR", e)
		} 
	})
}

function filter() {
	$.ajax({
		url:"assets/php/index.php",
		method:"POST",
		data:{
			brand:$('#brand').val(),
			color:$('#color').val(),
			formula:"filter"
		},
		dataType:"json",
		beforeSend:()=>{
			$('.load_spinner').removeClass('d-none');
		},
		success:function(res){
			$('.load_spinner').addClass('d-none');
			select_d = res;
			console.log(res);
			
			var str ="";
			if (!$.isEmptyObject(select_d)) {
				select_d.forEach((x)=>{		

				str += `<tr class="border border-default font-weight-bold"">
							<td>${x.brand}</td>
							<td>${x.vehicle}</td>
							<td>${x.color}</td>
							<td>${x.amount}</td>
							<td><button  class="btn btn-danger btn-xs delete-vehicle" data-id='${x.id}' data-brand='${x.brand}' "><i class="fa fa-trash"></i></button>
							<button  class="btn btn-info btn-xs edit-vehicle" data-id='${x.id}' data-brand='${x.brand}' data-vehicle='${x.vehicle}' data-amount='${x.amount}' data-color='${x.color}'"><i class="fa fa-edit"></i></button></td>
						</tr>`;
				})
			}
			data_table("#table_vehicle","#tbody_vehicle",str);
		}
	})
}

// $( "button" ).on( "click", notify );
  

$(document).on('click','#add_brand',function(e){
	e.preventDefault();

	$('#addbrand_modal').modal('show');
	
})
$(document).on('click','#add_details',function(e){
	e.preventDefault();

	$('#adddetails_modal').modal('show');
	
})
$(document).on('click','.delete-vehicle',function(e){
	e.preventDefault();

	$('#delete-modal').modal('show');
	$('#fordelete').val(e.target.dataset.id);
	$('#brand_name').val(e.target.dataset.brand);
	
})
$(document).on('click','.edit-vehicle',function(e){
	e.preventDefault();

	$('#edit-modal').modal('show');
	$('#foredit').val(e.target.dataset.id);
	$('#brandd').val(e.target.dataset.brand);
	$('#vehiclee').val(e.target.dataset.vehicle);
	$('#amountt').val(e.target.dataset.amount);
	$('#colorr').val(e.target.dataset.color);
	

	
})
$(document).on('submit','#form_addbrand',function(e){
	e.preventDefault();

	if (confirm('Are you sure?')) 
	{
		$.ajax({
			url:"assets/php/index.php",
			method:"POST",
			data:{
				addbrand:$('#addbrand').val(),
				formula:'addbrand'
			},
			beforeSend:()=>{
				$(e.target).attr('disabled','');
				$(e.target).addClass('is-loading');
			},
			success:function(res){

				console.log(res);
				$(e.target).removeAttr('disabled','');
				$(e.target).removeClass('is-loading');

				switch(res)
				{	
					case "added":
							swal("Success", "Added Successfully", {
								buttons: {
									confirm: {
										className : 'btn btn-dark btn-sm'
									}
								},
							});
							
							brand();
							$(e.target)[0].reset();
							$('#addbrand_modal').modal('hide');
					break;

					case "exist":
						swal("Oops!", "Brand : '"+$('#addbrand').val()+"' exist", {
								buttons: {
									confirm: {
										className : 'btn btn-warning'
									}
								},
							});
					break;

					default:
						swal("Oops!", res, {
								buttons: {
									confirm: {
										className : 'btn btn-warning'
									}
								},
							});
					break;
				}
			},
			error: er =>{
				console.log(er);
			}
		})
	}
})

$(document).on('submit','#form_adddetails',function(e){
	e.preventDefault();

	if (confirm('Are you sure?')) 
	{
		$.ajax({
			url:"assets/php/index.php",
			method:"POST",
			data:{
				brand:$('#detail_brand').val(), // #detail_brand is the id input in main index
				vehicle:$('#detail_vehicle').val(),
				amount:$('#detail_amount').val(),
				color:$('#detail_color').val(),
				formula:'adddetails'
			},
			beforeSend:()=>{
				$(e.target).attr('disabled','');
				$(e.target).addClass('is-loading');
			},
			success:function(res){

				console.log(res);
				$(e.target).removeAttr('disabled','');
				$(e.target).removeClass('is-loading');

				switch(res)
				{	
					case "added":
							swal("Success! "+$('#detail_brand').val()+ " Added Successfully", {
								buttons: {
									confirm: {
										className : 'btn btn-dark btn-sm'
									}
								},
							});
							
							color();
							filter();
							$(e.target)[0].reset();
							$('#adddetails_modal').modal('hide');
					break;

					case "exist":
						swal("Oopsssss!", "Brand : '"+$('#detail_brand').val()+"' is not in the list", {
								buttons: {
									confirm: {
										className : 'btn btn-warning'
									}
								},
							});
					break;

					default:
						swal("Ops!", res, {
								buttons: {
									confirm: {
										className : 'btn btn-warning'
									}
								},
							});
					break;
				}
			},
			error: er =>{
				console.log(er);
			}
		})
	}
})
$(document).on('click','#delete',function(e){
	e.preventDefault();

	$.ajax({
		url:"assets/php/index.php",
		method:"POST",
		data:{
			id:$('#fordelete').val(),
			brand:$('#brand_name').val(),
			formula:'delete'
		},
		beforeSend:()=>{
			$(e.target).attr('disabled','');
			$(e.target).addClass('is-loading');
		},
		success:function(res){

			console.log(res);
			$(e.target).removeAttr('disabled','');
			$(e.target).removeClass('is-loading');

			switch(res)
			{	
				case "deleted":
						swal("Brand: '" +$('#brand_name').val()+"' deleted Successfully", {
							buttons: {
								confirm: {
									className : 'btn btn-dark btn-sm'
								}
							},
						});

						filter();
						$(e.target)[0].reset();
						$('#delete-modal').modal('hide');
				break;

				default:
					swal("Success!", res, {
							buttons: {
								confirm: {
									className : 'btn btn-warning'
								}
							},
						});
					
						$(e.target)[0].reset();
						$('#delete-modal').modal('hide');
				break;
			} 	
		},
		error: er =>{
			console.log(er);
		}
	})
})
$(document).on('submit','#form-edit',function(e){
	e.preventDefault();

	if (confirm('Are you sure?')) 
	{
		$.ajax({
			url:"assets/php/index.php",
			method:"POST",
			data:{
				id:$('#foredit').val(),
				brand:$('#brandd').val(), // #detail_brand is the id input in main index
				vehicle:$('#vehiclee').val(),
				amount:$('#amountt').val(),
				color:$('#colorr').val(),
				formula:'edit'
			},
			beforeSend:()=>{
				$(e.target).attr('disabled','');
				$(e.target).addClass('is-loading');
			},
			success:function(res){

				console.log(res);
				$(e.target).removeAttr('disabled','');
				$(e.target).removeClass('is-loading');

				switch(res)
				{	
					case "success":
							swal("Brand: '"+$('#brandd').val()+"' update Successfully", {
								buttons: {
									confirm: {
										className : 'btn btn-dark btn-sm'
									}
								},
							});
							
							filter();
							$(e.target)[0].reset();
							$('#edit-modal').modal('hide');
					break;

					case "exist":
						swal("Oopsssss!", "Brand : '"+$('#brandd').val()+"' is not in the vehicle list", {
								buttons: {
									confirm: {
										className : 'btn btn-warning'
									}
								},
							});
					break;

					default:
						swal("Ops!", res, {
								buttons: {
									confirm: {
										className : 'btn btn-warning'
									}
								},
							});
					break;
				}
			},
			error: er =>{
				console.log(er);
			}
		})
	}
})
//data-tables
function data_table(table_name,tbody_name,data_tbody) {
    $(table_name).DataTable().destroy();
    $(tbody_name).empty().html(data_tbody);
    $(table_name).DataTable(
    	{ dom: 'Bfrtip',
    		"ordering": false,
    		"pageLength": 5,
	        buttons: [
	            /*{
	                extend:    'copyHtml5',
	                text:      '<span style="font-size: 10px;"> Copy</span>',
	                titleAttr: 'Copy',
	                exportOptions: {
                    	columns: [ 0, 1, 2, 3]
                	}

	            },*/
	            {
	                extend:    'excelHtml5',
	                autoFilter: true,
	                text:      '<span style="font-size: 10px;"> Excel</span>',
	                titleAttr: 'Excel'

	            },
	            /*{
	                extend:    'csvHtml5',
	                text:      '<span style="font-size: 10px;"> Csv</span>',
	                titleAttr: 'CSV',
	                exportOptions: {
                    	columns: [ 0, 1, 2, 3 ]
                	}

	            },*/
	            {
	                extend:    'pdfHtml5',
	                text:      '<span style="font-size: 10px;"> Pdf</span>',
	                titleAttr: 'PDF'

	            },
	            {
	            	extend: 	'print',
	            	title:'<div style="display: none;"></div>',    
	            	messageBottom: 'Developed by Only Solution',
	            	text:      '<span style="font-size: 10px;"> Print</span>',
	            	titleAttr: 'Print'

	            }
	        ]
	    }
	);
};

//snackbar
function notify_me(title, message, status){
	$.notify({
		// options
		icon: 'flaticon-alarm-1',
		title: title,
		message: message,
		target: '_blank'
	},{
		// settings
		element: 'body',
		position: null,
		type: status,
		allow_dismiss: true,
		newest_on_top: true,
		showProgressbar: false,
		placement: {
			from: "top",
			align: "center"
		},
		offset: 20,
		spacing: 10,
		z_index: 1031,
		delay: 1500,
		timer: 400,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
		onShow: null,
		onShown: null,
		onClose: null,
		onClosed: null,
		icon_type: 'class',
	});
}

