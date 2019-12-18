<?php

/**
 * Testimonial post/page widget
 *
 * @package WP_Store
 */
add_action('widgets_init', 'the100_register_promo_widget');

function the100_register_promo_widget() {
	register_widget('the100_promo');
}

class the100_promo extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
    	parent::__construct(
    		'the100_promo', __('The100: Call to Action','the100'), array(
    			'description' => __('A widget that Gives field to add image and text', 'the100')
           )
      );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
    	$fields = array(
    		'promo_title' => array(
    			'the100_widgets_name' => 'promo_title',
    			'the100_widgets_title' => __('Title', 'the100'),
    			'the100_widgets_field_type' => 'text',
           ),

    		'promo_image' => array(
    			'the100_widgets_name' => 'promo_image',
    			'the100_widgets_title' => __('Upload Image', 'the100'),
    			'the100_widgets_field_type' => 'upload',
           ),

    		'promo_desc' => array(
    			'the100_widgets_name' => 'promo_desc',
    			'the100_widgets_title' => __('Enter Description', 'the100'),
    			'the100_widgets_field_type' => 'textarea',
           ),

    		'promo_link' => array(
    			'the100_widgets_name' => 'promo_link',
    			'the100_widgets_title' => __('Enter Link', 'the100' ),
    			'the100_widgets_field_type' => 'url'
           ),

    		'promo_btn_text' => array(
    			'the100_widgets_name' => 'promo_btn_text',
    			'the100_widgets_title' => __('Enter Button Text', 'the100' ),
    			'the100_widgets_field_type' => 'text'
           ),

            'promo_layout' => array(
                'the100_widgets_name' => 'promo_layout',
                'the100_widgets_title' => __('Choose Layout', 'the100' ),
                'the100_widgets_field_type' => 'radio',
                'the100_widgets_field_options' => array('lay-one'=>__('Layout One','the100'),
                    'lay-two'=>__('Layout Two','the100'),
                    'lay-three'=>__('Layout Three','the100')),
            ),
        );

    	return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
    	extract($args);
        if($instance == null){
          $instance['promo_title'] = '';
          $instance['promo_image']='';
          $instance['promo_btn_text']='';
          $instance['promo_desc']='';
          $instance['promo_link']='';
          $instance['promo_layout']='lay-one';

      }
      $promo_title = apply_filters( 'widget_title', empty( $instance['promo_title'] ) ? __( 'Title','the100' ) : $instance['promo_title'], $instance, $this->id_base );;
      $promo = $instance['promo_image'];           
      $promo_btn_text = $instance['promo_btn_text'];
      $promo_desc = wp_kses_post($instance['promo_desc']);
      $promo_link = $instance['promo_link'];
      $promo_layout = $instance['promo_layout'];
      if(has_shortcode($promo_desc,'ufbl')){
        $promo_desc = do_shortcode($promo_desc);
    }


    echo $before_widget;
    ?>
    <div class="promo-widget-wrap <?php echo esc_attr($promo_layout); if(!empty($promo)){echo " has-image";}?> clearfix" <?php if($promo_layout=="lay-three" && $promo!=''){echo "style='background-image:url(".esc_url($promo).")'";}?>>
        <div class='widget-content-wrapper'>
            <?php 
            if (!empty($promo) && $promo_layout!='lay-three'){ ?>
            <div class="img-wrap">
                <img src="<?php echo esc_url($promo);?>" alt="<?php echo esc_attr($promo_title);?>">
            </div>
            <?php } ?>
            <div class="caption">
                <?php
                if (!empty($promo_title)){ ?>
                <?php echo wp_kses_post($before_title).esc_html($promo_title).wp_kses_post($after_title); ?>
                <?php }
                if (!empty($promo_desc)){ ?>
                <div class="desc"><?php echo wp_kses_post($promo_desc); ?></div>
                <?php }
                if (!empty($promo_btn_text)){ ?>
                <div class="promo-btn">
                    <a href="<?php echo esc_url($promo_link);?> "><?php echo esc_html($promo_btn_text); ?></a>
                </div>
                <?php } ?> 
            </div>
        </div>
    </div>        
    <?php 
    echo $after_widget;
}

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	the100_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
    	$instance = $old_instance;

    	$widget_fields = $this->widget_fields();

        // Loop through fields
    	foreach ($widget_fields as $widget_field) {
            extract($widget_field);
    		// Use helper function to get updated field values
            $instance[$the100_widgets_name] = the100_widgets_updated_field_value($widget_field, $new_instance[$the100_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	the100_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
    	$widget_fields = $this->widget_fields();

        // Loop through fields
    	foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            // Make array elements available as variables
            $the100_widgets_field_value = !empty($instance[$the100_widgets_name]) ? esc_attr($instance[$the100_widgets_name]) : '';
            the100_widgets_show_widget_field($this, $widget_field, $the100_widgets_field_value);
        }
    }

}