<div id="watestimonialsliderwp-configs" class="wrap" >
    <h1><?php echo __('Testimonials list', 'watestimonialsliderwp'); ?></h1>

    <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testimonial-add-form">
        Add
    </button>
    <hr>

    <hr class="wp-header-end">

    <table class="table table-striped wp-list-table widefat fixed striped users table-hover" >

        <thead class="thead-dark">
        <tr>
            <th scope="col" >Id</th>
            <th scope="col"  ><?php echo __('Testimonial Name', 'watestimonialsliderwp'); ?></th>
            <th scope="col" ><?php echo __('Testimonial Text', 'watestimonialsliderwp'); ?></th>
            <?php /* <th scope="col" ><?php echo __('Date', 'watestimonialsliderwp'); ?></th>*/ ?>
            <th scope="col" ><?php echo __('Published', 'watestimonialsliderwp'); ?></th>
            <th scope="col" ><?php echo __('Image', 'watestimonialsliderwp'); ?></th>
            <th scope="col" ></th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th scope="col" >Id</th>
            <th scope="col" ><?php echo __('Title', 'watestimonialsliderwp'); ?></th>
            <th scope="col" ><?php echo __('Testimonial name', 'watestimonialsliderwp'); ?></th>
            <?php /* <th scope="col" ><?php echo __('Date', 'watestimonialsliderwp'); ?></th>*/ ?>
            <th scope="col" ><?php echo __('Published', 'watestimonialsliderwp'); ?></th>
            <th scope="col" ><?php echo __('Image', 'watestimonialsliderwp'); ?></th>
            <th scope="col" ></th>
        </tr>
        </tfoot>

        <tbody>
        <?php
        if ($options) {
            $count = 0;
            foreach ($options as $option) { ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $option['name']; ?></td>
                    <td><?php echo $option['text']; ?></td>
                    <?php /* <td><?php echo $option['date']; ?></td> */ ?>
                    <td>
                        <?php
                        if ($option['published']) { ?>
                            <i class="fa fa-check"></i>
                        <?php } else { ?>
                            <i class="fa fa-times"></i>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($option['imageid'] != "") { ?>
                            <img  id='image-preview' src='<?php echo wp_get_attachment_url( $option['imageid'] ); ?>' width='100'>
                    <?php } ?>
                    </td>
                    <td>

                        <a class="btn btn-primary testimonial-edit-button"  data-toggle="modal" data-target="#testimonial-edit-form"  testimonial-id="<?php echo $count;?>" class="page-title-action" idmedia="<?php echo $option['imageid'] ? $option['imageid']:-1; ?>">Edit</a>
                        <a class="btn btn-primary testimonial-delete-button" id="testimonial-del"  testimonial-id="<?php echo $count;?>" class="page-title-action">Delete</a>
                    </td>
                </tr>
                <?php



                $count++;
            }
        }?>

        </tbody>

    </table>

</div>