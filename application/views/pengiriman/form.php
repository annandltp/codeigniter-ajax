<div class="card" >
    <div class="card-header ">Form Pengiriman </div>
    <div class="card-body">
        <form id="FormPeminjaman">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Request Type </label>
                <div class="col-sm-4 ">
                    <select name="" class="form-control" id="request_type">
                        <option selected>Choose...</option>
                        <option>Import</option>
                        <option>Export</option>
                        <option>Internal Distribution</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Port Origin </label>
                <div class="col-sm-4 ">
                    <select name="box1" class="form-control" id="port_origin">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Port Destination </label>
                <div class="col-sm-4 ">
                    <select name="" class="form-control" id="port_destination">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Shipment Mode </label>
                <div class="col-sm-4 ">
                    <select name="" class="form-control" id="shipmen_mode">
                        <option selected>Choose...</option>
                        <option>Land</option>
                        <option>Air</option>
                        <option>Sea</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Weight (Kg) </label>
                <div class="col-sm-3">
                    <input type="number" name="weight" placeholder="kg..." class="form-control" id="weight">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Dimension (cm) </label>
                <div class="col-sm-3">
                    <input type="text" name="dimension" placeholder="cm..." class="form-control" id="dimension">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Item Description</label>
                    <input type="text" class="form-control" id="item_description">
                </div>
                <div class="form-group col-md-2">
                    <label>Qty</label>
                    <input type="number" class="form-control" id="qty">
                </div>
                <div class="form-group col-md-3">
                    <label>Satuan</label>
                    <input type="text" class="form-control" id="satuan">
                </div>
                <div class="form-group col-md-2">
                    <label>Good Category</label>
                    <select class="form-control" id="good_category">
                        <option selected>Choose...</option>
                        <option>Non DG</option>
                        <option>DG</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <br>
                    <button class="btn btn-secondary" type="button" id="btn_add">Add Item</button>
                </div>
                
            </div>


            <!-- <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Pinjam </label>
                <div class="col-sm-3">
                    <input type="text" name="tanggal" class="form-control datepicker" id="tglPinjam">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Pengembalian </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control datepicker_dua" id="tglKembali">
                </div>
            </div> -->

            <!-- <div class="form-group row">
                <label class="col-sm-3 col-form-label"> yang dipinjam </label>
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <select name="" class="form-control" id="port_origin">
                            <option value="">0</option>
                        </select>
                        <input type="number" id="txt_jumlah" class="form-control " placeholder="Jml Pinjam"  >
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" id="btn_add">Add Item</button>
                        </div>
                    </div>
                </div>
            </div> -->
            
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">&nbsp; </label>
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Description</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Good Category</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="DataItem">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">&nbsp;</label>
                <div class="col-sm-12">
                    <button id="proses_pinjam" class="btn btn-success" type="button">Proses</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('select').on('change', function() {
            $('option').prop('disabled', false); //reset all the disabled options on every change event
            $('select').each(function() { //loop through all the select elements
                var val = this.value;
                $('select').not(this).find('option').filter(function() { //filter option elements having value as selected option
                    return this.value === val;
                }).prop('disabled', true); //disable those option elements
            });
        }).change(); //trihgger change handler initially!

        $('select').change(function() {

            var value = $(this).val();

            $(this).siblings('select').children('option').each(function() {
                if ( $(this).val() === value ) {
                    $(this).attr('disabled', true).siblings().removeAttr('disabled');   
                }
            });

        });

        $('.datepicker').datepicker({
            onSelect: function(dateText, inst){
                $(".datepicker_dua").datepicker('option', 'minDate', dateText);
            },
            dateFormat:"yy-mm-dd",
        });


        $('.datepicker_dua').datepicker({
            dateFormat:"yy-mm-dd",
        });

        $.ajax({
            url:'<?php echo site_url('member') ?>',
            dataType:'json',
            type:'GET',
            success:function(res){
                let option ="";
                for(let i=0; i<res.data.length; i++){
                    option +="<option value='"+res.data[i].nim+"'>"+res.data[i].nama+"</option>"
                }
                $('#request_type').html(option);
            }
        });

        $.ajax({
            url:'<?php echo site_url('port') ?>',
            dataType:'json',
            type:'GET',
            success:function(res){
                let option ="<option value='0'>--Select Port--</option>";
                for(let i=0; i<res.data.length; i++){
                    option +="<option value='"+res.data[i].port_id+"'>"+res.data[i].port_id+' - '+res.data[i].port_name+"</option>"
                }
                $('#port_origin').html(option);
            }
        });

        $.ajax({
            url:'<?php echo site_url('port') ?>',
            dataType:'json',
            type:'GET',
            success:function(res){
                let option ="<option value='0'>--Select Port--</option>";
                for(let i=0; i<res.data.length; i++){
                    option +="<option value='"+res.data[i].port_id+"'>"+res.data[i].port_id+' - '+res.data[i].port_name+"</option>"
                }
                $('#port_destination').html(option);
            }
        });

        var rowItem = [];

        $.fn.showItem=function(){
            let html ="";
            for(let i=0; i<rowItem.length; i++){
                let no = i+1;
                html += '<tr>';
                html += '<td scope="row">'+no+'</td>';
                html += '<td>'+rowItem[i].item_desc+'</td>';
                html += '<td>'+rowItem[i].jml+'</td>';
                html += '<td>'+rowItem[i].satuan+'</td>';
                html += '<td>'+rowItem[i].good_category+'</td>';
                html += '<td><button type="button" data-id="'+i+'" onclick="$(this).deleteItem()" class="btn btn-danger">Delete</button></td>';
                html += '</tr>';

            }
            $('#DataItem').html(html);
        }

        $.fn.deleteItem = function(){
            let id = $(this).data('id');
            let newItem =[];
            
            for(let i=0; i<rowItem.length; i++){
                if(i !=id)
                    newItem.push(rowItem[i])
            }
            rowItem = newItem;
            $(this).showItem();
        }
        
        $('#btn_add').click(function(){
            let item_desc = $('#item_description').val();
            let jml     = $('#qty').val();
            let satuan     = $('#satuan').val();
            let good_category     = $('#good_category').val();
            $.ajax({
                url:'<?php echo site_url('port') ?>',
                data:{id:item_desc},
                dataType:'json',
                type:'POST',
                success:function(res){
                    var item = res.data[0];
                    item['item_desc'] = item_desc;
                    item['jml'] = jml;
                    item['satuan'] = satuan;
                    item['good_category'] = good_category;
                    
                    rowItem.push(item);

                    $(this).showItem();

                    $('#item_desc').val('')
                    $('#qty').val('')
                    $('#satuan').val('')
                    $('#good_category').val('')
                    $('#item_description').val(0);
                }
            });
        });

        $('#proses_pinjam').click(function(){
            let data = {
                request_type  : $('#request_type').val(),
                port_destination  : $('#port_destination').val(),
                shipmen_mode  : $('#shipmen_mode').val(),
                port_origin : $('#port_origin').val(),
                weight : $('#weight').val(),
                dimension : $('#dimension').val(),
                detail    : rowItem 
            }
            
            $.ajax({
                url:'<?php echo site_url('pengiriman/add'); ?>',
                data:data,
                dataType:'json',
                type:'POST',
                success:function(res){
                    alert(res.messages)
                    // window.location.href="<?php echo site_url('pengiriman')?>";
                    $('#request_type').val('')
                    $('#port_destination').val('')
                    $('#shipmen_mode').val('')
                    $('#port_origin').val('')
                    $('#weight').val('')
                    $('#dimension').val('')
                    rowItem = [];
                    $(this).showItem();
                    // let title = (res.status==true)?"Success":"Error";
                    // let icon = (res.status==true)?"success":"error";
                    // Swal.fire({
                    //     title: title,
                    //     text: res.messages,
                    //     icon: icon,
                    //     confirmButtonText: 'Ok'
                    // });
                }
            });
        });
    });
</script>