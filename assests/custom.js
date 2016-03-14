$(function () {
    $('#forms').submit(
            function () {
                var content = '';
                var id = $('#id').val();
                var name = $('#name').val();
                var phone = $('#phone').val();
                var email = $('#email').val();
                var address = $('#address').val();
                $.post('/demo_crud/index.php', {
                    method: 'ajax',
                    id: id,
                    name: name,
                    phone: phone,
                    email: email,
                    address: address
                }, function (e) {
                    console.log(e);
                }, 'json');
                return false;
            });

});
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


