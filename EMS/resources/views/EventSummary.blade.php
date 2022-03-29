@extends('layout.app')
@section('title','Events')
@section('content')
@include('Components.EventSummaryComponent')
@endsection


@section('script')

<script>
    $('.status').click(function(){
        let reg_id = $(this).data('rid');
        let phone_no = $(this).data('id');
        let transaction_no = $(this).data('name');
        approveStatus(reg_id, phone_no, transaction_no);
    });

    function approveStatus(reg_id, phone_no, transaction_no)
    {
        let url = '/status';
        axios.post(url, {
            reg_id: reg_id,
            phone_no:phone_no,
            transaction_no:transaction_no
        }).then(function(response){
            if(response.status == 200)
            {
                var jsonData = response.data;
                $('#registrationID').val(jsonData[0].id);
                $('#user_phone_no').val(jsonData[0].user_phone_no);
                $('#transactionNoId').val(jsonData[0].transaction_no);
                $('#PaymentApprovalStatusId').val(jsonData[0].stutus);
            }
        }).catch(function(error){
            flash('Shit happens 💩',{'bgColor' : '#cccc00'});
        });
    }

    $('#PaymentStatusUpdateConfirm').click(function(){
        let registration_id = $('#registrationID').val();
        let user_phone_no = $('#user_phone_no').val();
        let transaction_no = $('#transactionNoId').val();
        let userStatus = $('#PaymentApprovalStatusUpdate').val();
        updateStatus(registration_id, user_phone_no, transaction_no, userStatus);
    });

    function updateStatus(registration_id, user_phone_no, transaction_no, userStatus)
    {
        let url = '/updateUserStatus';
        alert(registration_id);
        axios.post(url, {
            registration_id:registration_id,
            user_phone_no:user_phone_no,
            transaction_no:transaction_no,
            userStatus:userStatus

        }).then(function(response){
            if(response.status == 200 && response.data == 1)
            {
                flash('Status Successfully Updated. ',{'bgColor' : '#00b859'});
                
                window.location.href = window.location.href;
            }
            else
            {
                flash('Status Not Updated.',{'bgColor' : '#00ff00'});
            }
        }).catch(function(error){
            flash('Shit happens 💩',{'bgColor' : '#cccc00'});
        });
    }
</script>




<script type = "text/javascript">
$('#SummaryTable').DataTable({"order":false});
$('.dataTables_length').addClass('bs-select');

</script>
@endsection
