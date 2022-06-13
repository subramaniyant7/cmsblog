$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
let url = window.location.pathname;

const getCategoryClient = (clientid) => {
    let data = { client_id: clientid };
    let clientId = $('#clients_gallery_client').val();
    toastr.clear();
    $.post(container + "/getClientCategory", data, function (response) {
        let option = '<option value="">Select</option>';
        if (response.status) {
            if (response.data.length) {
                response.data.forEach(function (item) {
                    let selected = clientId == item.client_id ? 'selected' : '';
                    option += '<option value="' + item.client_id + '" ' + selected + '>' + item.client_name + '</option>';
                });
            } else {
                toastr.error(response.msg);
            }
        } else {
            toastr.error("Something went wrong. Please try again");
        }
        console.log('clientid',clientid)
        if(clientid == 1){
            $('.sub_category').show();
        }else{
            $('.sub_category').hide();
        }
        $("select[name=clients_gallery_client]").html(option);
    });
};


if (url.indexOf('actionclientgallery') != -1) {
    let clientId = $('#clients_gallery_category').val();
    getCategoryClient(clientId);
}


const addRow = () => {
    let imagesLength = $(".gallery_image").length;
    let row = "";
    toastr.clear()
    console.log($(".gallery_image").length);
    if (imagesLength <10 ) {
        row += '<div class="form-group row">';
        row += "<label class='col-sm-3 col-form-label'>Image"+(imagesLength+1)
        row += '<span class="label-danger">*</span></label>';
        row +='<div class="col-sm-9"><input type="file" class="form-control mb-10 gallery_image" name="clients_gallery_images_name[]" value="" required></div></div>';
        $(".add_image").append(row);
        console.log('row', row)
    }else{
        toastr.error("Maxmimum(10) Limit reached for Gallery");
    }
};
