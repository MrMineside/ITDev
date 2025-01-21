function datatask(){
        var type = $('#type').val();
        var gettanggal = $('#pilihtgl').val();
        $.ajax({
          type  : 'POST',
          url   : '<?php echo base_url()?>index.php/C_Tasksales/datatask',
          async : false,
          dataType : 'json',
          data : {gettanggal:gettanggal,type:type},
          success : function(data){
                        var html = '';
                        var jenis = '';
                        var icon = '';
                        var note = '';
                        var no = 1;
                        var i;

                        for(i=0; i<data.length; i++){
                            if (data[i].status == 1) {icon = '<i class="fa fa-check-circle" title="Success" style="color: green;"> Success</i>'}
                            else {icon = '<i class="fa fa-spinner" title="failed" style="color: red;"> Offline</i>'}

                            html += '<tr>'+
                                    '<td>'+no+++'</td>'+
                                    '<td>'+data[i].id_store+' - '+data[i].store_name+'</td>'+
                                    '<td>'+data[i].noremote+'</td>'+
                                    '<td>'+icon+'</td>'+
                                    '<td>'+data[i].jam+'</td>'+
                                    '<td>'+data[i].name+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].idtask+'"><i class="fa fa-ban" title="Delete Data"></i></a>'+
                                    '</td>'+
                                    '</tr>';
                            
                        }
                        $('#datatask').html(html);
                    }
        });
    }