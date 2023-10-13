<script>
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
    $('#contact_form').on('submit',function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            //this code to store session
            method:'POST',
            url:"{{ route('front.contact.store') }}",
            data:data,
            beforeSend:function(){
                $('#submit_button').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){
                //if process successful
                if(data.error==false)
                {
                    $('#submit_button').removeAttr('disabled'); //to remove button disabled
                    $('#contact_form')[0].reset(); //to clear form after process
                    Toastify({
                        text: "Successfully Inserted",
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "left", // `left`, `center` or `right`
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                    }).showToast();

                }
            },
            error:function (reject){
                //if process unsuccessful
                $('#submit_button').removeAttr('disabled'); //to remove button disabled
                $.each(reject.responseJSON.errors,function(key,val){
                    //this loop to print any error
                        Toastify({
                                text: val[0],
                                duration: 5000,
                                newWindow: true,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "left", // `left`, `center` or `right`
                                backgroundColor: "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))",
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                        }).showToast();

                });
            },
        });
    });
</script>