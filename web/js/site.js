$(document).ready(function(){
    
    $('#OrdersPrint').click(function(){
        window.print();
    });
   
    $('#user-username').focus(function(){
        $('#UserGreate').show(1000);
    });
    
    $('#customer-first_name').focus(function(){
        $('#CustomerCreate').show(1000);
    });
    
    $('#order-name').focus(function(){
        $('#OrdersCreate').show(1000);
    });
    
    var str = $("#text_qr").text();
    $('#canva_qr').qrcode({
            "width": 400,
            "height": 400,
            "color": "#3a3",
            "text": str
    });
   $('#save').click(function(){
        var scanerText = $('#scanned-QR').text();
        //alert(scanerText);
        if(scanerText != ''){
            if(scanerText == 'Scanning ...'){
                alert('Qr code not found!!!!!!!!!!!!!');
            }else{
                alert($('#QR-Code').data('id'));
                alert(scanerText);
                $.ajax({
                    type:'POST',
                    url: '/qrcode/web/work/qrcode',
                    data: {id: $('#QR-Code').data('id'), scanText: scanerText},
                    dataType: "json",
                    success: function(response){
                        alert(response);
                        location.reload();
                    }
                });
            }
        }else{
            alert('Qr code not found!');
        }
   });
});