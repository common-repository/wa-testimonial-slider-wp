
<!-- dialog to add testimonial -->
<div class="modal fade" id="testimonial-add-form" tabindex="-1" role="dialog" aria-labelledby="testimonial-add-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add testimonial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addform" method="post" action="admin-post.php">
                    <!--                            <input type="hidden" name="action" value="save_watestimonialsliderwp_testimonial" />-->
                    <?php wp_nonce_field( 'watestimonialsliderwp' ); ?>

                    <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Testimonial name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " id="watestimonialsliderwp_name" name="watestimonialsliderwp_name" placeholder="Name" value="">
                        </div>
                        <div class="col-md-offset-2 col-sm-3">
                            <small id="surnameerror" class="form-text error-texto"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Testimonial text:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="watestimonialsliderwp_text" name="watestimonialsliderwp_text"> </textarea>
                        </div>
                        <div class="col-md-offset-2 col-sm-3">
                            <small id="surnameerror" class="form-text error-texto"></small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">

                            <img id="myprefix-preview-image" style="visibility: hidden;"  id="myprefix-preview-image"/>
                            <input type="hidden" name="myprefix_image_id" id="myprefix_image_id" value="<?php echo esc_attr( $image_id ); ?>" class="regular-text" />
                            <input type='button' class="button-primary" value="<?php esc_attr_e( 'Select a image', 'mytextdomain' ); ?>" id="myprefix_media_manager"/>

                        </div>
                        <div class="col-md-offset-2 col-sm-3">
                            <small id="imageerror" class="form-text error-texto"></small>
                        </div>
                    </div>


                    <?php /* <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Date:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control datepicker " id="watestimonialsliderwp_date" name="watestimonialsliderwp_date" placeholder="Text" value="">
                        </div>
                        <div class="col-md-offset-2 col-sm-3">
                            <small id="surnameerror" class="form-text error-texto"></small>
                        </div>
                    </div> */?>

                    <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Published:</label>
                        <div class="col-sm-10">
                            <input name="watestimonialsliderwp_published" type="checkbox" id="watestimonialsliderwp_published" value="1" checked="checked">
                        </div>
                        <div class="col-md-offset-2 col-sm-3">
                            <small id="surnameerror" class="form-text error-texto"></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="testimonial-add-form-button" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- dialog to edit testimonial -->
<div class="modal fade" id="testimonial-edit-form" tabindex="-1" role="dialog" aria-labelledby="testimonial-edit-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit testimonial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editform" method="post" action="admin-post.php">
                    <!--                            <input name="watestimonialsliderwp_id" type="hidden" name="action" value="" />-->

                    <?php wp_nonce_field( 'watestimonialsliderwp' ); ?>
                    <input id="edit-form-id" type="hidden" value="">

                    <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Testimonial name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " id="watestimonialsliderwp_name" name="watestimonialsliderwp_name" placeholder="Name" value="">
                        </div>
                        <div class="col-md-offset-2 col-sm-3">
                            <small id="surnameerror" class="form-text error-texto"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Testimonial text:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="watestimonialsliderwp_text" name="watestimonialsliderwp_text"> </textarea>
                        </div>
                        <div class="col-md-offset-2 col-sm-3">
                            <small id="surnameerror" class="form-text error-texto"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">

                            <span id="imgspan">
                                <img id="myprefix-preview-image-edit" width="100"/>

                            </span>
                            <input type="button" class="btn btn-danger" name="deleteimg" id="deleteimg" value="Delete image"/>
                            <input type="hidden" name="myprefix_image_id_edit" id="myprefix_image_id_edit" class="regular-text" />
                            <input type='button' formname="edit" class="button-primary" value="<?php esc_attr_e( 'Select a image', 'mytextdomain' ); ?>" id="myprefix_media_manager_edit"/>

                        </div>
                        <div class="col-md-offset-2 col-sm-3">
                            <small id="imageerror" class="form-text error-texto"></small>
                        </div>
                    </div>


                    <?php /* <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Date:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control datepicker " id="watestimonialsliderwp_date" name="watestimonialsliderwp_date" placeholder="Text" value="">
                        </div>
                        <div class="col-md-offset-2 col-sm-3">
                            <small id="surnameerror" class="form-text error-texto"></small>
                        </div>
                    </div> */ ?>

                    <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Published:</label>
                        <div class="col-sm-10">
                            <input name="watestimonialsliderwp_published" type="checkbox" id="watestimonialsliderwp_published" value="1" checked="checked">
                        </div>
                        <div class="col-md-offset-2 col-sm-3">
                            <small id="surnameerror" class="form-text error-texto"></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="testimonial-edit-form-button" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery.noConflict();
    jQuery(document).ready(function() {
        jQuery('.datepicker').datepicker({dateFormat: "yy/mm/dd"});

        /**
         * when click in add button in modal box
         */
        jQuery('#testimonial-add-form-button').click(function(){

            var name = jQuery('#addform #watestimonialsliderwp_name ').val();
            var text = jQuery('#addform #watestimonialsliderwp_text ').val();
            var date = jQuery('#addform #watestimonialsliderwp_date ').val();
            var published = jQuery('#addform #watestimonialsliderwp_published').val();
            var imageid = jQuery('#addform #myprefix_image_id').val();

            jQuery.ajax({
                url : "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                type : 'post',
                data : {
                    action : 'watestimonialssliderwp_testimonial_add',
                    name: name,
                    text: text,
                    date: date,
                    published: published,
                    imageid: imageid
                },
                success : function( response ) {
                    window.location.href=window.location.href
                },
                error: function(response){
                    console.log(response);
                },
            });

            return false;
        });

        /**
         * when click in edit button in modal box
         */
        jQuery('#testimonial-edit-form-button').click(function() {

            var id = jQuery('#editform #edit-form-id ').val();
            var name = jQuery('#editform #watestimonialsliderwp_name ').val();
            var text = jQuery('#editform #watestimonialsliderwp_text ').val();
            var date = jQuery('#editform #watestimonialsliderwp_date ').val();
            var published = jQuery('#editform #watestimonialsliderwp_published').prop('checked');
            var imageid = jQuery('#editform #myprefix_image_id_edit ').val();


            jQuery.ajax({
                url : "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                type : 'post',
                data : {
                    action : 'watestimonialssliderwp_testimonial_edit',
                    id: id,
                    name: name,
                    text: text,
                    date: date,
                    published: published,
                    imageid: imageid
                },
                success : function( response ) {
                    window.location.href=window.location.href
                },
                error: function(response){
                    console.log(response);
                },
            });

            return false;

        });

        /**
         * on show modal load all values
         */
        jQuery('#testimonial-edit-form').on('show.bs.modal', function(e) {

            var invoker = jQuery(e.relatedTarget);
            var id = jQuery(invoker).attr('testimonial-id');

            var row = jQuery(invoker).parent().parent();
            row = jQuery(row).find('td');
            var name = jQuery(jQuery(row)[1]).text();
            var text = jQuery(jQuery(row)[2]).text();
            // var date = jQuery(jQuery(row)[3]).text();
            var published = jQuery(jQuery(row)[3]).children('i').attr('class');
            var imageid = jQuery(invoker).attr('idmedia');

            if(imageid == -1){
                jQuery('#deleteimg').hide();


            } else {
                jQuery('#deleteimg').show();
            }

            Refresh_Image(imageid, 'edit');


            jQuery('#editform #edit-form-id ').val(id);
            jQuery('#editform #watestimonialsliderwp_name ').val(name);
            jQuery('#editform #watestimonialsliderwp_text ').val(text);
            // jQuery('#editform #watestimonialsliderwp_date ').val(date);


            if ("fa fa-check" == published) {
                jQuery('#editform #watestimonialsliderwp_published ').attr('checked', true);
            } else {
                jQuery('#editform #watestimonialsliderwp_published ').attr('checked', false);
            }

        });

        /**
         * when click in delete button in testimonial list
         */
        jQuery('.testimonial-delete-button').click(function() {

            if (confirm('Are you sure to delete these Testimonial')) {
                var id = jQuery(this).attr('testimonial-id');

                jQuery.ajax({
                    url : "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                    type : 'post',
                    data : {
                        action : 'watestimonialssliderwp_testimonial_delete',
                        id: id,
                    },
                    success : function( response ) {
                          window.location.href=window.location.href
                    },
                    error: function(response){
                        console.log(response);
                    },
                });
            }

            return false;
        });

        jQuery('#deleteimg').click(function() {

            jQuery('#imgspan').html('');
            jQuery('#myprefix_image_id_edit').val('');
            jQuery('#deleteimg').hide();

        });

    });
</script>